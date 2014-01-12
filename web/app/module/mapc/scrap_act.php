<?php
if(!defined('__MAPC__')) { exit(); }

/**
 * 글보기
 */

require(INIT_PATH.'init.head.php');
{ // Model : Head

    { // BLOCK:auth_check:20131123:권한체크

        // 권한체크
        include_once(MODULE_PATH . 'user/model/auth_check.func.php');
        module_user_auth_check($_SESSION['mapc_user_uid'], 'scrap');

    } // BLOCK

    switch($_REQUEST['scrap_type']) {
        // DB에 있는 화일들 검사하고 실제 화일이 없을 경우 DB에서 지우기
        case 'del':
            $query = " select post_uid, post_origin_url from mapc_post ";
            $sth = $CONFIG_DB['handler']->prepare($query);
            $sth->execute();
            $rst = $sth->fetchAll(PDO::FETCH_NUM);

            foreach($rst as $key => $var) {

                if(! is_file($PATH['mapc']['data'] . $var[1])) {
                    $query   = "delete from mapc_post where post_uid = ? and post_origin_url = ?";
                    $sth_del = $CONFIG_DB['handler']->prepare($query);
                    $sth_del->execute( array($var[0], $var[1]) );
                }

            }

            unset($query);
            unset($sth);
            unset($sth_del);
            unset($rst);

            break;

        // 실제 화일을 불러와서 DB에 넣기
        case 'scrap':
        default:
            unset($save_dir);
            // $arg['user_dir'], $arg['data_dir'] return
            include($PATH['mapc']['root'] . 'model/path_get_per_user.proc.php');
            $save_dir = $PATH['mapc']['data'] . $arg['user_dir'];

            include_once(LIBRARY_PATH . 'mapc/dir_list.func.php');
            $option['show_sub'] = true;
            $option['show_base']= true;
            $option['ext_exp'] = 'rdf';
            $dir_list = mapc_dir_list($save_dir.'/original/', $option);

            include_once($PATH['mapc']['root'] . 'model/post_update.func.php');
            include_once($PATH['mapc']['root'] . 'model/postmeta_insert.func.php');
            include_once($PATH['mapc']['root'] . 'model/dc_get.func.php');

            $count_rdf_to_db = 0;
            $count_rdf_make = 0;

            // 메타정보 입력
            if(is_array($dir_list)) {
                foreach($dir_list as $var) {

                    unset($post_info);
                    unset($dc_info);

                    $file_info = pathinfo($var);
                    
                    // 화일에 딸린 rdf화일이 있을 경우
                    if(is_file($var . '.rdf')) {

                        $option['dbh'] = $CONFIG_DB['handler'];

                        // 더블린 코어 정보들 가져오기
                        $dc_info = module_mapc_dc_get($var . '.rdf');

                        $dc_info['rdf_about'] = $file_info['basename'];
                        $dc_info['mapc_dir']  = str_replace(array($save_dir.'original/', $file_info['basename']), '', $var);

                        $post_info['uid']   = (string)$dc_info['dc_identifier'][0];
                        // uid 앞부분에 mapc가 적혀있는 것들만 mapc 지우게 하기!!! 'mapc ABCDEFGHIJ' 이런형태의 것들만...
                        if(strpos($post_info['uid'], 'mapc ') !== false) {
                            $post_info['uid']   = str_replace('mapc ', '', $post_info['uid']); // DB에 등록하기 전에 UID 처음부분의 "mapc "구분자는 지우기
                        }
                        $post_info['title'] = (string)$dc_info['dc_title'][0];
                        $post_info['date']  = (string)$dc_info['dc_date'][0];

                        $post_info['origin_url'] = $arg['user_dir'] . 'original/' . $dc_info['mapc_dir'] . $dc_info['rdf_about'];

                        // 화일 형식이 뭔지 체크
                        // 단, dc_format에 화일 형식 이외의 다른 값들도 있으므로...
                        // 화일 형식 부분(mime type)만 추출해서 등록
                        foreach($dc_info['dc_format'] as $temp_format) {

                            $temp_format = strtolower($temp_format);
                            if(
                                $temp_format == 'text/plain'
                             || $temp_format == 'text/markdown'
                             ||	$temp_format == 'image/jpeg'
                             || $temp_format == 'image/png'
                             || $temp_format == 'image/gif'
                            ) {
                                $post_info['origin_type'] = $temp_format;
                            }

                        }

                        unset($temp_format);

                        $post_info['content'] = '';

                        $mime_type = explode("/", $post_info['origin_type']);
                        switch($mime_type[0]) {
                            // 화일포맷이 텍스트일 경우(DB에 원문 그대로 입력)
                            case 'text':
                                $temp_contents = file($var);
                                foreach($temp_contents as $temp_line) {
                                    $post_info['content'] .= $temp_line;
                                }
                                unset($temp_contents);
                                unset($temp_line);
                                break;

                            case 'image':
                                { // BLOCK:make_thum:20131122:thumnail 만들기

                                    include_once($PATH['mapc']['root'] . 'model/thum_make.func.php');

                                    $option['min'] = 480;
                                    $option['max'] = 640;
                                    $option['copyright'] = $arg['data_dir'] . 'custom/copyright.png';
                                    // 썸네일 디렉토리가 없을 경우 생성
                                    $thum_dir = $save_dir . 'thum/' . $dc_info['mapc_dir'];
                                    if(! is_dir($thum_dir)) {
                                        $tmp_dir_name = (PHP_OS == 'WINNT') ? str_replace("/", "\\", $thum_dir) : $thum_dir;
                                        mkdir($tmp_dir_name, 0777);
                                        unset($tmp_dir_name);
                                    }

                                    // 썸네일 화일이 없으면 생성하기
                                    if(! is_file($save_dir . 'thum/' . $dc_info['mapc_dir'] . $file_info['basename'])) {
                                        module_mapc_thum_make(
                                            $save_dir . 'original/' . $dc_info['mapc_dir'],
                                            $save_dir . 'thum/' . $dc_info['mapc_dir'],
                                            $file_info['basename'],
                                            $mime_type[1],
                                            $option
                                        );
                                    }

                                } // BLOCK

                            // 텍스트 이외의 것들은 설명(더블린 코어 description의 내용)을 DB에 넣기...
                            default:
                                $post_info['content'] = $dc_info['dc_description'];
                                break;

                        }

                        $query = "
                            select post_write_date, post_edit_date_latest
                              from mapc_post
                             where post_uid = ?
                            ";

                        $sth = $option['dbh']->prepare($query);
                        $sth->execute( array($post_info['uid']) );
                        $rst = $sth->fetch(PDO::FETCH_ASSOC);
                        // 이미 등록되어있는 자료인데...
                        if(! empty($rst['post_write_date'])) {
                            // 전에 등록한 날짜와 지금 등록하려는 날짜가 다르고 최종 편집일과도 다를 때에는 update
                            if(($rst['post_write_date'] != $dc_info['dc_date'][0]) && (! empty($dc_info['dc_modified'][0]) && ($rst['post_edit_date_latest'] != $dc_info['dc_modified'][0]) )) {
                                $post_info['date'] = $dc_info['dc_modified'][0];
                                $option['is_new_post'] = false;

                            // 자료가 이미 있을 경우 건너띄기
                            } else {
                                continue;
                            }
                        } else {
                            $option['is_new_post'] = true;
                        }

                        $option['lang'] = (string)$dc_info['dc_language'][0] ? (string)$dc_info['dc_language'][0] : $CONFIG['lang'];

                        module_mapc_post_update($post_info['uid'], $post_info, $option);
                        module_mapc_postmeta_insert($post_info['uid'], $dc_info, $option);
                        unset($post_info);
                        unset($dc_info);
                        unset($option);

                        $count_rdf_to_db++;

                    // rdf화일이 없을 경우 rdf화일을 새로 만듦 // #TODO 만들고 나서 DB에 바로 집어넣을까? 말까?
                    } elseif(is_file($var)) {

                        $arg_ext = array();

                        // 파일 확장자
                        switch(strtolower($file_info['extension'])) {

                            // 그림 화일
                            case 'jpeg':
                            case 'jpg':
                            case 'gif':
                            case 'png':
                                // 참고 $exif로 들어오는 값들
                                // $exif[COMPUTED] = array(Height, Width, ApertureFNumber(ie. f/2.4), Thumbnail.FileType, Thumbnail.MimeType)
                                // $exif = array(Make, Model, ISOSpeedRatings(ie.100), ExposureTime(ie.1/60), FNumber(ie.24/10), DateTimeOriginal, DateTimeDigitized, Flash(ie.1)
                                $exif = @exif_read_data($var);
                                $tmp  = explode("/", $exif['MimeType']);
                                $arg['meta']['dc_type'][] = $tmp[0];

                                $arg['meta']['dc_format'][] = $exif['MimeType'];
                                unset($tmp);

                                // exif에 들어있는 YYYY:MM:DD 형식을 YYYY-MM-DD 형식으로 바꿈 : bisaz
                                $tmp1 = array();
                                $tmp1 = explode(" ", $exif['DateTimeOriginal']);
                                $tmp2 = explode(":", $tmp1[0]);
                                $arg['meta']['dc_date'][]   = $tmp2[0] . '-' . $tmp2[1] . '-' . $tmp2[2] . ' ' . $tmp1[1];
                                unset($tmp1);
                                unset($tmp2);

                                break;

                            // 마크다운 화일
                            case 'md':
                                break;

                        }

                        { // BLOCK:value_set_dc:20131217:더블린 코어에 들어갈 값들 지정

                            $file_name     = $file_info['basename'];
                            $save_dir_dc   = $file_info['dirname'] . '/';
                            $tmp_file_info = pathinfo($exif['FileName']);
                            // UID값 지정
                            include_once(LIBRARY_PATH . 'mapc/string_key_gen.php');
                            $arg['meta']['dc_identifier'][] = 'mapc ' . mapc_string_key_gen(20);
                            // 화일명
                            $arg['meta']['rdf_about']  = $file_info['basename'];
                            // 제목도 화일명 그대로 지정 // #TODO Text Format의 화일은 첫 줄을 제목으로 쓰기!!!!!!!!!!!!!!!!!!!!
                            $arg['meta']['dc_title'][] = $tmp_file_info['filename'];
                            // 화일을 불러올때는 원본이 언어로 되어있는지 모르니 무조건 기본언어로 등록
                            $arg['meta']['dc_lang'][]  = $CONFIG['lang'];
                            unset($tmp_file_info);
                            unset($exif);

                        } // BLOCK

                        { // BLOCK:dc_file_make:2012080901:메타데이타(더블린코어) 파일 생성

                            include_once($PATH['mapc']['root'] . 'model/dc_make.func.php');
                            module_mapc_dc_make($file_name . '.rdf', $arg['meta'], $save_dir_dc);
                            unset($arg['meta']);

                        } // BLOCK

                        $count_rdf_make++;

                    }

                }

            }

            break;
    
    } // switch($_REQUEST['scrap_type'])

} // Model : Tail
require(INIT_PATH.'init.tail.php');

// ======================================================================

{ // View : Head

	echo 'SCRAP FINISH!!!';
    echo '<br />';
    echo 'RDF Make : ' . $count_rdf_make;
    echo '<br />';
    echo 'RDF to DB : ' . $count_rdf_to_db;
    exit;
    $section_file = $PATH['mapc']['root'] . 'view/basic/scrap.view.php';
	include_once(PROC_PATH . 'publish.proc.php');

} // View : Tail

// end of file

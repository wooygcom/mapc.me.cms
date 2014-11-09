<?php
if(!defined('__MAPC__')) { exit(); }

/**
 * 글목록
 */

require(INIT_PATH.'init.db.php');
{ // Model : Head

    { // BLOCK:personal_info_get:2013-01-18:로그인한 사용자의 개별 디렉터리 반환

        // $arg['user_dir'], $arg['data_dir'] return
        include($PATH['mapc']['root'] . 'model/path_get_per_user.proc.php');

    } // BLOCK

    { // BLOCK:search_query:20140101:입력값 체크

        // 출력 키워드(리스트, 앨범, 달력, 꼬리표(태그)리스트...)
        $mapc_cate   = $_REQUEST['mapc_cate'];

        // 검색 옵션
        $mapc_srch_title = $_REQUEST['mapc_srch_title'];
        $mapc_search_key = $_REQUEST['mapc_search_key'];
        $mapc_search     = $_REQUEST['mapc_search'];
        $mapc_srch_lang  = $_REQUEST['mapc_srch_lang']; // 기본 언어의 글들만 불러오게끔~

        $mapc_date_from  = $_REQUEST['mapc_date_from'];
        $mapc_date_to    = $_REQUEST['mapc_date_to'];

        // mapc_cate값에 따라서 가져올 자료 결정하기... 예를들어 앨범은 이미지화일만, 달력은 일정관련 게시물만
        switch($mapc_cate) {
            case 'image':
                $mapc_search[] = 'dc_format:image/jpeg';
                $mapc_search[] = 'dc_format:image/png';
                $mapc_search[] = 'dc_format:image/gif';
                $pageSet = 12; // 그림보기에 이쁘게 불러오는 갯수를 조정
                break;
            default:
                $pageSet = 10;
                break;
        }

    } // BLOCK

    } // BLOCK

    { // BLOCK:search_query:20140101:검색 조건에 따라서 넘김값 만들기

        @include($PATH['mapc']['root'] . 'model/search_arg.proc.php');

    } // BLOCK

    { // BLOCK:set_var_by_mapc_cate:20131123:mapc_cate 별로 화면 출력 정하기

    { // BLOCK:search_list:20131115:검색할 태그,주제,포맷 값들 리스트 가져오기 (리스트 화면 검색 옵션에 출력하기 위함)

        // #TODO 검색속도를 위해서 DB에서 긁어오는게 아니라 텍스트화일(검색옵션.txt 또는 검색옵션.php) 만들어두고 거기서 검색옵션을 가져오게끔~ 새글이 등록되면 검색옵션.php도 변경되게끔하고~
        $so_query = "
            SELECT distinct postmeta_key, postmeta_value
              FROM " . $CONFIG_DB['prefix'] . "mapc_postmeta
             WHERE postmeta_key = :search_key
            ";

        $so_sth = $CONFIG_DB['handler']->prepare($so_query);

        $so_search_key = 'dc_subject';
        $so_sth->bindParam(':search_key', $so_search_key, PDO::PARAM_STR);
        $so_sth->execute();
        $so_rlt['dc_subject'] = $so_sth->fetchAll(PDO::FETCH_ASSOC);

        $so_search_key = 'dc_type';
        $so_sth->bindParam(':search_key', $so_search_key, PDO::PARAM_STR);
        $so_sth->execute();
        $so_rlt['dc_type'] = $so_sth->fetchAll(PDO::FETCH_ASSOC);

        $so_search_key = 'dc_format';
        $so_sth->bindParam(':search_key', $so_search_key, PDO::PARAM_STR);
        $so_sth->execute();
        $so_rlt['dc_format'] = $so_sth->fetchAll(PDO::FETCH_ASSOC);

        $so_search_key = 'dc_language';
        $so_sth->bindParam(':search_key', $so_search_key, PDO::PARAM_STR);
        $so_sth->execute();
        $so_rlt['dc_language'] = $so_sth->fetchAll(PDO::FETCH_ASSOC);

        $so_search_key = 'dc_coverage';
        $so_sth->bindParam(':search_key', $so_search_key, PDO::PARAM_STR);
        $so_sth->execute();
        $so_rlt['dc_coverage'] = $so_sth->fetchAll(PDO::FETCH_ASSOC);

    } // BLOCK

    if($mapc_cate != 'tag') { // 출력하려는 화면이 태그일 경우에는 검색이 필요없으므로...

        { // BLOCK:list_get:20131101:리스트 가져오기

            $query = "SELECT SQL_CALC_FOUND_ROWS post_uid, post_lang, post_title, post_content, post_origin_type, post_origin_url, post_write_date FROM " . $CONFIG_DB['prefix'] . "mapc_post " . $search_query . " ORDER BY post_write_date DESC LIMIT :page, :pageSet ";

            $sth       = $CONFIG_DB['handler']->prepare($query);
            $mapc_page = $_REQUEST['mapc_page'] ? (int)$_REQUEST['mapc_page'] : 1;
            $page      = ($mapc_page - 1) * $pageSet;

            $sth->bindParam(':page',    $page,    PDO::PARAM_INT);
            $sth->bindParam(':pageSet', $pageSet, PDO::PARAM_INT);

            // 검색값 넣기 #ID:ab9102312
            include($PATH['mapc']['root'] . 'model/search_var.proc.php');

            $sth->execute();

            // 페이징에 필요한 전체 갯수 구하기
            $arg['total'] = $CONFIG_DB['handler']->query('SELECT FOUND_ROWS();')->fetch(PDO::FETCH_COLUMN);

            while($result = $sth->fetch(PDO::FETCH_ASSOC)) {

                $tmp = explode("/", $result['post_origin_type']);
                $result['file_type'] = $tmp[0];
                unset($tmp);
                $result['file_url'] = $PATH['mapc']['data'] . $result['post_origin_url'];
                $post_list[] = $result;

            }

        } // BLOCK

        { // BLOCK:paging:20131028:페이징 출력

            include_once(MODULE_PATH . 'paging/config/config.php');
            include_once(MODULE_PATH . 'paging/model/paging_gen.func.php');

            $arg['page']     = $mapc_page ? $mapc_page : 1;
            $arg['page_key'] = 'mapc_page';
            $arg['pageSet']  = $pageSet;
            $arg['url']      = $URL['mapc']['list'] . $url_search_addition;

            $paging = module_paging_gen($arg);

            $TPL_DATA['paging']['file'] = $PATH['paging']['root'] . 'view/basic/paging.tpl.php';
            $TPL_DATA['paging']['data'] = $paging;

        } // BLOCK

    } else { // if($mapc_cate != 'tag')

        $query = "
            select postmeta_value as name, count(postmeta_value) as num from " . $CONFIG_DB['prefix'] . "mapc_postmeta 
             where postmeta_key = 'dc_subject'
             group by postmeta_value
             having count(postmeta_value) > 0
              order by count(postmeta_value) desc
            ";

        $sth = $CONFIG_DB['handler']->prepare($query);

        $sth->execute();
        $tag_list = $sth->fetchAll(PDO::FETCH_ASSOC);

    } // if($mapc_cate != 'tag') } else {

} // Model : Tail

// ======================================================================

{ // View : Head

    $publish_data['side1_files'][] = $PATH['mapc']['root'] . 'view/basic/search_option.view.php';
    $publish_data['head']['css']['jquery-ui.min.css']    = $URL['core']['root'] . 'res/jquery-ui/css/default/';
    $publish_data['head']['js']['jquery.min.js']    = $URL['core']['root'] . 'res/jquery/';
    $publish_data['head']['js']['jquery-ui.min.js'] = $URL['core']['root']  . 'res/jquery-ui/js/';

    // $mapc_cate 값에 따라 출력형식 지정하기
    switch($mapc_cate) {
        case 'tag':
            $VIEW['skin_file'] = 'list_tag.view.php';
            break;

        case 'date':
            // fullcalendar
            $publish_data['head']['css']['fullcalendar.css']       = $URL['core']['root'] . 'res/fullcalendar/';
            $publish_data['head']['css']['fullcalendar.print.css'] = $URL['core']['root'] . 'res/fullcalendar/';
            $publish_data['head']['js']['fullcalendar.min.js']     = $URL['core']['root'] . 'res/fullcalendar/';
            $VIEW['skin_file'] = 'list_calenda.view.php';

            break;

        case 'image':
            $VIEW['skin_file'] = 'list_album.view.php';
            break;

        default:
            $VIEW['skin_file'] = 'list.view.php';
            break;
    }

    // #TODO theme 또는 skin에 따라서 basic이 아니라 다른 스킨도 불러올 수 있도록...
    $section_file = $PATH['mapc']['root'] . 'view/basic/' . $VIEW['skin_file'];
    include_once(PROC_PATH . 'publish.proc.php');

} // View : Tail

// end of file

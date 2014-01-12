<?php
if(!defined('__MAPC__')) { exit(); }

/**
 * 글보기
 */
// #TODO 똑같은 주제/형태의 글 다시 쓰기 (새로운 UID로)
// #TODO 제목 -> SLUG로 바꿀 때 특수문자 제거 (쌍따옴표 마침표 따위)
// #TODO 마크다운 또는 텍스트는 첫줄(제목)을 생략하고 출력

require(INIT_PATH.'init.head.php');
{ // Model : Head

    { // BLOCK:post_get:20131023:글 정보 가져오기

        $arg['mapc_lang'] = $_REQUEST['mapc_lang'] ? $_REQUEST['mapc_lang'] : $CONFIG['lang'];
        include_once($PATH['mapc']['root'] . 'model/post_get.proc.php');

    } // BLOCK

    { // BLOCK:personal_info_get:2013-01-18:로그인한 사용자의 개별 디렉터리 반환

        // $arg['user_dir'], $arg['data_dir'] return
        include($PATH['mapc']['root'] . 'model/path_get_per_user.proc.php');

    } // BLOCK

    { // BLOCK:get_data:2012081701:읽으려는 파일의 종류, 파일 위치 가져오기

        $data_origin = $PATH['mapc']['data'] . $arg['user_dir'] . 'original/' . $postmeta_info['mapc_dir'][0] . $postmeta_info['rdf_about'][0];
        $data_thum   = $PATH['mapc']['data'] . $arg['user_dir'] . 'thum/'     . $postmeta_info['mapc_dir'][0] . $postmeta_info['rdf_about'][0];
        $arg['file_name_qwer'] = is_file($data_thum) ? $data_thum : $data_origin;

        $tmp = pathinfo($postmeta_info['rdf_about'][0]);
        $postmeta_info['slug'][0] = $tmp['filename'];

    } // BLOCK

    { // BLOCK:prev_and_next:20131218:이전글,다음글 UID 가져오기

        // #TODO 검색조건에 따라서 이전글 다음글 불러오는 로직도 바꿀것!!!
        // #TODO DB에서 바로불러오는게 아니라 텍스트에 각 검색결과에 따른 이전글 다음글을 저장해놓고 (search_type-text_subject-memo.txt 형태) 불러오기는 어떨까?

        $query = "
            SELECT post_uid FROM mapc_post WHERE post_seq < ? ORDER BY post_seq DESC LIMIT 1
            ";
        $sth = $CONFIG_DB['handler']->prepare($query);
        $sth->execute(array($post_info['post_seq']));
        $view_prev = $sth->fetch();

    } // BLOCK

    { // BLOCK:get_another_lang:20131230:다른 언어로 된 글 제목 가져오기

        $query = "
            select postmeta_lang, postmeta_value
              from mapc_postmeta
             where postmeta_key = 'dc_title'
               and postmeta_post_uid = ?
            ";
        $sth = $CONFIG_DB['handler']->prepare($query);
        $sth->execute(array($arg['mapc_uid']));
        $title_another_lang = $sth->fetchAll(PDO::FETCH_ASSOC);

    } // BLOCK

    { // BLOCK:get_data:2012081701:읽으려는 파일의 종류, 파일 위치 가져오기

        include($PATH['mapc']['root'] . 'model/convert_file.func.php');

    } // BLOCK

} // Model : Tail
require(INIT_PATH.'init.tail.php');

// ======================================================================

{ // View : Head

    $publish_data['head']['meta'] = $CONFIG['meta'];
    $publish_data['head']['meta']['title']       = $post_info['post_title'] . ' - ' . $publish_data['head']['meta']['title'];
    $publish_data['head']['meta']['type']        = $post_info['post_origin_type'];
    if(strpos($post_info['post_origin_type'], 'image/') == true) {
        $publish_data['head']['meta']['image']   = $post_info['post_origin_url'];
    } else {
        // #TODO 사이트 기본 이미지
    }
    // #TODO mod_rewrite에서 /module/page/[글번호] 가져올 수 있게끔 처리!!!
    $publish_data['head']['meta']['url']         = $URL['mapc']['view'] . '&mapc_uid=' . $arg['mapc_uid'];
    $publish_data['head']['meta']['description'] = $postmeta_info['dc_description'][0];
    $publish_data['head']['meta']['keywords']    = (is_array($postmeta_info['dc_subject'])) ? implode(",", $postmeta_info['dc_subject']) : '';

    $section_file = $PATH['mapc']['root'] . 'view/basic/view.view.php';
    include_once(PROC_PATH . 'publish.proc.php');

} // View : Tail

// end of file

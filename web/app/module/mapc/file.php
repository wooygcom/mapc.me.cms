<?php
if(!defined('__MAPC__')) { exit(); }

/**
 * 화일 출력
 */

require(INIT_PATH.'init.head.php');
{ // Model : Head

    { // BLOCK:auth_check:20131123:권한체크

        // 권한체크
        include_once(MODULE_PATH . 'user/model/auth_check.func.php');
        $result = module_user_auth_check($_SESSION['mapc_user_uid'], 'view_big_file');

    } // BLOCK

    // UID값을 기준으로 원본 화일을 가져오고
    $uid = $_REQUEST['mapc_uid'];
	$query = 'SELECT post_origin_type, post_origin_url FROM mapc_post WHERE post_uid = "' . $uid . '"';

	$sth = $CONFIG_DB['handler']->prepare($query);
	$sth->execute();

	$file_info = $sth->fetch(PDO::FETCH_ASSOC);

    // header 출력
    header('Content-type: ' . $file_info['post_origin_type']);

    // 원본 형식에 따라 내용 출력
    switch($file_info['post_origin_type']) {
        case 'image/jpeg':
        case 'image/gif':
        case 'image/png':
            $url      = $PATH['mapc']['data'] . $file_info['post_origin_url'];
            $fp       = fopen($url,"r");
            $img_data = fread($fp, filesize($url));
            fclose($fp);

            echo $img_data;
        break;
    }

} // Model : Tail
require(INIT_PATH.'init.tail.php');

// this is it

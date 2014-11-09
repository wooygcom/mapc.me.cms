<?php
if(!defined('__MAPC__')) { exit(); }
/**
 * 상품등록/편집
 */

require(INIT_PATH.'init.db.php');
{ // Model : Head

    { // BLOCK:auth_check:20131123:권한체크

        // 권한체크
        include_once(MODULE_PATH . 'user/model/auth_check.func.php');
        $result = module_user_auth_check($_SESSION['mapc_user_uid'], 'mapc-shop-edit');

    } // BLOCK


    { // BLOCK:config_get:20131123:필요한 환경설정 불러오기

        // 환경설정 불러오기
		include_once(MODULE_PATH  . 'mapc/config/config.php');

    } // BLOCK


    { // BLOCK:mapc_edit_cate:20131125:글쓰기 종류별로 기본 입력해야 되는 값들을 미리 준비하기

        include(MODULE_PATH . 'mapc/edit.php');

    } // BLOCK

} // Model : Tail

// end of file

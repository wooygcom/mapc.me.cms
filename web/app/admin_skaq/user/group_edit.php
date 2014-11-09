<?php
if(!defined('__MAPC__')) { exit(); }

/**
 * 회원가입
 */

require(INIT_PATH . 'init.db.php');
{ // Model : Head

    { // BLOCK:auth_check:20131123:권한체크

        // 권한체크
        include_once(MODULE_PATH . 'user/model/auth_check.func.php');
        $result = module_user_auth_check($_SESSION['mapc_user_uid'], 'group_edit');

    } // BLOCK

	{ // BLOCK:module_include:20120912:필요한 파일 첨부

	} // BLOCK

	{ // BLOCK:get_data:20140428:DB자료 가져오기

		$query = "
			select usermeta_value
			  from " . $CONFIG_DB['prefix'] . "user_infometa
			 where usermeta_user_uid = GROUP-GROUPID
			   and usermeta_key = sub_user
			";

		#TODO!!!!!!!!!!!!!!
		$CONFIG['dbh']->prepare($query);

	} // BLOCK

} // Model : Tail

// ======================================================================

{ // View : Head

	{ // BLOCK:echo_view:20130923:화면출력

		$section_file = $PATH_ADMIN['user']['root'] . 'view/basic/group_edit.view.php';
		include_once(PROC_PATH . 'publish.proc.php');

	}

} // View : Tail

// end of file

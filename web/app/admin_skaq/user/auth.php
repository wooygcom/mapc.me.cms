<?php
if(!defined('__MAPC__')) { exit(); }

/**
 * 권한 설정
 */

require(INIT_PATH.'init.db.php');
{ // Model : Head

	{ // BLOCK:argument_check:20140717:넘김값 체크

		$user_uid = $_REQUEST['user_uid'];

	} // BLOCK

    { // BLOCK:auth_check:20131123:권한체크

        // 권한체크
        include_once(MODULE_PATH . 'user/model/auth_check.func.php');
        $result = module_user_auth_check($_SESSION['mapc_user_uid']);

    } // BLOCK

	{ // BLOCK:auth_list_get:20140714:권한 리스트 가져오기

		$query = "
			SELECT usermeta_value, usermeta_desc
			  FROM `mc_user_infometa`
			 WHERE `usermeta_key` = 'auth'
			   and `usermeta_user_uid` = :user_uid
			";
		$sth = $CONFIG_DB['handler']->prepare($query);
		$sth->bindParam(':user_uid', $user_uid);
		$sth->execute();

		while($result = $sth->fetch(PDO::FETCH_ASSOC)) {

			$post_list[] = $result;

		}

	} // BLOCK

} // Model : Tail


// ======================================================================

{ // View : Head

    $section_file = $PATH_ADMIN['user']['root'] . 'view/basic/auth.view.php';
	include_once(PROC_PATH . 'publish.proc.php');

} // View : Tail

// end of file

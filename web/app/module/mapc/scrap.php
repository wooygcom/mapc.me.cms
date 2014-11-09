<?php
if(!defined('__MAPC__')) { exit(); }

/**
 * 글편집
 */

require(INIT_PATH.'init.db.php');
{ // Model : Head

	{ // BLOCK:auth_check:20131111:권한체크

        // 권한체크
        include_once(MODULE_PATH . 'user/model/auth_check.func.php');
        $result = module_user_auth_check($_SESSION['mapc_user_uid'], '', 'scrap');

	} // BLOCK

} // Model : Tail

// ======================================================================

{ // View : Head

    $section_file = $PATH['mapc']['root'] . 'view/basic/scrap.view.php';
	include_once(PROC_PATH . 'publish.proc.php');

} // View : Tail

// end of file

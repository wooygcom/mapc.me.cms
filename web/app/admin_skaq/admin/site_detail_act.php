<?php
if(!defined('__MAPC__')) { exit(); }

/**
 * 회원가입
 */

require(INIT_PATH . 'init.head.php');
{ // Model : Head

	{ // BLOCK:module_include:20120912:필요한 파일 첨부
print_r($_REQUEST);
	} // BLOCK

} // Model : Tail
require(INIT_PATH . 'init.tail.php');

// ======================================================================

{ // View : Head

	{ // BLOCK:echo_view:20130923:화면출력


	    $message      = '완료';
	    $display_type = 'message';
	    $url = $URL_ADMIN['admin']['site_detail'];
	    include PROC_PATH . 'publish_simple.proc.php';

	}

} // View : Tail

// end of file
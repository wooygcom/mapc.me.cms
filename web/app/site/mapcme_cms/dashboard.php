<?php
if(!defined('__MAPC__')) { exit(); }

require(INIT_PATH . 'init.head.php');
{ // MODEL : Start

} // MODEL : Finish
require(INIT_PATH . 'init.tail.php');

{ // View : Start

	$section_file = $PATH['core']['skin'] . 'basic/dashboard.view.php';
	include_once(PROC_PATH . 'publish.proc.php');

} // View : Finish

// this is it

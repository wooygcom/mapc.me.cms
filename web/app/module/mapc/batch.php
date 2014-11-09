<?php
if(!defined('__MAPC__')) { exit(); }
/**
 * 일괄편집
 */

require(INIT_PATH.'init.db.php');
{ // Model : Head

} // Model : Tail

// ======================================================================

{ // View : Head

    $publish_data['head']['css']['jquery-ui.min.css'] = $URL['core']['root'] . 'res/jquery-ui/css/default/';
    $publish_data['head']['js']['jquery.min.js']      = $URL['core']['root'] . 'res/jquery/';
    $publish_data['head']['js']['jquery-ui.min.js']   = $URL['core']['root'] . 'res/jquery-ui/js/';

    $mapc_edit_mode = 'batch';
    $section_file = $PATH['mapc']['root'] . 'view/basic/edit.view.php';
	include_once(PROC_PATH . 'publish.proc.php');

} // View : Tail

// end of file

<?php
if(!defined('__MAPC__')) { exit(); }

/**
 * URL & PATH
 */
$MODULE['mapc-shop']['installed'] = TRUE;

$PATH['mapc-shop']['root'] = MODULE_PATH . 'mapc-shop/';
$PATH['mapc-shop']['view'] = MODULE_PATH . 'mapc-shop/view/';
$PATH['mapc-shop']['data'] = DATA_PATH . 'mapc-shop/';

$URL['mapc-shop']['root']     = $URL['core']['root'] . '?core_modl=mapc';
$URL['mapc-shop']['wish-list']     = $URL['mapc-shop']['root'] . '&core_page=wish-list';

/**
 * 모듈 환경설정
 *
 * 각 모듈별 환경설정이 필요할 경우 이곳에서 설정
 */

{ // BLOCK:module_config:20131214:모듈별 환경설정

} // BLOCK

// end of file

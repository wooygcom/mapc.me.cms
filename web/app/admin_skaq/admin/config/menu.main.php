<?php
	if(!defined('__MAPC__')) { exit(); }

	$MENU = isset($MENU) ? $MENU : array();

	$MENU['_default_submenu'] = 'mapc';

    $MENU['admin']['admin']['_title']  = '관리';
    $MENU['admin']['admin']['_link']   = $URL['core']['root'] . '?core_admn=admin&core_page=dashboard';
    $MENU['admin']['admin']['_key']    = 'admin';
    $MENU['admin']['admin']['_sub']['info']['_title'] = '사이트정보';
    $MENU['admin']['admin']['_sub']['info']['_link']  = $URL['core']['root'] . '?core_admn=user&core_page=list';
    $MENU['admin']['admin']['_sub']['module']['_title'] = '모듈';
    $MENU['admin']['admin']['_sub']['module']['_link']  = $URL['core']['root'] . '?core_admn=user&core_page=list';

    // #TODO 설치된 모듈에 맞게 메뉴구성!!!!!
    $MENU['admin']['user']['_title']  = '사용자';
    $MENU['admin']['user']['_link']   = $URL['core']['root'] . '?core_admn=user&core_page=list';
    $MENU['admin']['user']['_key']    = 'user';
    $MENU['admin']['user']['_sub']['list']['_title'] = '리스트';
    $MENU['admin']['user']['_sub']['list']['_link']  = $URL['core']['root'] . '?core_admn=user&core_page=list';

    // #TODO 설치된 모듈에 맞게 메뉴구성!!!!!
    $MENU['admin']['mapc']['_title']  = '맵시';
    $MENU['admin']['mapc']['_link']   = $URL['core']['root'] . '?core_admn=user&core_page=list';
    $MENU['admin']['mapc']['_key']    = 'mapc';
    $MENU['admin']['mapc']['_sub']['list']['_title'] = '리스트';
    $MENU['admin']['mapc']['_sub']['list']['_link']  = $URL['core']['root'] . '?core_admn=admin&core_page=list';

// this is it

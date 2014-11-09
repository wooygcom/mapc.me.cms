<?php
	if(!defined('__MAPC__')) { exit(); }

	$MENU = isset($MENU) ? $MENU : array();

	$MENU['_default_submenu'] = 'mapc';

    $MENU['admin']['admin']['_title']  = _('관리');
    $MENU['admin']['admin']['_link']   = $URL['core']['root'] . '?core_admn=admin&core_page=dashboard';
    $MENU['admin']['admin']['_key']    = 'admin';
    $MENU['admin']['admin']['_sub']['info']['_title'] = _('사이트정보');
    $MENU['admin']['admin']['_sub']['info']['_link']  = $URL['core']['root'] . '?core_admn=admin&core_page=site_detail';
    $MENU['admin']['admin']['_sub']['module']['_title'] = _('모듈');
    $MENU['admin']['admin']['_sub']['module']['_link']  = $URL['core']['root'] . '?core_admn=admin&core_page=module';
    $MENU['admin']['admin']['_sub']['page']['_title'] = _('페이지');
    $MENU['admin']['admin']['_sub']['page']['_link']  = $URL['core']['root'] . '?core_admn=admin&core_page=page';

    // #TODO 설치된 모듈에 맞게 메뉴구성!!!!!
    $MENU['admin']['user']['_title']  = _('사용자');
    $MENU['admin']['user']['_link']   = $URL['core']['root'] . '?core_admn=user&core_page=list';
    $MENU['admin']['user']['_key']    = 'user';
    $MENU['admin']['user']['_sub']['group']['_title'] = _('그룹');
    $MENU['admin']['user']['_sub']['group']['_link']  = $URL['core']['root'] . '?core_admn=user&core_page=group';
    $MENU['admin']['user']['_sub']['list']['_title'] = _('사용자');
    $MENU['admin']['user']['_sub']['list']['_link']  = $URL['core']['root'] . '?core_admn=user&core_page=list';

    $MENU['admin']['menu']['_title']  = _('메뉴');
    $MENU['admin']['menu']['_link']   = $URL['core']['root'] . '?core_admn=menu&core_page=list';
    $MENU['admin']['menu']['_key']    = 'menu';
    $MENU['admin']['menu']['_sub']['site']['_title'] = _('전체');
    $MENU['admin']['menu']['_sub']['site']['_link']  = $URL['core']['root'] . '?core_admn=menu&core_page=list';
    $MENU['admin']['menu']['_sub']['user']['_title'] = _('회원별');
    $MENU['admin']['menu']['_sub']['user']['_link']  = $URL['core']['root'] . '?core_admn=menu&core_page=user';

    $MENU['admin']['mapc']['_title']  = _('맵시');
    $MENU['admin']['mapc']['_link']   = $URL['core']['root'] . '?core_admn=mapc&core_page=list';
    $MENU['admin']['mapc']['_key']    = 'mapc';
    $MENU['admin']['mapc']['_sub']['list']['_title'] = _('리스트');
    $MENU['admin']['mapc']['_sub']['list']['_link']  = $URL['core']['root'] . '?core_admn=mapc&core_page=list';

// this is it

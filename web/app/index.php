<?php
define('__MAPC__', true);

/**
 *  사이트별 환경설정 불러오기
 */

{ // BLOCK:site_config_load:20141108:사이트 환경설정 불러오기

	// 필요한 경우에만 원하는 site환경설정 파일을 만들고 include하면 됨 (site.shopping_mall.php, site.company_intro.php)
	define('SITE_CODE', 'mapcme_cms');

	$SITE_FILE = 'site.' . SITE_CODE . '.php';

	if(is_file($SITE_FILE)) {

		include_once($SITE_FILE);

	} else {

		include_once('site.default.php');

	}

	unset($SITE_FILE);

}

/**
 * 페이지 불러오기
 * 예1 : module=bbs&page=list -> module/bbs/list.php
 * 예2 : page=introduce -> siite/myhome/introduce.php
 */

{ // BLOCK:page_load:2012080901:페이지 불러오기

	if($CONFIG['admin']) {

		include_once( ADMIN_PATH . $CONFIG['admin'] . '/' . $CONFIG['page'] . '.php' );

	} else if($CONFIG['module'] == 'home') {

		include_once( SITE_PATH . $CONFIG['page'] . '.php' );

	} else {

		include_once( MODULE_PATH . $CONFIG['module'] . '/' . $CONFIG['page'] . '.php' );

	}

} // BLOCK

// end of file


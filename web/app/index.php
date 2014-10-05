<?php
define('__MAPC__', true);

// 필요할 경우 원하는 site환경설정 파일을 만들고 include하면 됨 (site.news.php, site.bbs.php)
define('SITE_CODE', 'mapcme_cms');

$SITE_FILE = 'site.' . SITE_CODE . '.php';

if(is_file($SITE_FILE)) {
	include_once($SITE_FILE);
} else {
	include_once('site.default.php');
}	

// end of file

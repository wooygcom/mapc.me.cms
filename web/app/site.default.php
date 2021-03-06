<?php
if(!defined('__MAPC__')) { exit(); }

{ // BLOCK:path_set:2012080901:경로지정

	// 기본디렉토리, 아래의 디렉토리 위치를 다른 곳으로 변경할 경우 이 값을 변경해줘야 함
	// 디렉토리를 지정할 때는 언제나 뒷부분에 /(슬래시)를 붙여야 합니다. (dir1/(O), dir2(X))
	define('APP_PATH',  ROOT_PATH.'app/');		// 애플리케이션(프로그램 모음) 디렉토리, Application Directory
        // #TODO admin_abcd처럼 뒷 네자리는 보안을 위해 임의의 값으로 지정 (설치할 때 지정할 수 있게)
		define('ADMIN_PATH',  APP_PATH . 'admin_skaq/');	// 관리자 프로그램 모음, Admin Directory
		define('LAYOUT_PATH', APP_PATH . 'layout/');
		define('MODULE_PATH', APP_PATH . 'module/');	// 모듈 디렉토리, Module Directory
		define('PLUGIN_PATH',  APP_PATH . 'plugin/');	// Resources
		define('SITE_PATH',   APP_PATH . 'site/' . SITE_CODE . '/');	// Specialize for each site, You can change this if you use another site.

        if(is_dir(SITE_PATH . 'config/')) { // 실제 config 디렉토리가 있을 경우 [config]이 환경설정 디렉터리
            define('CONFIG_PATH', SITE_PATH . 'config/');
        } else { // config 디렉토리가 없을 경우 [config.sample] 디렉토리가 환경설정 디렉터리
            define('CONFIG_PATH', SITE_PATH . 'config.sample/');
        }

	define('SYSTEM_PATH',  ROOT_PATH.'system/');
		define('INIT_PATH',    SYSTEM_PATH .'init/');
		define('LIBRARY_PATH', SYSTEM_PATH .'library/');
		define('PROC_PATH',    SYSTEM_PATH .'proc/');

	define('DATA_PATH', ROOT_PATH . 'data/');
	define('TEMP_PATH', ROOT_PATH . 'temp/');

} // BLOCK

{ // BLOCK:config:2012112201:환경설정

	/**
	 * 기본환경설정
	 *
	 * 제목, 인코딩, 시간대 처럼
	 * 관리자가 변경은 가능하지만 추가 또는 삭제하면 않되는 설정값들
	 */
	include_once(CONFIG_PATH . 'config.php');

	/**
	 * 사용자환경설정
	 *
	 * 사용자의 입맛에 맞게 추가할 환경설정들
	 * 특정 모듈에 관한 환경설정들...
	 */
	if(is_file(CONFIG_PATH . 'custom.php')) {
		include_once(CONFIG_PATH . 'custom.php');
	}

} // BLOCK

// end of file

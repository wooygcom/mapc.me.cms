<?php
/**
 *
 * 화면출력 일괄처리 간단버전
 *
 * @param string $display_type 어떤 방식으로 화면에 출력할지
 * @param string $url          이동하려는 페이지 주소
 * @param string $message      출력하려는 내용
 *
 * @example
 * 		$display_type = 'message';
 * 		$message = _('로그인 되었습니다.');
 * 		$url     = $URL['core']['root'];
 * 		include PROC_PATH . 'publish_simple.proc.php';
 * 
 */

if(!defined('__MAPC__')) { exit(); }

{ // BLOCK:unset_security_var:2014-11-08:템플릿 출력에는 불필요한 환경설정 변수 삭제

	unset($CONFIG_SECRET);
	unset($CONFIG_DB);

} // BLOCK


{ // BLOCK:publish_hook_include:2013-01-21:publish hook 파일 첨부

    $temp_head_code = '';
    switch($display_type) {

    // 페이지 이동일 경우
        case 'move':

            $temp_head_code = '<meta http-equiv="refresh" content="0;url=' . $url . '">';
            $message        = (! empty($message)) ? $message : $url;

            echo '<html><head><meta charset="utf-8">';
            echo $temp_head_code;
            echo '</head><body>';
            echo '<a href="' . $url . '">' . $message . '</a>';
            echo '</body></html>';

            break;

        case 'message':
		default:

            $publish_data['headhook']['headhook_metatag.tpl.php'] = LAYOUT_PATH . 'basic/';
            $publish_data['head']['css']['bootstrap.min.css']	= LAYOUT_PATH . $CONFIG['layout'] . '/';
            include(LAYOUT_PATH . $CONFIG['layout'] . '/html_message.view.php');
            break;

    }

} // BLOCK

// end of file

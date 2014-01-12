<?php
/**
 * 화일 타입별로 브라우저 출력용으로 변환
 *
 * 브라우저 출력에 맞게끔 각 화일을 변환해주는 함수, 화면에 표시할 수 없는 화일은 다운로드링크로 변환
 */

function module_mapc_convert_file($type, $origin_file, &$content, $option = array()) {

    global $PATH;
    global $URL;

    include($PATH['mapc']['root'] . 'model/path_get_per_user.proc.php');

    switch($type) {
        case 'image/jpeg':
        case 'image/gif':
        case 'image/png':
            $file_thum = str_replace('/original/', '/thum/', $origin_file);
            $file_url = is_file($file_thum) ? $file_thum : $origin_file;

            // #TODO 큼지막한 화일 바로보기 기능
            // #TODO 큼지막한 화일에도 copyright기능
            echo '<a href="#dummy" data-link="' . $URL['mapc']['file_view'] . '&mapc_uid=' . $option['post_uid'] . '"><img src="' . $file_url . '" style="width:100%;" /></a>';
            echo '<p>' . $content . '</p>';
            break;

        case 'text/url':
        case 'text/plain':
        default:
            echo '<p>' . $content . '</p>';
            break;

        case 'text/markdown':
            require($PATH['mapc']['root'] . 'model/convert_md_to_html.proc.php');
            echo $content_html;
            break;

    }

}

// this is it

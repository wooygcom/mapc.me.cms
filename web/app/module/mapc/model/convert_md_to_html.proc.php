<?php
/**
 * 마크다운 파일 변환
 * @param string $arg['file_name_qwer'] 원본 파일의 위치/이름
*/

require_once LIBRARY_PATH . 'Michelf/MarkdownInterface.php';
require_once LIBRARY_PATH . 'Michelf/Markdown.php';
use Michelf\Markdown;

spl_autoload_register(function($class){
	require preg_replace('{\\\\|_(?!.*\\\\)}', DIRECTORY_SEPARATOR, ltrim($class, '\\')).'.php';
});

// Read file and pass content through the Markdown praser
$content_html = Markdown::defaultTransform($content);

// tail of file

<?php
if(!defined('__MAPC__')) { exit(); }

/**
 * 글편집
 */

require(INIT_PATH.'init.head.php');
{ // Model : Head

	{ // BLOCK:auth_check:20131111:권한체크

        // 권한체크
        include_once(MODULE_PATH . 'user/model/auth_check.func.php');
        $result = module_user_auth_check($_SESSION['mapc_user_uid'], 'del');

	} // BLOCK

	{ // BLOCK:arg_get:20131111:넘김값 정리

		$mapc_uid  = $_REQUEST['mapc_uid'];
        $mapc_lang = $_REQUEST['mapc_lang'] ? $_REQUEST['mapc_lang'] : $CONFIG['lang'];

	} // BLOCK

	{ // BLOCK:del_file:20131111:연결된 화일도 지우기

        $query = "
            SELECT post_origin_url
              FROM mapc_post
             WHERE post_uid  = ?
               AND post_lang = ?
            ";

        $sth = $CONFIG_DB['handler']->prepare($query);
        $sth->execute( array($mapc_uid, $mapc_lang) );

        $return = $sth->fetch(PDO::FETCH_ASSOC);

        $query = "
            SELECT COUNT(post_origin_url) as cnt
              FROM mapc_post
             WHERE post_origin_url = '" . $return['post_origin_url'] . "'
            ";
        $sth = $CONFIG_DB['handler']->prepare($query);
        $sth->execute( array($return['post_origin_url']) );

        $return2= $sth->fetch(PDO::FETCH_ASSOC);

        // 다른 post에서도 연결되어있는 화일이면 DB에서만 지우고, 그게 아니면 실제 화일도 지우기
        if($return2['cnt'] <= 1) {

            $file = $PATH['mapc']['data'] . $return['post_origin_url'];

            if(is_file($file)) {
                unlink($file);
                unlink($file . '.rdf');
            }

        }

        unset($return);
        unset($return2);

	} // BLOCK

	{ // BLOCK:del_article:20131208:글삭제

        $query = " delete from mapc_post where post_uid = ? and post_lang = ? ";

        $sth = $CONFIG_DB['handler']->prepare($query);
        $sth->execute( array($mapc_uid, $mapc_lang) );

        $query = " delete from mapc_postmeta where postmeta_post_uid = ? and (postmeta_lang = ? OR postmeta_lang is null) ";

        $sth = $CONFIG_DB['handler']->prepare($query);
        $sth->execute( array($mapc_uid, $mapc_lang) );

	} // BLOCK

} // Model : Tail
require(INIT_PATH.'init.tail.php');

// ======================================================================

{ // View : Head

    $display_type = 'move';
    $url = $URL['mapc']['list'];
    include PROC_PATH . 'publish_simple.proc.php';

} // View : Tail

// end of file

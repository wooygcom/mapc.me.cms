<?php
/**
 * 키 넣기...
 *
 * @param string $uid
 * @param string $meta
 * @param object $option['dbh'];
 * @param string $option['lang']; // 언어코드 (새로운 코드)
 * @param string $option['lang_before']; // 언어코드 (기존에 사용했던, 언어코드를 변경할 때에만 값이 들어옴(kr->kor 처럼)
 */
function module_mapc_postmeta_insert(&$uid, &$meta, &$option = array()) {

    $lang        = $option['lang'];
    $lang_before = $option['lang_before'] ? $option['lang_before'] : $option['lang'];

    // #TODO UPDATE를 하는게 좋겠지만, 현재로서는 dc_identifier기준으로 기존자료 삭제 후 다시 입력
    $query = "
        delete from mapc_postmeta where postmeta_post_uid = '" . $uid . "' and postmeta_lang = '" . $lang_before . "'
        ";

    $option['dbh']->exec($query);

	$query = "
		INSERT INTO mapc_postmeta
		   SET postmeta_lang     = ?
             , postmeta_post_uid = ?
			 , postmeta_key      = ?
			 , postmeta_value    = ?
		";

	$res = $option['dbh']->prepare($query);

	foreach($meta as $meta_key => $meta_var) {

		// var가 배열일 경우 foreach
		if(is_array($meta_var) || is_object($meta_var)) {

			foreach($meta_var as $var) {

				if( strlen($var) > 0 ) {

					$return = $res->execute( array($lang, $uid, $meta_key, $var) );

				}

			}

		// 아니면 그냥 insert
		} else {

			if( ! empty($meta_var) ) {

				$return = $res->execute( array($lang, $uid, $meta_key, $meta_var) );

			}

		}

	}

    return $return;

}

// this is it

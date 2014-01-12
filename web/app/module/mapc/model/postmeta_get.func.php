<?php

function module_mapc_postmeta_get($post_id, $lang, $option = array()) {

	$dbh = $option['dbh'];

    $query = '
        select postmeta_post_uid, postmeta_lang, postmeta_key, postmeta_value
          from mapc_postmeta
         where postmeta_post_uid = ?
           and postmeta_lang = ?
        ';

    $sth = $dbh->prepare($query);
    $sth->execute( array($post_id, $lang) );
    while($result = $sth->fetch(PDO::FETCH_ASSOC)) {

        $key = $result['postmeta_key'];
        $val = $result['postmeta_value'];

        $return[$key][] = $val;

    }

    return $return;

}

// this is it

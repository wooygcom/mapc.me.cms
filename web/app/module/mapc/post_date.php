<?php
/**
 *
 * 글의 UID 가져오기
 *
 * @param string  $_REQUEST['mapc_search_key']  검색하려는 글의 제목
 *
 */

require(INIT_PATH.'init.head.php');
{ // Model : Head

    { // BLOCK:search_query:20140101:입력값 체크

        // 출력 키워드(리스트, 앨범, 달력, 꼬리표(태그)리스트...)
        $mapc_cate   = $_REQUEST['mapc_cate'];

        // 검색 옵션
        $mapc_srch_title = $_REQUEST['mapc_srch_title'];
        $mapc_search_key = $_REQUEST['mapc_search_key'];
        $mapc_search     = $_REQUEST['mapc_search'];
        $mapc_srch_lang  = $_REQUEST['mapc_srch_lang'];

        $mapc_date_from  = $_REQUEST['mapc_date_from'];
        $mapc_date_to    = $_REQUEST['mapc_date_to'];

    } // BLOCK

    { // BLOCK:search_query:20140101:검색 조건에 따라서 넘김값 만들기

        $where_link = ' and ';
        include($PATH['mapc']['root'] . 'model/search_arg.proc.php');

    } // BLOCK

    $date_start = date('Y-m-d', $_REQUEST['start']);
    $date_end   = date('Y-m-d', $_REQUEST['end']);

    $query = 'SELECT post_uid, post_lang, post_title, post_write_date FROM mapc_post WHERE post_write_date between :mapc_date_start and :mapc_date_end ' . $search_query;

    $sth = $CONFIG_DB['handler']->prepare($query);


    // 검색값 넣기 #ID:ab9102312
    include($PATH['mapc']['root'] . 'model/search_var.proc.php');
    $sth->bindParam(':mapc_date_start', $date_start);
    $sth->bindParam(':mapc_date_end',   $date_end);

    $sth->execute();

    $return = $sth->fetchAll(PDO::FETCH_ASSOC);

    foreach ($return as $var) {
        $row['id']    = $var['post_uid'];
        $row['title'] = stripslashes($var['post_title']);
        $row['start'] = stripslashes($var['post_write_date']);
		$row['url']   = $URL['mapc']['view'] . '&mapc_uid=' . $var['post_uid'] . '&mapc_lang=' . $var['post_lang'];
        $row_set[]    = $row; // build an array
    }

} // Model : Tail
require(INIT_PATH.'init.tail.php');

// ======================================================================

{ // View : Head

    echo json_encode($row_set);

} // View : Tail

// end of file

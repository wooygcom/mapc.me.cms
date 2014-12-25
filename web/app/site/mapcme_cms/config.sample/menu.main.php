<?php
	if(!defined('__MAPC__')) { exit(); }

	$MENU = isset($MENU) ? $MENU : array();

	include_once(MODULE_PATH . 'mapc/config/config.php');

	$MENU['_default_submenu'] = 'mapc';

    $MENU['home']['mapc']['_title']  = '맵시';
    $MENU['home']['mapc']['_link']   = $URL['core']['root'] . 'mapc/list/';
    $MENU['home']['mapc']['_key']    = 'mapc';

    {
        $MENU['home']['mapc']['_sub']['list']['_title'] = '리스트';
        $MENU['home']['mapc']['_sub']['list']['_link']  = $URL['mapc']['list'];
        $MENU['home']['mapc']['_sub']['list']['_sub']['album']['_title'] = '앨범(추천)';
        $MENU['home']['mapc']['_sub']['list']['_sub']['album']['_link']  = $URL['mapc']['list'] . 'mapc_cate/image/';
        $MENU['home']['mapc']['_sub']['list']['_sub']['album']['_sub']['animal']['_title'] = '동물';
        $MENU['home']['mapc']['_sub']['list']['_sub']['album']['_sub']['animal']['_link']  = $URL['mapc']['list'] . 'mapc_cate/image/mapc_search[]/dc_subject:반려동물/';
        $MENU['home']['mapc']['_sub']['list']['_sub']['album']['_sub']['satire']['_title'] = '풍자';
        $MENU['home']['mapc']['_sub']['list']['_sub']['album']['_sub']['satire']['_link']  = $URL['mapc']['list'] . 'mapc_cate/image/mapc_search[]/dc_subject:풍자/';
        $MENU['home']['mapc']['_sub']['list']['_sub']['calendar']['_title'] = '달력';
        $MENU['home']['mapc']['_sub']['list']['_sub']['calendar']['_link']  = $URL['mapc']['list'] . 'mapc_cate/date/';
        $MENU['home']['mapc']['_sub']['list']['_sub']['calendar']['_sub']['diary']['_title'] = '날적이';
        $MENU['home']['mapc']['_sub']['list']['_sub']['calendar']['_sub']['diary']['_link']  = $URL['mapc']['list'] . 'mapc_cate/date/mapc_search[]/dc_type:날적이/';
        $MENU['home']['mapc']['_sub']['list']['_sub']['tag']['_title'] = '꼬리표'; // 꼬리표 리스트
        $MENU['home']['mapc']['_sub']['list']['_sub']['tag']['_link']  = $URL['mapc']['list'] . 'mapc_cate/tag/';

        $MENU['home']['mapc']['_sub']['edit']['_title'] = '글쓰기/편집';
        $MENU['home']['mapc']['_sub']['edit']['_link']  = $URL['mape']['edit'];
    // #TODO 개인별로 글쓰기 종류 설정가능하도록!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $MENU['home']['mapc']['_sub']['edit']['_sub']['memo']['_title'] = '적바림';
        $MENU['home']['mapc']['_sub']['edit']['_sub']['memo']['_link']  = $URL['mapc']['edit'] . 'mapc_cate_edit/memo/';
        $MENU['home']['mapc']['_sub']['edit']['_sub']['diary']['_title'] = '날적이';
        $MENU['home']['mapc']['_sub']['edit']['_sub']['diary']['_link']  = $URL['mapc']['edit'] . 'mapc_cate_edit/diary/';
        $MENU['home']['mapc']['_sub']['edit']['_sub']['proverb']['_title'] = '좋은글';
        $MENU['home']['mapc']['_sub']['edit']['_sub']['proverb']['_link']  = $URL['mapc']['edit'] . 'mapc_cate_edit/proverb/';
        $MENU['home']['mapc']['_sub']['edit']['_sub']['satire']['_title'] = '풍자';
        $MENU['home']['mapc']['_sub']['edit']['_sub']['satire']['_link']  = $URL['mapc']['edit'] . 'mapc_cate_edit/satire/';
        $MENU['home']['mapc']['_sub']['edit']['_sub']['word']['_title'] = '이름씨';
        $MENU['home']['mapc']['_sub']['edit']['_sub']['word']['_link']  = $URL['mapc']['edit'] . 'mapc_cate_edit/word/';
        $MENU['home']['mapc']['_sub']['edit']['_sub']['animal_picture']['_title'] = '반려동물';
        $MENU['home']['mapc']['_sub']['edit']['_sub']['animal_picture']['_link']  = $URL['mapc']['edit'] . 'mapc_cate_edit/animal_picture/';
        $MENU['home']['mapc']['_sub']['edit']['_sub']['landscape_picture']['_title'] = '풍경';
        $MENU['home']['mapc']['_sub']['edit']['_sub']['landscape_picture']['_link']  = $URL['mapc']['edit'] . 'mapc_cate_edit/landscape_picture/';

        $MENU['home']['mapc']['_sub']['special']['_title'] = '특수기능';
        $MENU['home']['mapc']['_sub']['special']['_link']  = $URL['mapc']['scrap'];
        $MENU['home']['mapc']['_sub']['special']['_sub']['scrap']['_title'] = '긁어오기';
        $MENU['home']['mapc']['_sub']['special']['_sub']['scrap']['_link']  = $URL['mapc']['scrap'];
        $MENU['home']['mapc']['_sub']['special']['_sub']['edit_whole']['_title'] = '일괄편집';
        $MENU['home']['mapc']['_sub']['special']['_sub']['edit_whole']['_link']  = $URL['mapc']['batch'];
    }

// this is it

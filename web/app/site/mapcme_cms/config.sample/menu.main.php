<?php
	if(!defined('__MAPC__')) { exit(); }

	$MENU = isset($MENU) ? $MENU : array();

	$MENU['_default_submenu'] = 'mapc';

    $MENU['sitemap']['mapc']['_title']  = '맵시';
    $MENU['sitemap']['mapc']['_link']   = $URL['core']['root'] . '?core_modl=mapc&core_page=list';
    $MENU['sitemap']['mapc']['_key']    = 'mapc';

    $MENU['sitemap']['mapc']['_sub']['list']['_title'] = '리스트';
    $MENU['sitemap']['mapc']['_sub']['list']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=list';
    $MENU['sitemap']['mapc']['_sub']['list']['_sub']['album']['_title'] = '앨범(추천)';
    $MENU['sitemap']['mapc']['_sub']['list']['_sub']['album']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=list&mapc_cate=image';
    $MENU['sitemap']['mapc']['_sub']['list']['_sub']['album']['_sub']['animal']['_title'] = '동물';
    $MENU['sitemap']['mapc']['_sub']['list']['_sub']['album']['_sub']['animal']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=list&mapc_cate=image&mapc_search[]=dc_subject:반려동물';
    $MENU['sitemap']['mapc']['_sub']['list']['_sub']['album']['_sub']['satire']['_title'] = '풍자';
    $MENU['sitemap']['mapc']['_sub']['list']['_sub']['album']['_sub']['satire']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=list&mapc_cate=image&mapc_search[]=dc_subject:풍자';
    $MENU['sitemap']['mapc']['_sub']['list']['_sub']['calendar']['_title'] = '달력';
    $MENU['sitemap']['mapc']['_sub']['list']['_sub']['calendar']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=list&mapc_cate=date';
    $MENU['sitemap']['mapc']['_sub']['list']['_sub']['calendar']['_sub']['diary']['_title'] = '날적이';
    $MENU['sitemap']['mapc']['_sub']['list']['_sub']['calendar']['_sub']['diary']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=list&mapc_cate=date&mapc_search[]=dc_type:날적이';
    $MENU['sitemap']['mapc']['_sub']['list']['_sub']['tag']['_title'] = '꼬리표'; // 꼬리표 리스트
    $MENU['sitemap']['mapc']['_sub']['list']['_sub']['tag']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=list&mapc_cate=tag';

    $MENU['sitemap']['mapc']['_sub']['edit']['_title'] = '글쓰기/편집';
    $MENU['sitemap']['mapc']['_sub']['edit']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=edit';
// #TODO 개인별로 글쓰기 종류 설정가능하도록!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $MENU['sitemap']['mapc']['_sub']['edit']['_sub']['memo']['_title'] = '적바림';
    $MENU['sitemap']['mapc']['_sub']['edit']['_sub']['memo']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=edit&mapc_cate_edit=memo';
    $MENU['sitemap']['mapc']['_sub']['edit']['_sub']['diary']['_title'] = '날적이';
    $MENU['sitemap']['mapc']['_sub']['edit']['_sub']['diary']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=edit&mapc_cate_edit=diary';
    $MENU['sitemap']['mapc']['_sub']['edit']['_sub']['proverb']['_title'] = '좋은글';
    $MENU['sitemap']['mapc']['_sub']['edit']['_sub']['proverb']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=edit&mapc_cate_edit=proverb';
    $MENU['sitemap']['mapc']['_sub']['edit']['_sub']['satire']['_title'] = '풍자';
    $MENU['sitemap']['mapc']['_sub']['edit']['_sub']['satire']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=edit&mapc_cate_edit=satire';
    $MENU['sitemap']['mapc']['_sub']['edit']['_sub']['word']['_title'] = '이름씨';
    $MENU['sitemap']['mapc']['_sub']['edit']['_sub']['word']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=edit&mapc_cate_edit=word';
    $MENU['sitemap']['mapc']['_sub']['edit']['_sub']['animal_picture']['_title'] = '반려동물';
    $MENU['sitemap']['mapc']['_sub']['edit']['_sub']['animal_picture']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=edit&mapc_cate_edit=animal_picture';
    $MENU['sitemap']['mapc']['_sub']['edit']['_sub']['landscape_picture']['_title'] = '풍경';
    $MENU['sitemap']['mapc']['_sub']['edit']['_sub']['landscape_picture']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=edit&mapc_cate_edit=landscape_picture';

    $MENU['sitemap']['mapc']['_sub']['special']['_title'] = '특수기능';
    $MENU['sitemap']['mapc']['_sub']['special']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=scrap';
    $MENU['sitemap']['mapc']['_sub']['special']['_sub']['scrap']['_title'] = '긁어오기';
    $MENU['sitemap']['mapc']['_sub']['special']['_sub']['scrap']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=scrap';
    $MENU['sitemap']['mapc']['_sub']['special']['_sub']['edit_whole']['_title'] = '일괄편집';
    $MENU['sitemap']['mapc']['_sub']['special']['_sub']['edit_whole']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=batch';

// this is it

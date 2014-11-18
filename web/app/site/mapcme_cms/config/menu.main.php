<?php
    /**
     *
     * WooYG 메뉴
     *
     * 2014-01-09
     *
     */
	if(!defined('__MAPC__')) { exit(); }

	$MENU = isset($MENU) ? $MENU : array();

	$MENU['_default_submenu'] = 'list';

    $MENU['sitemap']['list']['_title'] = '글읽기';
    $MENU['sitemap']['list']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=list';
    $MENU['sitemap']['list']['_sub']['list']['_title'] = '일반';
    $MENU['sitemap']['list']['_sub']['list']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=list';
    $MENU['sitemap']['list']['_sub']['album']['_title'] = '앨범(추천)';
    $MENU['sitemap']['list']['_sub']['album']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=list&mapc_cate=image';
    $MENU['sitemap']['list']['_sub']['album']['_sub']['animal']['_title'] = '동물';
    $MENU['sitemap']['list']['_sub']['album']['_sub']['animal']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=list&mapc_cate=image&mapc_search[]=dc_subject:반려동물';
    $MENU['sitemap']['list']['_sub']['album']['_sub']['satire']['_title'] = '풍자';
    $MENU['sitemap']['list']['_sub']['album']['_sub']['satire']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=list&mapc_cate=image&mapc_search[]=dc_subject:풍자';
    $MENU['sitemap']['list']['_sub']['album']['_sub']['landscape']['_title'] = '풍경';
    $MENU['sitemap']['list']['_sub']['album']['_sub']['landscape']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=list&mapc_cate=image&mapc_search[]=dc_subject:풍경';
    $MENU['sitemap']['list']['_sub']['album']['_sub']['humor']['_title'] = '우스개';
    $MENU['sitemap']['list']['_sub']['album']['_sub']['humor']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=list&mapc_cate=image&mapc_search[]=dc_type:우스개';
    $MENU['sitemap']['list']['_sub']['calendar']['_title'] = '달력';
    $MENU['sitemap']['list']['_sub']['calendar']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=list&mapc_cate=date';
    $MENU['sitemap']['list']['_sub']['calendar']['_sub']['diary']['_title'] = '날적이';
    $MENU['sitemap']['list']['_sub']['calendar']['_sub']['diary']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=list&mapc_cate=date&mapc_search[]=dc_type:날적이';
    $MENU['sitemap']['list']['_sub']['tag']['_title'] = '꼬리표'; // 꼬리표 리스트
    $MENU['sitemap']['list']['_sub']['tag']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=list&mapc_cate=tag';

    $MENU['sitemap']['edit']['_title'] = '글쓰기/편집';
    $MENU['sitemap']['edit']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=edit';
// #TODO 개인별로 글쓰기 종류 설정가능하도록!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $MENU['sitemap']['edit']['_sub']['memo']['_title'] = '적바림';
    $MENU['sitemap']['edit']['_sub']['memo']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=edit&mapc_cate_edit=memo';
    $MENU['sitemap']['edit']['_sub']['diary']['_title'] = '날적이';
    $MENU['sitemap']['edit']['_sub']['diary']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=edit&mapc_cate_edit=diary';
    $MENU['sitemap']['edit']['_sub']['proverb']['_title'] = '좋은글';
    $MENU['sitemap']['edit']['_sub']['proverb']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=edit&mapc_cate_edit=proverb';
    $MENU['sitemap']['edit']['_sub']['satire']['_title'] = '풍자';
    $MENU['sitemap']['edit']['_sub']['satire']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=edit&mapc_cate_edit=satire';
    $MENU['sitemap']['edit']['_sub']['word']['_title'] = '이름씨';
    $MENU['sitemap']['edit']['_sub']['word']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=edit&mapc_cate_edit=word';
    $MENU['sitemap']['edit']['_sub']['animal_picture']['_title'] = '반려동물';
    $MENU['sitemap']['edit']['_sub']['animal_picture']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=edit&mapc_cate_edit=animal_picture';
    $MENU['sitemap']['edit']['_sub']['landscape_picture']['_title'] = '풍경';
    $MENU['sitemap']['edit']['_sub']['landscape_picture']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=edit&mapc_cate_edit=landscape_picture';

    $MENU['sitemap']['special']['_title'] = '특수기능';
    $MENU['sitemap']['special']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=scrap';
    $MENU['sitemap']['special']['_sub']['scrap']['_title'] = '긁어오기';
    $MENU['sitemap']['special']['_sub']['scrap']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=scrap';
    $MENU['sitemap']['special']['_sub']['edit_whole']['_title'] = '일괄편집';
    $MENU['sitemap']['special']['_sub']['edit_whole']['_link']  = $URL['core']['root'] . '?core_modl=mapc&core_page=batch';

    $MENU['sitemap']['introdu']['_title'] = '소개';
    $MENU['sitemap']['introdu']['_link']  = $URL['core']['root'] . '?core_modl=home&core_page=dashboard';

// this is it

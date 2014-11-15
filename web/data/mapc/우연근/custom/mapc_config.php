<?php
/**
 * 
 * 사용자별 환경설정
 * 
 * 원래의 설정말고도 MAPC사용자별 설정이 필요할 때...
 *
 */

/**
 * 
 * 디렉토리 별 설정
 * 
 * 스크랩 해 올때 아래의 설정대로 가져오게끔...
 * 
 */
{ // BLOCK:directory_setup:20140113:디렉토리별 설정

    $CONFIG_MODL_MAPC['scrap']['edit_folder']['dir'] = '_정리중/';

    $CONFIG_MODL_MAPC['scrap']['best']['dir'] = '으뜸/';
    $CONFIG_MODL_MAPC['scrap']['best']['dc_subject'][]    = '으뜸';
    $CONFIG_MODL_MAPC['scrap']['best']['dc_subject_id'][] = 'LD6K9MA82Q13BY75JPVZ';

    $CONFIG_MODL_MAPC['scrap']['animal']['dir'] = '동물/';
    $CONFIG_MODL_MAPC['scrap']['animal']['dc_subject'][]    = '반려동물';
    $CONFIG_MODL_MAPC['scrap']['animal']['dc_subject_id'][] = 'AYBR9ULVHGSQEWKXP7MT';

    $CONFIG_MODL_MAPC['scrap']['memory']['dir'] = '추억/';
    $CONFIG_MODL_MAPC['scrap']['memory']['dc_subject'][] = '추억';
    $CONFIG_MODL_MAPC['scrap']['memory']['dc_subject_id'][] = 'YF893RVLWCHQMAN7DTS5';

    $CONFIG_MODL_MAPC['scrap']['landscape']['dir'] = '풍경/';
    $CONFIG_MODL_MAPC['scrap']['landscape']['dc_subject'][]    = '풍경';
    $CONFIG_MODL_MAPC['scrap']['landscape']['dc_subject_id'][] = 'J72VF3XP8Q61A5N9WLDR';

    $CONFIG_MODL_MAPC['scrap']['tree']['dir'] = '나무/';
    $CONFIG_MODL_MAPC['scrap']['tree']['dc_subject'][]    = '나무';
    $CONFIG_MODL_MAPC['scrap']['tree']['dc_subject_id'][] = '4G3HT6Z5NW2SXFQ1K7YC';

    $CONFIG_MODL_MAPC['scrap']['under_sea']['dir'] = '바다속/';
    $CONFIG_MODL_MAPC['scrap']['under_sea']['dc_subject'][]    = '바다 속';
    $CONFIG_MODL_MAPC['scrap']['under_sea']['dc_subject_id'][] = 'A2EMFJGVWN3S719RH5Z4';

    $CONFIG_MODL_MAPC['scrap']['lego']['dir'] = '레고/';
    $CONFIG_MODL_MAPC['scrap']['lego']['dc_subject'][]    = '레고';
    $CONFIG_MODL_MAPC['scrap']['lego']['dc_subject_id'][] = 'N59MB4HTLDZJ13EXRVUK';

    $CONFIG_MODL_MAPC['scrap']['figure']['dir'] = '꼭두/';
    $CONFIG_MODL_MAPC['scrap']['figure']['dc_subject'][]    = '꼭두';
    $CONFIG_MODL_MAPC['scrap']['figure']['dc_subject_id'][] = 'W8NXSFMH2PTAEZDKG6L1';

	$CONFIG_MODL_MAPC['scrap']['diary']['dir'] = '날적이/';
    $CONFIG_MODL_MAPC['scrap']['diary']['dc_type'][]    = '날적이';
    $CONFIG_MODL_MAPC['scrap']['diary']['dc_type_id'][] = 'UHFLS46E1B257KDR3YXZ';

	$CONFIG_MODL_MAPC['scrap']['humor']['dir'] = '우스개/';
    $CONFIG_MODL_MAPC['scrap']['humor']['dc_type'][]    = '우스개';
    $CONFIG_MODL_MAPC['scrap']['humor']['dc_type_id'][] = 'GSUQVP8923W156XK7JTD';

    $CONFIG_MODL_MAPC['scrap']['osan']['dir'] = '오산시/';
    $CONFIG_MODL_MAPC['scrap']['osan']['dc_coverage'][] = '오산시';

    $CONFIG_MODL_MAPC['scrap']['suwon']['dir'] = '수원시/';
    $CONFIG_MODL_MAPC['scrap']['suwon']['dc_coverage'][] = '수원시';

    $CONFIG_MODL_MAPC['scrap']['hoangdo']['dir'] = '황도/';
    $CONFIG_MODL_MAPC['scrap']['hoangdo']['dc_coverage'][] = '황도';

    $CONFIG_MODL_MAPC['scrap']['ganseog']['dir'] = '간석동/';
    $CONFIG_MODL_MAPC['scrap']['ganseog']['dc_coverage'][] = '간석동';

    $CONFIG_MODL_MAPC['scrap']['juan']['dir'] = '주안동/';
    $CONFIG_MODL_MAPC['scrap']['juan']['dc_coverage'][] = '주안동';

    $CONFIG_MODL_MAPC['scrap']['geochang']['dir'] = '거창/';
    $CONFIG_MODL_MAPC['scrap']['geochang']['dc_coverage'][] = '거창';

    $CONFIG_MODL_MAPC['scrap']['ulsan']['dir'] = '울산광역시/';
    $CONFIG_MODL_MAPC['scrap']['ulsan']['dc_coverage'][] = '울산광역시';

    $CONFIG_MODL_MAPC['scrap']['daegu']['dir'] = '대구광역시/';
    $CONFIG_MODL_MAPC['scrap']['daegu']['dc_coverage'][] = '대구광역시';

    $CONFIG_MODL_MAPC['scrap']['cebu']['dir'] = '세부/';
    $CONFIG_MODL_MAPC['scrap']['cebu']['dc_coverage'][] = '세부';

    $CONFIG_MODL_MAPC['scrap']['matapungkay']['dir'] = '마따뿡까이/';
    $CONFIG_MODL_MAPC['scrap']['matapungkay']['dc_coverage'][] = '마따뿡까이';

	// 자주 안쓰는 것들 ==============================

    $CONFIG_MODL_MAPC['scrap']['ua']['dir'] = '우아/';
    $CONFIG_MODL_MAPC['scrap']['ua']['dc_subject'][]    = '우아';
    $CONFIG_MODL_MAPC['scrap']['ua']['dc_subject_id'][] = 'NA';

// #TODO 이미 다른 특정주제가 있을때 (예:레고/12345) 해당 디렉토리 이름을 모델명으로 할지..아니면 어떤 형태로 자료를 집어넣을지 결정
    $CONFIG_MODL_MAPC['scrap']['ua_family']['dir'] = '우아가족/';
    $CONFIG_MODL_MAPC['scrap']['ua_family']['dc_subject'][]    = '우아가족';
    $CONFIG_MODL_MAPC['scrap']['ua_family']['dc_subject_id'][] = 'NA';

    $CONFIG_MODL_MAPC['scrap']['jami']['dir'] = '자미/';
    $CONFIG_MODL_MAPC['scrap']['jami']['dc_subject'][]    = '자미';
    $CONFIG_MODL_MAPC['scrap']['jami']['dc_subject_id'][] = 'NA';

} // BLOCK

// this is it


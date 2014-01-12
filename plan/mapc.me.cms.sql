-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 호스트: 127.0.0.1
-- 처리한 시간: 14-01-12 15:40
-- 서버 버전: 5.6.11
-- PHP 버전: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 데이터베이스: `dbname`
--
CREATE DATABASE IF NOT EXISTS `dbname` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dbname`;

-- --------------------------------------------------------

--
-- 테이블 구조 `mapc_post`
--

CREATE TABLE IF NOT EXISTS `mapc_post` (
  `post_seq` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_uid` varchar(25) DEFAULT NULL COMMENT '고유값',
  `post_lang` varchar(5) DEFAULT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_content` text,
  `post_origin_type` varchar(45) DEFAULT NULL,
  `post_origin_server` varchar(127) DEFAULT NULL,
  `post_origin_url` varchar(255) DEFAULT NULL COMMENT '원본의 위치\ndirectory/filename.ext\nhttp://url/directory/filename.ext',
  `post_write_date` datetime DEFAULT NULL,
  `post_edit_date_latest` datetime DEFAULT NULL,
  `post_status` char(3) DEFAULT NULL COMMENT '예. cate-status, key-normal, value-일반',
  `post_user_uid` varchar(25) DEFAULT NULL,
  `post_etc` char(3) DEFAULT NULL,
  PRIMARY KEY (`post_seq`),
  UNIQUE KEY `UID_LANG` (`post_uid`,`post_lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=99 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `mapc_postmeta`
--

CREATE TABLE IF NOT EXISTS `mapc_postmeta` (
  `postmeta_seq` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `postmeta_post_uid` varchar(25) DEFAULT NULL,
  `postmeta_lang` varchar(5) DEFAULT NULL,
  `postmeta_key` varchar(100) DEFAULT NULL,
  `postmeta_value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`postmeta_seq`),
  KEY `post_uid_idx` (`postmeta_post_uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=656 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `mapc_user`
--

CREATE TABLE IF NOT EXISTS `mapc_user` (
  `user_seq` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_uid` varchar(25) DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `user_id` varchar(60) DEFAULT NULL,
  `user_passwd` varchar(64) DEFAULT NULL,
  `user_type` varchar(10) DEFAULT NULL COMMENT 'adm, mng, rol',
  `user_status` varchar(45) DEFAULT NULL,
  `user_sign_up_date` datetime DEFAULT NULL,
  `user_sign_in_date_latest` datetime DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_etc` char(3) DEFAULT NULL,
  PRIMARY KEY (`user_seq`),
  UNIQUE KEY `user_uid_UNIQUE` (`user_uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `mapc_usermeta`
--

CREATE TABLE IF NOT EXISTS `mapc_usermeta` (
  `usermeta_seq` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usermeta_user_uid` varchar(25) DEFAULT NULL,
  `usermeta_key` varchar(255) DEFAULT NULL,
  `usermeta_value` text,
  PRIMARY KEY (`usermeta_seq`),
  KEY `user_uid_idx` (`usermeta_user_uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `system_code`
--

CREATE TABLE IF NOT EXISTS `system_code` (
  `code_seq` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code_cate` varchar(20) DEFAULT NULL,
  `code_key` varchar(10) DEFAULT NULL,
  `code_lang` char(3) DEFAULT NULL,
  `code_value` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`code_seq`),
  UNIQUE KEY `lang_value` (`code_lang`,`code_value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='code_cate 테이블이름.필드이름\ncode_key 코드\ncode_lang 언어\ncode_value 코드의뜻\n\n예.\nuser.user_type\nadm\nkor\n관리자\n\nuser.user_type 필드에\nadm 이라는 코드는 한글로는 "관리자"라는 뜻\n\n특정테이블이 아닌 일반적인 코드는\ncode_cate 에 common이라고 기록한다.\n\n예.\ncommon\nISO 639-3\nkor\nISO 639-3 언어코드\n\n이렇게 해놓음으로 해서\nsystem_code테이블에\n시소러스의 기능도 기대할 수 있음\n' AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mapc_postmeta`
--
ALTER TABLE `mapc_postmeta`
  ADD CONSTRAINT `post_uid` FOREIGN KEY (`postmeta_post_uid`) REFERENCES `mapc_post` (`post_uid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

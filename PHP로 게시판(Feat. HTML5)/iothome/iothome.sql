-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 18-05-18 07:38
-- 서버 버전: 10.1.29-MariaDB
-- PHP 버전: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `iothome`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `freeboard`
--

CREATE TABLE `freeboard` (
  `num` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `passwd` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `regist_day` varchar(20) DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `freeboard`
--

INSERT INTO `freeboard` (`num`, `name`, `passwd`, `subject`, `content`, `regist_day`, `hit`, `ip`) VALUES
(1, '홍길동', '1111', '처음 인사드립니다.', '오늘은 즐거운 날\r\n내일은 주말이 시작되는 날!!\r\n하    하    하  ', '2018-05-17 (08:18)', 28, '127.0.0.1'),
(2, '이순신', '22222', '거북과 함께...', '저 푸른 바다 위에..\r\n거북과 함께...\r\n둥 둥 둥', '2018-05-17 (08:33)', 1, '127.0.0.1'),
(3, '조용필', '3333', '조용하게...', '노래를\r\n부르자\r\n조 용 필!!!', '2018-05-17 (08:56)', 2, '127.0.0.1'),
(6, 'ewrwerewrwe', '2222', 'wrwerwerwer', '  werewrwerwerwe\r\nwerwerwerwe\r\nrwerwe\r\nrwerwerwerwerwerw               ', '2018-05-18 (05:21)', 13, '127.0.0.1');

-- --------------------------------------------------------

--
-- 테이블 구조 `guestbook`
--

CREATE TABLE `guestbook` (
  `num` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `passwd` varchar(10) NOT NULL,
  `content` text NOT NULL,
  `regist_day` varchar(20) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `guestbook`
--

INSERT INTO `guestbook` (`num`, `name`, `passwd`, `content`, `regist_day`, `ip`) VALUES
(1, '홍길동', '111', '성공하길... ', '2018-03-30(09:03)', ''),
(2, '이순신', '22222', '거북선과 나 ', '2018-03-30(09:04)', ''),
(3, '유관순', '333', '나를 잊지 마세요!!!', '2018-03-30(09:05)', ''),
(4, '조인성', '444', '즐거운 불금되세요...', '2018-03-30(09:10)', '127.0.0.1'),
(5, '김또봇', '5555', '정의를 위해서', '2018-03-30(09:12)', '192.168.0.101'),
(6, '4353434', '34534534', '4353453453454', '2018-03-30(09:20)', '127.0.0.1'),
(7, '5555', '555555', '555555', '2018-04-02(03:12)', '127.0.0.1'),
(8, '777777', '77777', '777777', '2018-04-02(07:14)', '127.0.0.1'),
(9, '999999', '99999', '99999999\r\n999\r\n99\r\n9999999999\r\n999\r\n', '2018-04-02(07:15)', '127.0.0.1'),
(10, '121212', '121212', '1221121212', '2018-04-02(07:16)', '127.0.0.1'),
(11, 'aaaa', 'aaaaa', 'aaaaaa\r\naaaa\r\naaaaaaaaaaaaaaaaaaaaaaaa', '2018-04-02(07:17)', '127.0.0.1'),
(12, 'bbbbb', 'bbbb', 'bbbbbbbbbbbbbbbbbb\r\nbbbbbbbbbb\r\nbbbbbbbbbbbbbbb\r\nbbbbbbbbbbb\r\nbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', '2018-04-02(07:22)', '127.0.0.1'),
(13, '34543', '43543', '435435', '2018-04-02(07:31)', '127.0.0.1'),
(14, '34534', '345435', '435435', '2018-04-02(07:31)', '127.0.0.1'),
(15, '4353434', '43534', '435435', '2018-04-02(07:31)', '127.0.0.1'),
(16, '3453', '435', '34534', '2018-04-02(07:31)', '127.0.0.1'),
(17, '345', '43534', '435345', '2018-04-02(07:31)', '127.0.0.1'),
(18, '345', '4353', '345', '2018-04-02(07:31)', '127.0.0.1'),
(19, '43534', '4355', '345435', '2018-04-02(07:31)', '127.0.0.1'),
(20, '43534', '4353', '43534\r\n4353', '2018-04-02(07:32)', '127.0.0.1'),
(21, '4353', '43534', '345345', '2018-04-02(07:32)', '127.0.0.1'),
(22, '43534', '435435', '435543', '2018-04-02(07:32)', '127.0.0.1'),
(23, '34534', '5345', '345345', '2018-04-02(07:32)', '127.0.0.1'),
(24, '34543', '345345', '453345', '2018-04-02(07:32)', '127.0.0.1'),
(25, '34543', '345345', '435435', '2018-04-02(07:32)', '127.0.0.1'),
(26, '43543', '34534', '435345', '2018-04-02(07:32)', '127.0.0.1'),
(27, 'bbb', 'bbb', 'bbbb', '2018-04-02(07:33)', '127.0.0.1'),
(28, 'ccc', 'ccc', 'ccc', '2018-04-02(07:33)', '127.0.0.1'),
(29, 'ddd', 'ddd', 'ddd', '2018-04-02(07:33)', '127.0.0.1'),
(30, 'eee', 'eee', 'eee', '2018-04-02(07:33)', '127.0.0.1'),
(31, 'fff', 'fff', 'fff', '2018-04-02(07:33)', '127.0.0.1'),
(32, 'gg', 'ggg', 'ggg', '2018-04-02(07:33)', '127.0.0.1'),
(33, 'hhh', 'hhh', 'hhh', '2018-04-02(07:33)', '127.0.0.1'),
(34, 'iii', 'iii', 'iii', '2018-04-02(07:33)', '127.0.0.1'),
(35, 'jjj', 'jjj', 'jjj', '2018-04-02(07:33)', '127.0.0.1'),
(36, 'kkk', 'kkk', 'kkk', '2018-04-02(07:33)', '127.0.0.1'),
(37, 'lll', 'lll', 'lll', '2018-04-02(07:33)', '127.0.0.1'),
(39, 'nnn', 'nnnn', 'nnn', '2018-04-02(07:34)', '127.0.0.1'),
(40, 'ooo', 'ooo', 'oooo', '2018-04-02(07:34)', '127.0.0.1'),
(41, 'ppp', 'ppp', 'ppp', '2018-04-02(07:34)', '127.0.0.1'),
(42, 'rrr', 'rrr', 'rrr', '2018-04-02(07:34)', '127.0.0.1'),
(43, 'sss', 'sss', 'sss', '2018-04-02(07:34)', '127.0.0.1'),
(44, 'ttt', 'ttt', 'ttt', '2018-04-02(07:34)', '127.0.0.1'),
(46, '홍길동', '243', '324234234', '2018-05-16(05:22)', '127.0.0.1');

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `id` varchar(10) NOT NULL,
  `passwd` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `sex` char(1) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `address` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`id`, `passwd`, `name`, `sex`, `tel`, `address`) VALUES
('user001', '111', '일길동', 'M', '010-1234-5678', '대구광역시 중구'),
('user002', '222', '이길동', 'M', '010-2222-2222', '대구광역시 북구');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `freeboard`
--
ALTER TABLE `freeboard`
  ADD PRIMARY KEY (`num`);

--
-- 테이블의 인덱스 `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`num`);

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `freeboard`
--
ALTER TABLE `freeboard`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 테이블의 AUTO_INCREMENT `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

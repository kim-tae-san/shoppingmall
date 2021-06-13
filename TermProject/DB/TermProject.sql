-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 21-06-06 05:20
-- 서버 버전: 10.4.18-MariaDB
-- PHP 버전: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `TermProject`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userid` char(100) DEFAULT NULL,
  `productid` char(100) DEFAULT NULL,
  `productcount` int(11) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `cart`
--

INSERT INTO `cart` (`id`, `userid`, `productid`, `productcount`, `createdate`) VALUES
(14, 'ekdlqld21', '4', 1, '2021-06-04 11:19:55'),
(15, 'ekdlqld21', '4', 5, '2021-06-05 03:15:15');

-- --------------------------------------------------------

--
-- 테이블 구조 `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` char(100) NOT NULL,
  `imgurl` char(100) NOT NULL,
  `price` int(11) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `product`
--

INSERT INTO `product` (`id`, `name`, `imgurl`, `price`, `createdate`) VALUES
(1, '[지구 컬렉션] 녹두폼, 녹두크림, 클린오션 선스크린', '/TermProject/img/product1.jpeg', 9900, '2021-05-28 13:03:46'),
(2, '[리뉴얼] 클린 오션 모이스처 선스크린 50ml', '/TermProject/img/product2.jpeg', 19200, '2021-05-28 14:13:21'),
(3, '[SET] 캐모마일 약산성 토너 190ml + 캐모마일 약산성 로션 150ml', '/TermProject/img/product3.jpeg', 27900, '2021-05-28 14:14:50'),
(4, '[기획] 시카풀 앰플 50ml+30ml 세트', '/TermProject/img/product4.jpeg', 25800, '2021-05-28 14:17:49'),
(5, '녹두 약산성 클렌징폼', '/TermProject/img/product5.jpeg', 11800, '2021-05-28 14:20:52'),
(6, '클린 오션 논나노 마일드 선스크린 50ml', '/TermProject/img/product6.jpeg', 20800, '2021-05-28 14:22:27'),
(7, '녹두 밸런싱 토너 200ml', '/TermProject/img/product7.jpeg', 14400, '2021-05-29 15:08:26'),
(8, '시카풀 앰플 2세대 30ml', '/TermProject/img/product8.jpeg', 18400, '2021-05-29 15:09:34'),
(9, '[SET] 대나무 수분앰플 30ml + 대나무 힐링 마스크 10매', '/TermProject/img/product9.jpeg', 31900, '2021-05-29 15:10:24');

-- --------------------------------------------------------

--
-- 테이블 구조 `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `email` char(100) NOT NULL,
  `password` char(100) NOT NULL,
  `name` char(100) NOT NULL,
  `address` char(100) NOT NULL,
  `phone` char(100) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hint` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `userdata`
--

INSERT INTO `userdata` (`id`, `email`, `password`, `name`, `address`, `phone`, `createDate`, `hint`) VALUES
(1, 'ekdlqld21', '$2y$10$DubtObMs6LofibxDvjUSRujZLP4jOBj3rFqHCdzHn6czgh7EDpjk.', '김태산', '부산광역시', '01026531484', '2021-06-03 05:42:10', '일본'),
(2, 'ㄴㅇ', '$2y$10$WCBorNiCHPsOoFR2lstAdeSPKgTl2Z7ens6ak.gRuRTi9seUQEDGS', 'ekdlqld21', '12', '12', '2021-06-02 10:28:07', '일본'),
(3, '김태산', '$2y$10$5n3lzzfYytGxmnjSF5Z2suWK9y35WyYWlHUnPpzRPvzhM/mYyz2Uy', '김태산', '청주시', '01026531484', '2021-06-02 10:35:08', '부산'),
(4, 'sandon1', '$2y$10$dmZO.mp/fqfNWfjM.wo2qOYGBN4B.I0ElnGCfHS7SZDTHVQ7l4x.i', '김상돈', '강릉', '01033501484', '2021-06-03 04:56:44', '속초');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 테이블의 AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 테이블의 AUTO_INCREMENT `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

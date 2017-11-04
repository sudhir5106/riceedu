-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2017 at 03:01 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riceedu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `Login_Id` smallint(6) NOT NULL,
  `Login_Name` varchar(50) NOT NULL,
  `Login_Pwd` varchar(50) NOT NULL,
  `Login_Ip` varchar(20) NOT NULL,
  `Last_Login_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`Login_Id`, `Login_Name`, `Login_Pwd`, `Login_Ip`, `Last_Login_Date`) VALUES
(1, 'admin', 'france', '::1', '2017-11-03 16:02:14');

-- --------------------------------------------------------

--
-- Table structure for table `block_master`
--

CREATE TABLE `block_master` (
  `Block_Id` int(11) NOT NULL,
  `Block_Name` varchar(50) NOT NULL,
  `District_Id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `block_master`
--

INSERT INTO `block_master` (`Block_Id`, `Block_Name`, `District_Id`) VALUES
(1, 'Raigarh', 152),
(4, 'Sarangarh', 152),
(5, 'Udaipur (Dharamjaigarh)', 152),
(6, 'Baramkela', 152),
(7, 'Kharsia', 152),
(8, 'Pusour', 152),
(9, 'Lailunga', 152),
(10, 'Tamnar', 152),
(11, 'Gharghoda', 152),
(12, 'Visakhapatnam', 45),
(13, 'Anakapalle', 45),
(14, 'Anandapuram', 45),
(15, 'Araku Valley', 45);

-- --------------------------------------------------------

--
-- Table structure for table `center_notice`
--

CREATE TABLE `center_notice` (
  `Notice_Id` int(11) NOT NULL,
  `Notice_Date` date NOT NULL,
  `Notice` text NOT NULL,
  `Student_Id` int(11) NOT NULL,
  `CM_Id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `center_notice`
--

INSERT INTO `center_notice` (`Notice_Id`, `Notice_Date`, `Notice`, `Student_Id`, `CM_Id`) VALUES
(1, '2017-08-05', 'AJSHDJK  as a dasdahsdjahsdkj asjkd asjd jsadkas hgjhgjhhj', 1, 3),
(2, '2017-08-06', '2nd notice asdf asd asdfasdf adsfdsf asdfad dfasd aadasdfa asdfa  asdf asdfasd  asdfa sdfasd assdaf jhfasu hdus aljjd jsdf  aadasdfa asdfa  asdf asdfasd  asdfa sdfasd assdaf jhfasu hdus aljjd jsdf  aadasdfa asdfa  asdf asdfasd  asdfa sdfasd assdaf jhfasu hdus aljjd jsdf  aadasdfa asdfa  asdf asdfasd  asdfa sdfasd assdaf jhfasu hdus aljjd jsdf  aadasdfa asdfa  asdf asdfasd  asdfa sdfasd assdaf jhfasu hdus aljjd jsdf ', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cm_login`
--

CREATE TABLE `cm_login` (
  `CM_Id` smallint(6) NOT NULL,
  `Center_Code` varchar(10) NOT NULL,
  `DM_Emp_Code` varchar(75) NOT NULL,
  `CM_Emp_Code` varchar(75) NOT NULL,
  `CM_State` tinyint(4) NOT NULL,
  `CM_District` smallint(6) NOT NULL,
  `CM_Block` int(11) NOT NULL,
  `CM_Address` varchar(300) NOT NULL,
  `CM_Password` varchar(50) NOT NULL,
  `CM_Status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cm_login`
--

INSERT INTO `cm_login` (`CM_Id`, `Center_Code`, `DM_Emp_Code`, `CM_Emp_Code`, `CM_State`, `CM_District`, `CM_Block`, `CM_Address`, `CM_Password`, `CM_Status`) VALUES
(3, 'RTC-001', 'AB00002', 'AB00005', 7, 152, 8, 'sdfasdf', '123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_master`
--

CREATE TABLE `course_master` (
  `Course_Id` smallint(6) NOT NULL,
  `Course_Name` varchar(50) NOT NULL,
  `Learning_Fee` int(11) NOT NULL,
  `Registration_Fee` int(11) NOT NULL,
  `Exam_Fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_master`
--

INSERT INTO `course_master` (`Course_Id`, `Course_Name`, `Learning_Fee`, `Registration_Fee`, `Exam_Fee`) VALUES
(2, 'BCA', 15000, 1000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `district_master`
--

CREATE TABLE `district_master` (
  `District_Id` smallint(6) NOT NULL,
  `State_Id` tinyint(4) NOT NULL,
  `District_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district_master`
--

INSERT INTO `district_master` (`District_Id`, `State_Id`, `District_Name`) VALUES
(1, 1, 'Port Blair'),
(39, 2, 'Vijayawada'),
(40, 2, 'Hyderabad'),
(41, 2, 'Secunderabad'),
(42, 2, 'Nellore'),
(43, 2, 'Kovur'),
(44, 2, 'Guntur'),
(45, 2, 'Vishakhapatnam'),
(46, 2, 'Kakinada'),
(47, 2, 'Nalgonda'),
(48, 2, 'Warangal'),
(49, 2, 'Anantapur'),
(50, 2, 'Banganapalle'),
(51, 2, 'Bapatla'),
(52, 2, 'Bhimavaram'),
(53, 2, 'udivada'),
(54, 2, 'Jagtial'),
(55, 2, 'Kadapa'),
(56, 2, 'Karimnagar'),
(57, 2, 'Madanapalle'),
(58, 2, 'Mahabubnagar'),
(59, 2, 'Mancherial'),
(60, 2, 'Mangalagiri'),
(61, 2, 'Machilipatnam'),
(62, 2, 'Nagarkurnool'),
(63, 2, 'Nandyal'),
(64, 2, 'Nandyal'),
(65, 2, 'Narasaraopet'),
(66, 2, 'New Guntur '),
(67, 2, 'Ongole'),
(68, 2, 'Rajahmundry'),
(69, 2, 'Rajampet'),
(70, 2, 'Ravulapalem'),
(71, 2, 'New Guntur '),
(72, 2, 'Siddipet'),
(73, 2, 'Srikakulam'),
(74, 2, 'Srikalahasti'),
(75, 2, 'Suryapet'),
(76, 3, 'Itanagar'),
(77, 3, 'Anjaw'),
(78, 3, 'Changlang'),
(79, 3, 'East Kameng'),
(80, 3, 'East Siang'),
(81, 3, 'Lohit'),
(82, 3, 'Tawang'),
(83, 3, 'Kakinada'),
(84, 3, 'Tirap'),
(85, 3, 'Kurung Kumey'),
(96, 4, 'Tezpur'),
(97, 4, 'Noida'),
(98, 4, 'Rangia'),
(99, 4, 'Jorhat'),
(100, 4, 'Guwahati'),
(101, 4, 'Dibrugarh'),
(102, 4, 'Bongaigaon'),
(103, 4, 'Silchar'),
(104, 4, 'Tinsukia'),
(105, 4, 'Dispur'),
(106, 5, 'Patna'),
(107, 5, 'Araria'),
(108, 5, 'Aurangabad'),
(109, 5, 'Bhagalpur'),
(110, 5, 'Bihar Sharif'),
(111, 5, 'Bodh Gaya'),
(112, 5, 'Barh'),
(113, 5, 'Khagaria'),
(114, 5, 'Lakhisarai'),
(115, 5, 'Mokama'),
(116, 5, 'Motihari'),
(117, 5, 'Muzaffarpur'),
(118, 5, 'Purnia'),
(119, 5, 'Samastipur'),
(120, 5, 'Sitamarhi'),
(121, 5, 'Siwan'),
(122, 5, 'Darbhanga'),
(123, 5, 'Gaya'),
(124, 6, 'Chandigarh'),
(142, 7, 'Ambikapur'),
(143, 7, 'Balrampur'),
(144, 7, 'Koriya'),
(145, 7, 'surajpur'),
(146, 7, 'Raipur'),
(147, 7, 'Korba'),
(148, 7, 'Bilaspur'),
(150, 7, 'Jagdalpur'),
(151, 7, 'Kanker'),
(152, 7, 'Raigarh'),
(153, 7, 'Rajnandgaon'),
(154, 7, 'Dhamtari'),
(156, 7, 'Durg'),
(157, 8, 'Silvassa'),
(158, 8, 'Dadra'),
(159, 9, 'Daman'),
(160, 9, 'Diu'),
(161, 10, 'Delhi'),
(162, 10, 'New Delhi'),
(163, 10, 'Dilli'),
(165, 11, 'Madgaon'),
(166, 11, 'Mapusa'),
(167, 11, 'Marmagao'),
(168, 11, 'Panaji'),
(169, 11, 'Panjim'),
(170, 11, 'Ponda'),
(171, 11, 'Vasco da Gama'),
(172, 11, 'Vasco'),
(173, 11, 'Goa Velha'),
(174, 12, 'Ahmedabad'),
(175, 12, 'Gandhinagar'),
(176, 12, 'Vadodara'),
(177, 12, 'Gadhada'),
(178, 12, 'Rajkot'),
(179, 12, 'Bhuj'),
(180, 12, 'Surat'),
(181, 12, 'Barodra'),
(182, 12, 'Achhod'),
(183, 12, 'Amreli'),
(184, 12, 'Anand'),
(185, 12, 'Ankleshwar'),
(186, 12, 'Bharuch'),
(187, 12, 'Bhavnagar'),
(188, 12, 'Himatnagar'),
(189, 12, 'Idar'),
(190, 12, 'Jamnagar'),
(191, 12, 'Junagadh'),
(192, 12, 'Khambat'),
(193, 12, 'Mahuva'),
(194, 12, 'Mehsana'),
(195, 12, 'Manavadar'),
(196, 12, 'Nadiad'),
(197, 12, 'Navsari'),
(198, 12, 'Patan'),
(199, 12, 'Porbandar'),
(200, 12, 'Sihor'),
(201, 12, 'Surendranagar'),
(202, 12, 'Vallabh Vidhyanagar'),
(203, 12, 'Valsad'),
(204, 12, 'Vapi'),
(205, 12, 'Vyara'),
(206, 12, 'Dahod'),
(207, 12, 'Dehgam'),
(208, 12, 'Dharampur'),
(209, 12, 'Dholka'),
(210, 12, 'Dwarka'),
(211, 12, 'Cambay'),
(212, 12, 'Godhra'),
(213, 13, 'urgaon'),
(214, 13, 'Hisar'),
(215, 13, 'Ambala'),
(216, 13, 'Rewari'),
(217, 13, 'Rohtak'),
(218, 13, 'Palwal'),
(219, 13, 'Ballabhgarh'),
(220, 13, 'Bhiwani'),
(221, 13, 'Bahadurgarh'),
(222, 13, 'Hodal'),
(223, 13, 'Hansi'),
(224, 13, 'Manesar'),
(225, 13, 'Panchkula'),
(226, 13, 'Panipat'),
(227, 13, 'Sonipat'),
(228, 13, 'Charkhi Dadri'),
(229, 13, 'Faridabad'),
(230, 13, 'Fatehabad'),
(231, 13, 'Gohana'),
(232, 14, 'Simla'),
(233, 14, 'Bilaspur'),
(234, 14, 'Hamirpur'),
(235, 14, 'Rampur'),
(236, 14, 'Shimla'),
(237, 14, 'Dharamsala'),
(238, 15, 'Srinagar'),
(239, 15, 'Jammu'),
(240, 15, 'Leh'),
(241, 15, 'Udhampur'),
(242, 16, 'Ranchi'),
(243, 16, 'Bokaro'),
(244, 16, 'Steel'),
(245, 16, 'City'),
(246, 16, 'Gumla'),
(247, 16, 'Jamshedpur'),
(248, 16, 'Patratu'),
(249, 16, 'Daltonganj'),
(250, 16, 'Deoghar'),
(251, 16, 'Dhanbad'),
(252, 16, 'Giridi'),
(253, 17, 'Bangalore'),
(254, 17, 'Mysore'),
(255, 17, 'Belgaum'),
(256, 17, 'Mangalore'),
(257, 17, 'Gulbarga'),
(258, 17, 'Bijapur'),
(259, 17, 'Bellary'),
(260, 17, 'Bidar'),
(261, 17, 'Bengaluru'),
(262, 17, 'Gundlupet'),
(263, 17, 'Hubli'),
(264, 17, 'Hassan'),
(265, 17, 'Jamakhandi'),
(266, 17, 'Kalburgi'),
(267, 17, 'Karwar'),
(268, 17, 'Madikeri'),
(269, 17, 'Mercara'),
(270, 17, 'Raichur'),
(271, 17, 'Sagar KTK'),
(272, 17, 'Sindhanur'),
(273, 17, 'Shimoga'),
(274, 17, 'Thirthahalli'),
(275, 17, 'Udupi'),
(276, 17, 'Chamrajnagar'),
(277, 17, 'Chikmagalur'),
(278, 17, 'Chitradurga'),
(279, 17, 'Davanagere'),
(280, 17, 'Dharwad'),
(281, 18, 'Ernakulam'),
(282, 18, 'Cherunniyoor'),
(283, 18, 'Vatakara'),
(284, 18, 'Thiruvananthapuram'),
(285, 18, 'Thodupuzha'),
(286, 18, 'Trichur'),
(287, 18, 'Thrikkannamangal'),
(288, 18, 'Tellicherry Kerala'),
(289, 18, 'Quilon'),
(290, 18, 'Kollam'),
(291, 18, 'Palai'),
(292, 18, 'Kochi'),
(293, 18, 'Calicut'),
(294, 18, 'Ashtamichira'),
(295, 18, 'Kayamkulam'),
(296, 18, 'Malappuram'),
(297, 18, 'Kozhikode'),
(298, 18, 'Tirur'),
(299, 18, 'Thrissur'),
(300, 18, 'Cochin'),
(301, 18, 'Kottayam'),
(302, 18, 'Trivandrum'),
(303, 20, 'Dhar'),
(304, 20, 'Dewas'),
(305, 20, 'Datia'),
(306, 20, 'Damoh'),
(307, 20, 'Dabra'),
(308, 20, 'Chitrakoot'),
(309, 20, 'Vidisha'),
(310, 20, 'Ujjain'),
(311, 20, 'Tikamgarh'),
(312, 20, 'Sironj'),
(313, 20, 'Singrauli'),
(314, 20, 'Sheopur'),
(315, 20, 'Shajapur'),
(316, 20, 'Seoni'),
(317, 20, 'Sehore'),
(318, 20, 'Satna'),
(319, 20, 'Sanawad'),
(320, 20, 'Sagar'),
(321, 20, 'Ratlam'),
(322, 20, 'Rajgarh'),
(323, 20, 'Raisen'),
(324, 20, 'Panna'),
(325, 20, 'Neemuch'),
(326, 20, 'Narsinghgarh'),
(327, 20, 'Narsimhapur'),
(328, 20, 'Murwara'),
(329, 20, 'Mandla'),
(330, 20, 'Katni'),
(331, 20, 'Jhabua'),
(332, 20, 'Harda'),
(333, 20, 'Indore'),
(334, 20, 'Gwalior'),
(335, 20, 'Jabalpur'),
(336, 20, 'Chhindwara'),
(337, 20, 'Chhatarpur'),
(338, 20, 'Rewa'),
(339, 20, 'Anuppur'),
(340, 20, 'Bhopal'),
(341, 20, 'Ashoknagar'),
(342, 20, 'Barwani'),
(343, 20, 'Betul'),
(344, 20, 'Balaghat'),
(345, 20, 'Guna'),
(346, 21, 'Pune'),
(347, 21, 'Mumbai'),
(348, 21, 'Nagpur'),
(349, 21, 'Thane'),
(350, 21, 'Akola'),
(351, 21, 'Ahmednagar'),
(352, 21, 'Solapur'),
(353, 21, 'Amravati'),
(354, 21, 'Nashik'),
(355, 21, 'Vasai'),
(356, 21, 'Sangli'),
(357, 21, 'Jalgaon'),
(358, 21, 'Roha'),
(359, 21, 'Aurangabad'),
(360, 21, 'Junnar'),
(361, 21, 'Narayangaon'),
(362, 21, 'Achalpur'),
(363, 21, 'Baramati'),
(364, 21, 'Bhandara'),
(365, 21, 'Bhiwandi'),
(366, 21, 'Kalyan'),
(367, 21, 'Kamthi'),
(368, 21, 'Karad'),
(369, 21, 'Kolhapur'),
(370, 21, 'Latur'),
(371, 21, 'Lonavla'),
(372, 21, 'Mahabaleswar'),
(373, 21, 'Malegaon'),
(374, 21, 'Mahad'),
(375, 21, 'Mira-Bhayandar'),
(376, 21, 'Miraj'),
(377, 21, 'Bombay'),
(378, 21, 'Nanded'),
(379, 21, 'Nandurbar'),
(380, 21, 'Navi Mumbai'),
(381, 21, 'Pandharpur'),
(382, 21, 'Panvel'),
(383, 21, 'Paratwada'),
(384, 21, 'Pimpri Chinchwad'),
(385, 21, 'Sangamner'),
(386, 21, 'Satara'),
(387, 21, 'Shegaon'),
(388, 21, 'Shevgaon'),
(389, 21, 'Shrivardhan'),
(390, 21, 'Sholapur'),
(391, 21, 'hrirampur'),
(392, 21, 'Shrigonda'),
(393, 21, 'Sinnar'),
(394, 21, 'Shirala'),
(395, 21, 'Ulhasnagar'),
(396, 21, 'Umred'),
(397, 21, 'Virar'),
(398, 21, 'Chandrapur'),
(399, 21, 'Chiplun'),
(400, 21, 'Dhule'),
(401, 21, 'Dombivli'),
(402, 21, 'Durgapur'),
(403, 21, 'Gadchiroli'),
(404, 22, 'Imphal'),
(405, 22, 'Lamka'),
(406, 23, 'Shillong'),
(407, 24, ' Aizwal'),
(408, 25, 'Nagaland'),
(409, 26, 'Bhubaneshwar'),
(410, 26, 'Baripada'),
(411, 26, 'Raurkela'),
(412, 26, 'Angul'),
(413, 26, 'Bargarh'),
(414, 26, 'Bhubaneswar'),
(415, 26, 'Bolangir'),
(416, 26, 'Balasore'),
(417, 26, 'Puri'),
(418, 26, 'Rairangpur'),
(419, 26, 'Rourkela'),
(420, 26, 'Sambalpur'),
(421, 26, 'Cuttack'),
(422, 26, 'Dhenkanal'),
(423, 26, 'Ganjam'),
(424, 27, 'Pondicherry'),
(425, 27, 'Mahe'),
(426, 27, 'Puducherry'),
(427, 28, 'Amritsar'),
(428, 28, 'Ludhiana'),
(429, 28, 'Jalandhar'),
(430, 28, 'Abohar'),
(431, 28, 'Banur'),
(432, 28, 'Barnala'),
(433, 28, 'Hoshiarpur'),
(434, 28, 'Jalalabad'),
(435, 28, 'Jagraon'),
(436, 28, 'Kapurthala'),
(437, 28, 'Malout'),
(438, 28, 'Moga'),
(439, 28, 'Mohali'),
(440, 28, 'Mukatsar'),
(441, 28, 'Mullanpur'),
(442, 28, 'Nangal'),
(443, 28, 'Pathankot'),
(444, 28, 'Patiala'),
(445, 28, 'Sangrur'),
(446, 28, 'Talwara'),
(447, 28, 'Chandigarh'),
(448, 28, 'Dhuri'),
(449, 28, 'Faridkot'),
(450, 29, 'Jaipur'),
(451, 29, 'Udaipur'),
(452, 29, 'Mount Abu'),
(453, 29, 'Ajmer'),
(454, 29, 'Alwar'),
(455, 29, 'Banswara'),
(456, 29, 'Baran'),
(457, 29, 'Barmer'),
(458, 29, 'Beawar'),
(459, 29, 'Bharatpur'),
(460, 29, 'Bhilwara'),
(461, 29, 'Bhinmal'),
(462, 29, 'Bikaner'),
(463, 29, 'Bilara'),
(464, 29, 'Bali'),
(465, 29, 'Hanumangarh'),
(466, 29, 'Harsawa'),
(467, 29, 'Jaisalmer'),
(468, 29, 'Jaitaran'),
(469, 29, 'Jalore'),
(470, 29, 'halawar'),
(471, 29, 'Jhunjhunu'),
(472, 29, 'Jodhpur'),
(473, 29, 'Mahwa'),
(474, 29, 'Nagaur'),
(475, 29, 'Nawalgarh'),
(476, 29, 'Pali'),
(477, 29, 'Pokaran'),
(478, 29, 'Pushkar'),
(479, 29, 'Ramgarh'),
(480, 29, 'Rani'),
(481, 29, 'Raniwara'),
(482, 29, 'Ratangarh'),
(483, 29, 'Sadri'),
(484, 29, 'Sanchore'),
(485, 29, 'Sikar'),
(486, 29, 'Sirohi'),
(487, 29, 'Sojat'),
(488, 29, 'Sriganganagar'),
(489, 29, 'Sumerpur'),
(490, 29, 'Suratgarh'),
(491, 29, 'Takhatgarh'),
(492, 29, 'Thathawata'),
(493, 29, 'Falna'),
(494, 29, 'Chittorgarh'),
(497, 30, 'Salem'),
(498, 30, 'Chennai'),
(499, 30, 'Cuddalore'),
(500, 30, 'Dharmapuri'),
(501, 30, 'Thanjavur'),
(502, 30, 'Coimbatore'),
(503, 30, 'Tiruppur'),
(504, 30, 'Madurai'),
(505, 30, 'Tiruchirappalli'),
(506, 30, 'Sivakasi'),
(507, 30, 'Tirunelveli'),
(508, 30, 'Erode'),
(509, 30, 'Kalpakkam'),
(510, 30, 'Arcot'),
(511, 30, 'Aruppukkottai'),
(512, 30, 'Bhavani'),
(513, 30, 'Gudalur'),
(514, 30, 'Kanchipuram'),
(515, 30, 'Karur'),
(516, 30, 'Nagapattinam'),
(517, 30, 'Nagercoil'),
(518, 30, 'Namakkal'),
(519, 30, 'Pollachi'),
(520, 30, 'Ramanathapuram'),
(521, 30, 'Rameshwaram'),
(522, 30, 'Sathyamangalam'),
(523, 30, 'Thiruvallur'),
(524, 30, 'Thoothukudi'),
(525, 30, 'Tuticorin'),
(526, 30, 'Tindivanam'),
(527, 30, 'Tirupattur'),
(528, 30, 'Tirupur'),
(529, 30, 'Tiruvannamalai'),
(530, 30, 'Tiruvarur'),
(531, 30, 'Udhagamandalam'),
(532, 30, 'Ootacamund'),
(533, 30, 'Ooty'),
(534, 30, 'Vandavasi'),
(535, 30, 'Vellore'),
(536, 30, 'Viluppuram'),
(537, 30, 'Virudhachalam'),
(538, 30, 'Chengalpattu'),
(539, 30, 'Madras'),
(540, 30, 'Coonoor'),
(541, 30, 'Dindigul'),
(542, 31, 'Agartala'),
(543, 31, 'Udaipur'),
(544, 32, 'Kanpur'),
(545, 32, 'Lucknow'),
(546, 32, 'Meerut'),
(547, 32, 'Agra'),
(548, 32, 'Gauhati'),
(549, 32, 'Aligarh'),
(550, 32, 'Allahabad'),
(551, 32, 'Amethi'),
(552, 32, 'Azamgarh'),
(553, 32, 'Bareilly'),
(554, 32, 'Bijnaur'),
(555, 32, 'Bahraich'),
(556, 32, 'Balia'),
(557, 32, 'Balrampur'),
(558, 32, 'Banda'),
(559, 32, 'Gorakhpur'),
(560, 32, 'Greater Noida'),
(561, 32, 'Hardoi'),
(562, 32, 'Hastinapur'),
(563, 32, 'Hathras'),
(564, 32, 'Jais'),
(565, 32, 'Jaunpur'),
(566, 32, 'Jhansi'),
(567, 32, 'Lalitpur'),
(568, 32, 'Mahoba'),
(569, 32, 'Mahotsav Nagar'),
(570, 32, 'Mandsaur'),
(571, 32, 'Mathura'),
(572, 32, 'Mirzapur'),
(573, 32, 'Moradabad'),
(574, 32, 'Muzaffarnagar'),
(575, 32, 'Noida'),
(576, 32, 'Nizamabad'),
(577, 32, 'Pratapgarh'),
(578, 32, 'Rae Bareli'),
(579, 32, 'Renukoot'),
(580, 32, 'Saharanpur'),
(581, 32, 'Sirsa'),
(582, 32, 'Sitapur'),
(583, 32, 'Unnao'),
(584, 32, 'Varanasi'),
(585, 32, 'Benares'),
(586, 32, 'Banaras'),
(587, 32, 'Kashi'),
(588, 32, 'Charkhari'),
(589, 32, 'Dadri'),
(590, 32, 'Etah'),
(591, 32, 'Etawah'),
(592, 32, 'Faizabad'),
(593, 32, 'Farrukhabad'),
(594, 32, 'Fatehgarh'),
(595, 32, 'Fatehpur Sikri'),
(596, 32, 'Firozabad'),
(597, 32, 'Ghaziabad'),
(598, 32, 'Ghazipur'),
(599, 33, 'Dehra Dun'),
(600, 33, 'Naini Tal'),
(601, 33, 'Haldwani'),
(602, 33, 'Haridwar'),
(603, 33, 'Mussoorie'),
(604, 33, 'Nainital'),
(605, 33, 'Pithoragarh'),
(606, 33, 'Ranikhet'),
(607, 33, 'Rishikesh'),
(608, 33, 'Roorkee'),
(609, 33, 'Champawat'),
(610, 33, 'Dehradun'),
(611, 34, 'Calcutta'),
(612, 34, 'Raniganj'),
(613, 34, 'Durgapur '),
(614, 34, 'Burdwan'),
(615, 34, 'Kharagpur'),
(616, 34, 'Asansol'),
(617, 34, 'Baharampur'),
(618, 34, 'Bardhaman'),
(619, 34, 'Barrackpur'),
(620, 34, 'Haldia'),
(621, 34, 'Howrah'),
(622, 34, 'Halisahar'),
(623, 34, 'Kolkata'),
(624, 34, 'Krishnanagar'),
(625, 34, 'Murshidabad'),
(626, 34, 'Ranaghat'),
(627, 34, 'Rishra'),
(628, 34, 'Siliguri'),
(629, 34, 'Tamluk'),
(630, 34, 'Uttarpara'),
(631, 34, 'Chandannagar'),
(632, 34, 'Contai'),
(633, 34, 'Cooch Behar'),
(634, 34, 'Kochbihar'),
(635, 34, 'Darjeeling'),
(636, 34, 'Dhulian'),
(637, 34, 'Dumdum'),
(638, 19, 'Lakshadweep'),
(639, 7, 'Sukma'),
(640, 7, 'Kondagaon'),
(641, 7, 'Gariyaband'),
(642, 7, 'Baloda Bazar'),
(643, 7, 'Mungeli'),
(644, 7, 'Bemetara'),
(645, 7, 'Balod'),
(646, 7, 'Bijapur'),
(647, 7, 'Narayanpur'),
(648, 7, 'Dantewada'),
(649, 7, 'Kawardha'),
(650, 7, 'Mahasamund'),
(651, 7, 'Jashpur'),
(652, 7, 'Janjgir-Champa'),
(653, 7, 'Bastar'),
(654, 20, 'Khandwa'),
(655, 20, 'Bhind'),
(656, 20, 'Sahdol'),
(657, 21, 'Gondia');

-- --------------------------------------------------------

--
-- Table structure for table `dm_login`
--

CREATE TABLE `dm_login` (
  `DM_Id` smallint(6) NOT NULL,
  `R_Emp_Code` varchar(75) NOT NULL,
  `DM_Emp_Code` varchar(75) NOT NULL,
  `DM_State` tinyint(4) NOT NULL,
  `DM_District` smallint(6) NOT NULL,
  `DM_Block` int(11) NOT NULL,
  `DM_Address` varchar(300) NOT NULL,
  `DM_Password` varchar(50) NOT NULL,
  `DM_Status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_login`
--

INSERT INTO `dm_login` (`DM_Id`, `R_Emp_Code`, `DM_Emp_Code`, `DM_State`, `DM_District`, `DM_Block`, `DM_Address`, `DM_Password`, `DM_Status`) VALUES
(1, 'AB00004', 'AB00002', 7, 152, 6, 'asdf asdf asdf asdf asdf asdf', '123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_master`
--

CREATE TABLE `employee_master` (
  `EMP_Id` mediumint(9) NOT NULL,
  `EMP_Code` varchar(75) NOT NULL,
  `EMP_Name` varchar(75) NOT NULL,
  `DOJ` date NOT NULL,
  `EMP_Designation` varchar(75) NOT NULL,
  `EMP_Image` varchar(75) NOT NULL,
  `State_Id` tinyint(4) NOT NULL,
  `District_Id` smallint(6) NOT NULL,
  `Block_Id` int(11) NOT NULL,
  `EMP_Address` varchar(300) NOT NULL,
  `EMP_Contact` varchar(15) NOT NULL,
  `EMP_Email` varchar(50) NOT NULL,
  `EMP_Salary` int(11) NOT NULL,
  `Posting_Place` varchar(50) NOT NULL,
  `Duty_Time` varchar(50) NOT NULL,
  `Visiting_Date_Place` varchar(50) NOT NULL,
  `emp_sign` varchar(100) NOT NULL COMMENT '//emp signature_name'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_master`
--

INSERT INTO `employee_master` (`EMP_Id`, `EMP_Code`, `EMP_Name`, `DOJ`, `EMP_Designation`, `EMP_Image`, `State_Id`, `District_Id`, `Block_Id`, `EMP_Address`, `EMP_Contact`, `EMP_Email`, `EMP_Salary`, `Posting_Place`, `Duty_Time`, `Visiting_Date_Place`, `emp_sign`) VALUES
(1, 'AB00001', 'V Sudhir', '2017-06-28', 'Regional Manager', '1498819685.jpg', 7, 152, 1, 'Kaledonia 1st Floor, Office No-26, Sahar Road', '9826396462', 'sudhir5106@gmail.com', 50000, 'Bhilai', '10AM to 6PM', '28.06.2017 Bhilai', ''),
(2, 'AB00002', 'V Manasa', '2017-06-30', 'District Manager', '1498819700.jpg', 7, 152, 6, 'sd asdfa sdf asdf asdf asdf', '9479256604', 's@gmail.com', 30000, 'Durg', '10AM to 6PM', '01.07.2017 Bhilai', ''),
(4, 'AB00003', 'Jagjit Singh', '2017-07-05', 'Regional Manager', '1499262954.jpg', 7, 152, 4, 'dfas asfd asdf asdf ', '9826396462', 'jagjit@gmail.com', 50000, 'Raigarh', '10AM to 6PM', 'zxdasdf', ''),
(5, 'AB00004', 'Dr. Sandeep Dave', '2017-07-06', 'Regional Manager', '1499352383.jpg', 7, 152, 11, 'sd asdf asdf asdf asdfafds', '9479256605', 'sandeep@gmail.com', 50000, 'Bhilai', '10AM to 6PM', '07.07.2017 Bhilai', ''),
(6, 'AB00005', 'Rakesh Nair', '2017-07-06', 'Center Manager', '1499358967.jpg', 7, 152, 1, 'asdf asdf asdf asdf asdfasf dasfd', '9826138203', 'nair_bhilai@gmail.com', 10000, 'Raigarh', '10AM to 6PM', '07.07.2017 Bhilai', ''),
(7, 'AB001', 'SDFSDF', '2017-11-02', 'Regional Manager', '1509610157.jpg', 7, 152, 7, 'xcgvsdfgsd', '1234567890', 'richa.sach.meshram@gmail.com', 1200, 'sdfasd', '10AM to 6PM', '28.06.2017 Bhilai', ''),
(8, 'fdghdf', 'ghdgdf', '2017-11-02', 'Regional Manager', '1509610443.jpg', 7, 152, 11, 'cvhdh', '1234567890', 'richameshram1988@gmail.com', 1234, 'urtuy', '10am to 6 pm', 'hdfg', '1509610443.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fees_payment`
--

CREATE TABLE `fees_payment` (
  `Payment_Id` int(11) NOT NULL,
  `Payment_Date` datetime NOT NULL,
  `Paid_Amt` float NOT NULL,
  `Payment_Mode` tinyint(4) NOT NULL,
  `Cheque_DD_No` varchar(30) DEFAULT NULL,
  `Transaction_No` varchar(30) DEFAULT NULL,
  `Which_Bank_Cheque_DD` varchar(75) DEFAULT NULL,
  `Student_Id` int(11) NOT NULL,
  `CM_Id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees_payment`
--

INSERT INTO `fees_payment` (`Payment_Id`, `Payment_Date`, `Paid_Amt`, `Payment_Mode`, `Cheque_DD_No`, `Transaction_No`, `Which_Bank_Cheque_DD`, `Student_Id`, `CM_Id`) VALUES
(2, '2017-08-12 14:30:48', 500, 1, '', '', '', 1, 3),
(3, '2017-08-12 14:32:34', 1000, 2, '12345', '', 'Axis Bank', 1, 3),
(4, '2017-08-12 14:33:13', 5000, 3, '', '654987321654', '', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ho_notice`
--

CREATE TABLE `ho_notice` (
  `Notice_Id` int(11) NOT NULL,
  `Notice_Date` date NOT NULL,
  `Notice` text NOT NULL,
  `Student_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ho_notice`
--

INSERT INTO `ho_notice` (`Notice_Id`, `Notice_Date`, `Notice`, `Student_Id`) VALUES
(1, '2017-08-06', 'head office notice please upload your documents as soon as possible. head office notice please upload your documents as soon as possible. head office notice please upload your documents as soon as possible. head office notice please upload your documents as soon as possible. ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `News_Id` tinyint(4) NOT NULL,
  `News_Content` varchar(400) NOT NULL,
  `News_Date_Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`News_Id`, `News_Content`, `News_Date_Time`) VALUES
(3, 'NSDC releases RFP for monitoring technical and financial performance of its projects. Due date for submission is 7th June, 2014.', '2014-04-22 20:09:09'),
(4, 'Modi aims to make India Global source of skilled manpower', '2014-06-26 13:47:58'),
(5, 'Skilled India instead of Scam India: PM', '2014-06-26 13:48:50'),
(6, 'Notice regarding monitoring RFP issued by NSDC', '2014-06-26 13:50:53'),
(7, 'RFP for development of NOS in Life Sciences Sector Skill Development Council', '2014-06-26 13:51:01'),
(8, 'Request for Proposal for Udaan onground implementation and Advocacy in Kashmir & Ladakh', '2014-06-26 13:51:10');

-- --------------------------------------------------------

--
-- Table structure for table `rm_login`
--

CREATE TABLE `rm_login` (
  `R_Id` smallint(6) NOT NULL,
  `R_Emp_Code` varchar(75) NOT NULL,
  `R_State` tinyint(4) NOT NULL,
  `R_District` smallint(6) NOT NULL,
  `R_Block` int(11) NOT NULL,
  `R_Address` varchar(300) NOT NULL,
  `R_Password` varchar(50) NOT NULL,
  `R_Status` tinyint(4) NOT NULL COMMENT '0 for Block and 1 for Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rm_login`
--

INSERT INTO `rm_login` (`R_Id`, `R_Emp_Code`, `R_State`, `R_District`, `R_Block`, `R_Address`, `R_Password`, `R_Status`) VALUES
(1, 'AB00004', 7, 152, 1, 'as fasdf asdf asfd asdf', '123456', 1),
(2, 'AB00003', 7, 152, 1, 'dasdf asd adsf asdf asdfadsf ', '123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE `state_master` (
  `State_Id` tinyint(4) NOT NULL,
  `State_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`State_Id`, `State_Name`) VALUES
(1, 'Andaman and Nicobar Islands'),
(2, 'Andhra Pradesh'),
(3, 'Arunachal Pradesh'),
(4, 'Assam'),
(5, 'Bihar'),
(6, 'Chandigarh'),
(7, 'Chhattisgarh'),
(8, 'Dadra and Nagar Haveli'),
(9, 'Daman and Diu'),
(10, 'Delhi'),
(11, 'Goa'),
(12, 'Gujarat'),
(13, 'Haryana'),
(14, 'Himachal Pradesh'),
(15, 'Jammu and Kashmir'),
(16, 'Jharkhand '),
(17, 'Karnataka '),
(18, 'Kerala '),
(19, 'Lakshadweep '),
(20, 'Madhya Pradesh '),
(21, 'Maharashtra'),
(22, 'Manipur'),
(23, 'Meghalaya'),
(24, 'Mizoram'),
(25, 'Nagaland'),
(26, 'Orissa'),
(27, 'Pondicherry'),
(28, 'Punjab'),
(29, 'Rajasthan'),
(30, 'Tamil Nadu'),
(31, 'Tripura'),
(32, 'Uttar Pradesh'),
(33, 'Uttaranchal '),
(34, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `student_document`
--

CREATE TABLE `student_document` (
  `Doc_Id` int(11) NOT NULL,
  `Doc_Name` varchar(100) NOT NULL,
  `Doc_File` varchar(75) NOT NULL,
  `Student_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_document`
--

INSERT INTO `student_document` (`Doc_Id`, `Doc_Name`, `Doc_File`, `Student_Id`) VALUES
(2, 'Voter Id Card', '1501769606.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_master`
--

CREATE TABLE `student_master` (
  `Student_Id` int(11) NOT NULL,
  `Reg_Date` date NOT NULL,
  `Application_No` int(11) NOT NULL,
  `Student_Code` int(11) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Student_Name` varchar(75) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` tinyint(4) NOT NULL,
  `Father_Name` varchar(75) NOT NULL,
  `Mother_Name` varchar(75) NOT NULL,
  `Religion` varchar(10) NOT NULL,
  `Caste` varchar(10) NOT NULL,
  `Phisical_Status` tinyint(4) NOT NULL,
  `Aadhaar_No` varchar(15) NOT NULL,
  `Education` varchar(15) NOT NULL,
  `Course_Id` smallint(6) NOT NULL,
  `Mode` varchar(15) NOT NULL,
  `Session` varchar(15) NOT NULL,
  `About_Fee_Deposite` text NOT NULL,
  `Block_Id` int(11) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `Pincode` varchar(15) NOT NULL,
  `Contact_No` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Bank_Name` varchar(75) NOT NULL,
  `Account_No` varchar(30) NOT NULL,
  `Bank_Address` varchar(300) NOT NULL,
  `IFSC_Code` varchar(20) NOT NULL,
  `Photo` varchar(75) NOT NULL,
  `Signature` varchar(75) NOT NULL,
  `Gaurdian_Signature` varchar(75) NOT NULL,
  `CM_Id` smallint(6) NOT NULL,
  `Reference` varchar(75) NOT NULL,
  `Registration_No` int(11) NOT NULL,
  `Entry_No` int(11) NOT NULL,
  `Approval_Status` tinyint(4) NOT NULL,
  `Status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_master`
--

INSERT INTO `student_master` (`Student_Id`, `Reg_Date`, `Application_No`, `Student_Code`, `Password`, `Student_Name`, `DOB`, `Gender`, `Father_Name`, `Mother_Name`, `Religion`, `Caste`, `Phisical_Status`, `Aadhaar_No`, `Education`, `Course_Id`, `Mode`, `Session`, `About_Fee_Deposite`, `Block_Id`, `Address`, `Pincode`, `Contact_No`, `Email`, `Bank_Name`, `Account_No`, `Bank_Address`, `IFSC_Code`, `Photo`, `Signature`, `Gaurdian_Signature`, `CM_Id`, `Reference`, `Registration_No`, `Entry_No`, `Approval_Status`, `Status`) VALUES
(1, '2017-07-31', 1, 4376, 'student', 'v sudhir', '1984-01-09', 1, 'v gandhi', 'v saroja', 'Hindu', 'OBC', 2, '123456781234', 'Diploma', 2, 'regular', 'january', 'The student will pay in 4 installments, First 3 installment will be 20%-20% and the last installment will be 40% which he will pay in august month, because he belongs to very poor family that is why we gave him the time to pay the fees. ', 6, 'asdf adsf asdf ', '490020', '9826396462', 's@gmail.com', 'Axis Bank', '214010100136631', 'Supela, Bhilai, Chhattisgarh', 'UTIB0000214', '1501511959.jpg', '1501511959.jpg', '1501511959.jpg', 3, 'Naresh Sahu', 295566, 298523, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`Login_Id`);

--
-- Indexes for table `block_master`
--
ALTER TABLE `block_master`
  ADD PRIMARY KEY (`Block_Id`),
  ADD KEY `FK_districtBlock` (`District_Id`);

--
-- Indexes for table `center_notice`
--
ALTER TABLE `center_notice`
  ADD PRIMARY KEY (`Notice_Id`),
  ADD KEY `CM_Id` (`CM_Id`),
  ADD KEY `Student_Id` (`Student_Id`);

--
-- Indexes for table `cm_login`
--
ALTER TABLE `cm_login`
  ADD PRIMARY KEY (`CM_Id`);

--
-- Indexes for table `course_master`
--
ALTER TABLE `course_master`
  ADD PRIMARY KEY (`Course_Id`);

--
-- Indexes for table `district_master`
--
ALTER TABLE `district_master`
  ADD PRIMARY KEY (`District_Id`),
  ADD KEY `State_Id` (`State_Id`);

--
-- Indexes for table `dm_login`
--
ALTER TABLE `dm_login`
  ADD PRIMARY KEY (`DM_Id`);

--
-- Indexes for table `employee_master`
--
ALTER TABLE `employee_master`
  ADD PRIMARY KEY (`EMP_Id`);

--
-- Indexes for table `fees_payment`
--
ALTER TABLE `fees_payment`
  ADD PRIMARY KEY (`Payment_Id`),
  ADD KEY `student_Id` (`Student_Id`),
  ADD KEY `CM_Id` (`CM_Id`);

--
-- Indexes for table `ho_notice`
--
ALTER TABLE `ho_notice`
  ADD PRIMARY KEY (`Notice_Id`),
  ADD KEY `Student_Id` (`Student_Id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`News_Id`);

--
-- Indexes for table `rm_login`
--
ALTER TABLE `rm_login`
  ADD PRIMARY KEY (`R_Id`);

--
-- Indexes for table `state_master`
--
ALTER TABLE `state_master`
  ADD PRIMARY KEY (`State_Id`);

--
-- Indexes for table `student_document`
--
ALTER TABLE `student_document`
  ADD PRIMARY KEY (`Doc_Id`),
  ADD KEY `Student_Id` (`Student_Id`);

--
-- Indexes for table `student_master`
--
ALTER TABLE `student_master`
  ADD PRIMARY KEY (`Student_Id`),
  ADD KEY `Course_Id` (`Course_Id`),
  ADD KEY `Block_Id` (`Block_Id`),
  ADD KEY `CM_Id` (`CM_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `Login_Id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `block_master`
--
ALTER TABLE `block_master`
  MODIFY `Block_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `center_notice`
--
ALTER TABLE `center_notice`
  MODIFY `Notice_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cm_login`
--
ALTER TABLE `cm_login`
  MODIFY `CM_Id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `course_master`
--
ALTER TABLE `course_master`
  MODIFY `Course_Id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `district_master`
--
ALTER TABLE `district_master`
  MODIFY `District_Id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=658;
--
-- AUTO_INCREMENT for table `dm_login`
--
ALTER TABLE `dm_login`
  MODIFY `DM_Id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee_master`
--
ALTER TABLE `employee_master`
  MODIFY `EMP_Id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `fees_payment`
--
ALTER TABLE `fees_payment`
  MODIFY `Payment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ho_notice`
--
ALTER TABLE `ho_notice`
  MODIFY `Notice_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `News_Id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rm_login`
--
ALTER TABLE `rm_login`
  MODIFY `R_Id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `State_Id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `student_document`
--
ALTER TABLE `student_document`
  MODIFY `Doc_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student_master`
--
ALTER TABLE `student_master`
  MODIFY `Student_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `block_master`
--
ALTER TABLE `block_master`
  ADD CONSTRAINT `FK_districtBlock` FOREIGN KEY (`District_Id`) REFERENCES `district_master` (`District_Id`);

--
-- Constraints for table `center_notice`
--
ALTER TABLE `center_notice`
  ADD CONSTRAINT `center_notice_ibfk_1` FOREIGN KEY (`CM_Id`) REFERENCES `cm_login` (`CM_Id`),
  ADD CONSTRAINT `center_notice_ibfk_2` FOREIGN KEY (`Student_Id`) REFERENCES `student_master` (`Student_Id`);

--
-- Constraints for table `district_master`
--
ALTER TABLE `district_master`
  ADD CONSTRAINT `district_master_ibfk_1` FOREIGN KEY (`State_Id`) REFERENCES `state_master` (`State_Id`),
  ADD CONSTRAINT `district_master_ibfk_2` FOREIGN KEY (`State_Id`) REFERENCES `state_master` (`State_Id`);

--
-- Constraints for table `fees_payment`
--
ALTER TABLE `fees_payment`
  ADD CONSTRAINT `fees_payment_ibfk_1` FOREIGN KEY (`student_Id`) REFERENCES `student_master` (`Student_Id`),
  ADD CONSTRAINT `fees_payment_ibfk_2` FOREIGN KEY (`CM_Id`) REFERENCES `cm_login` (`CM_Id`);

--
-- Constraints for table `ho_notice`
--
ALTER TABLE `ho_notice`
  ADD CONSTRAINT `ho_notice_ibfk_2` FOREIGN KEY (`Student_Id`) REFERENCES `student_master` (`Student_Id`);

--
-- Constraints for table `student_document`
--
ALTER TABLE `student_document`
  ADD CONSTRAINT `student_document_ibfk_1` FOREIGN KEY (`Student_Id`) REFERENCES `student_master` (`Student_Id`);

--
-- Constraints for table `student_master`
--
ALTER TABLE `student_master`
  ADD CONSTRAINT `student_master_ibfk_1` FOREIGN KEY (`Course_Id`) REFERENCES `course_master` (`Course_Id`),
  ADD CONSTRAINT `student_master_ibfk_2` FOREIGN KEY (`Block_Id`) REFERENCES `block_master` (`Block_Id`),
  ADD CONSTRAINT `student_master_ibfk_3` FOREIGN KEY (`CM_Id`) REFERENCES `cm_login` (`CM_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

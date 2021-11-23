-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 02:28 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flutterdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

CREATE TABLE `apartment` (
  `apm_id` int(11) NOT NULL,
  `apm_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_thai_520_w2 NOT NULL,
  `apm_price` int(20) NOT NULL,
  `apm_location` varchar(300) CHARACTER SET utf8 COLLATE utf8_thai_520_w2 NOT NULL,
  `apm_phone` varchar(10) CHARACTER SET utf8 COLLATE utf8_thai_520_w2 NOT NULL,
  `apm_limitedroom` varchar(100) CHARACTER SET utf8 COLLATE utf8_thai_520_w2 NOT NULL,
  `apm_facilities` varchar(50) CHARACTER SET utf8 COLLATE utf8_thai_520_w2 NOT NULL,
  `apm_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_thai_520_w2 NOT NULL,
  `apm_detail` text CHARACTER SET utf8 COLLATE utf8_thai_520_w2 NOT NULL,
  `apm_image` varchar(300) CHARACTER SET utf8 COLLATE utf8_thai_520_w2 NOT NULL,
  `apm_review` varchar(10) NOT NULL,
  `apm_image2` varchar(50) NOT NULL,
  `apm_image3` varchar(50) NOT NULL,
  `apm_image4` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apartment`
--

INSERT INTO `apartment` (`apm_id`, `apm_name`, `apm_price`, `apm_location`, `apm_phone`, `apm_limitedroom`, `apm_facilities`, `apm_type`, `apm_detail`, `apm_image`, `apm_review`, `apm_image2`, `apm_image3`, `apm_image4`) VALUES
(1, 'Green Residence Pattani', 5500, 'ถ.เจริญประดิษฐ์ รูสะมิแล เมืองปัตตานี ปัตตานี', '083-752484', 'ห้องพักรวม', 'Free WiFi', 'อพาร์ทเม้น', 'อพาร์ทเม้นท์รายเดือนเปิดใหม่\r\nเฟอร์นิเจอร์บิ้วอิน ห้องสวย ทำเลดี วิวทะเล สวยมาก พร้อมเข้าอยู่ !!\r\nเฟอร์นิเจอร์ เครื่องปรับอากาศ ทีวี ตู้เย็น เครื่องทำน้ำอุ่น และสิ่งอำนวยความสะดวกครบครัน\r\nอาทิเช่น ลิฟท์ อินเตอร์เน็ต เครื่องซักผ้า\r\nเข้าออกด้วยระบบคีย์การ์ด มีรปภ.ประจำการทั้งคืน กล้องวงจรปิด CCTV', 'apm1.jpg', '5.0', '22.jpg', '88.jpg', '89.jpg'),
(2, 'B.M.Pattani Apartment', 4500, 'ซ.เจริญประดิษฐ์ 12 รูสะมิแล เมืองปัตตานี ปัตตานี', '091-202900', 'ห้องพักรวม', 'Free WiFi', 'อพาร์ทเม้น', '-- สถานที่ใกล้เคียง ---\r\nมหาวิทยาลัยสงขลานครินทร์ วิทยาเขตปัตตานี\r\nโรงเรียนสาธิตมหาวิทยาลัยสงขลานครินทร์\r\nโรงเรียนเดชะปัตตนยานุกูล\r\nโรงเรียนเบญจมราชูทิศ จังหวัดปัตตานี\r\nโรงแรมซีแอสปัตตานี\r\nเทศบาลเมืองปัตตานี\r\nศาลากลางจังหวัดปัตตานี\r\nสำนักงานที่ดิน จังหวัดปัตตานี\r\nสำนักงานประกันสังคม จังหวัดปัตตานี', 'apm2.jpg', '5.0', 'a1.JPG', 'a2.JPG', 'a3.JPG'),
(3, 'บีโฟร์อาพาร์ทเมันท์', 4000, 'ซ.9 ถ.เจริญประดิษฐ์ รูสะมิแล เมืองปัตตานี ปัตตานี', '095-714517', 'ห้องพักรวม', 'Free WiFi', 'อพาร์ทเม้น', 'มีที่จอดรถ สะดวกสบาย', 'apm3.jpg', '4.0', 'a11.JPG', 'a22.JPG', 'a33.JPG'),
(4, 'เจริญประดิษฐ์อาพาร์ทเม้น', 4000, 'ถ.เจริญประดิษฐ์ รูสะมิแล เมืองปัตตานี ปัตตานี', '082-984332', 'ห้องพักรวม', 'Free WiFi', 'อพาร์ทเม้น', 'ที่พักสบาย และสวยงามยานจังหวัดปัตตานี', 'apm4.jpg', '4.0', 'a111.JPG', 'a222.JPG', 'a33.JPG'),
(5, 'บีทูอาพาร์ทเม้นท์', 3500, 'ซ.10 ถ.เจริญประดิษฐ์ รูสะมิแล เมืองปัตตานี ปัตตานี', '086-491723', 'ห้องพักรวม', 'Free WiFi', 'อพาร์ทเม้น', 'ตึกใหม่ พึ่งสร้างเสร็จ 1 ปี\r\nโทรมาสอบถามได้เลย', 'apm5.jpg', '4.0', 'a1111.JPG', 'a2222.JPG', 'a3333.JPG'),
(6, 'เจ.ซี.อพาร์ทเม้นท์', 3500, 'ซ.12 ถ.เจริญประดิษฐ์ รูสะมิแล เมืองปัตตานี ปัตตานี', '089-463535', 'ห้องพักรวม', 'FreeWifi', 'อพาร์ทเม้น', 'อุปกรณ์ที่ต้องนำมาในวันเข้าพักครั้งแรก\r\n1. ชุดผ้าปูที่นอน ขนาด 6 ฟุต\r\n2. หมอน จำนวน 2 ใบ (มีจำหน่าย/ให้เช่า)\r\n\r\nข้อกำหนดในการคืนเงินประกัน\r\n1. อยู่ครบ 6 เดือน ขึ้นไป คืนเงินประกันหลังหักค่าใช้จ่าย ภายใน 5 วัน นับตั้งแต่วันย้ายออก\r\n2. อยู่ไม่ครบ 6 เดือน ไม่ได้เงินประกันคืน\r\n', 'apm6.jpg', '5.0', 'a11111.JPG', 'a22222.JPG', 'a33333.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(20) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `condo`
--

CREATE TABLE `condo` (
  `condo_id` int(11) NOT NULL,
  `condo_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `condo_price` int(11) NOT NULL,
  `condo_location` varchar(100) CHARACTER SET utf8 NOT NULL,
  `condo_phone` varchar(15) CHARACTER SET utf8 NOT NULL,
  `condo_limitedroom` varchar(30) CHARACTER SET utf8 NOT NULL,
  `condo_facilities` varchar(30) CHARACTER SET utf8 NOT NULL,
  `condo_type` varchar(30) CHARACTER SET utf8 NOT NULL,
  `condo_detail` text COLLATE utf8_thai_520_w2 NOT NULL,
  `condo_image` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL,
  `condo_review` varchar(5) COLLATE utf8_thai_520_w2 NOT NULL,
  `condo_image2` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL,
  `condo_image3` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL,
  `condo_image4` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `condo`
--

INSERT INTO `condo` (`condo_id`, `condo_name`, `condo_price`, `condo_location`, `condo_phone`, `condo_limitedroom`, `condo_facilities`, `condo_type`, `condo_detail`, `condo_image`, `condo_review`, `condo_image2`, `condo_image3`, `condo_image4`) VALUES
(1, 'Yensabaidee Condo', 5000, 'ริมแม่น้ำกลางเมืองปัตตานี 99 ถ.เฉลิมพระเกิยติ ต.สะบารัง อ.เมือง จ.ปัตตานี', '084-9965841', 'ห้องพักรวม', 'free wifi', 'condominium', 'คอนโดริมแม่น้ำ ใจกลางเมืองปัตตานี ตอบโจทย์ให้คนรุ่นใหม่ในปัตตานี ทั้งความสะดวกสบาย ทำเลติดริมแม่น้ำปัตตานี ด้วยพื้นที่โครงการเกือบ 2 ไร่ กว้างขวางและไปมาสะดวก ใกล้กับสถานที่ราชการและสถานบริการต่างๆ เช่น สำนักงานเทศเมืองปัตตานี ศาลากลาง โรงพยาบาล และไปรษณีย์ รวมไปถึงตลาดโต้รุ่งและตลาดเปิดท้าย', 'Yensabaidee.jpg', '5.0', 'Yensabaidee-41-1.jpg', 'Yensabaidee-44.jpg', 'Yensabaidee-49-1.jpg'),
(2, 'Pattani Place Condotel', 7000, '99 ถนนเฉลิมพระเกียรติ ตำบล สะบารัง เมือง ปัตตานี 94000', '084-9963841', 'ห้องพักรวม', 'free wifi', 'condominium', 'พบการพักผ่อนรูปแบบใหม่ในสไตล์รีสอร์ท \r\nท่ามกลางบรรยากาศร่มรื่น เพื่อเติมความสุข ไปกับสิ่งที่ชอบได้ทุกเวลา พร้อมฟังก์ชันครบตอบโจทย์ทุกไลฟ์สไตล์ และส่วนกลางให้ผ่อนคลายได้อย่างอิสระ บนทำเลใกล้ MRT บางขุนนนท์ และทางด่วน สะดวกสบายทุกการเดินทาง', 'Larissa-Condo-Praksa-51.jpg', '5.0', 'l_6500.jpg', '13-13-the-valley-23.jpg', '3centric-ari.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dormitory`
--

CREATE TABLE `dormitory` (
  `dm_id` int(11) NOT NULL,
  `dm_name` varchar(100) NOT NULL,
  `dm_price` int(11) NOT NULL,
  `dm_location` varchar(100) NOT NULL,
  `dm_phone` varchar(11) NOT NULL,
  `dm_limitedroom` varchar(50) NOT NULL,
  `dm_facilities` varchar(50) NOT NULL,
  `dm_type` varchar(50) NOT NULL,
  `dm_detail` text NOT NULL,
  `dm_image` varchar(20) NOT NULL,
  `dm_review` varchar(10) NOT NULL,
  `dm_image2` varchar(50) NOT NULL,
  `dm_image3` varchar(50) NOT NULL,
  `dm_image4` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dormitory`
--

INSERT INTO `dormitory` (`dm_id`, `dm_name`, `dm_price`, `dm_location`, `dm_phone`, `dm_limitedroom`, `dm_facilities`, `dm_type`, `dm_detail`, `dm_image`, `dm_review`, `dm_image2`, `dm_image3`, `dm_image4`) VALUES
(1, 'หอพักหญิงมารีน่า', 2800, 'ซ.- ถ.สามัคคี รูสะมิแล เมืองปัตตานี ปัตตานี', '087-9694495', 'ห้องพักหญิง', 'Free WiFi', 'หอพัก', 'ห้องพักหญิง ปลอดภัย สะดวกสบาย', 'dm1.jpg', '4.0', 'ms1111.JPG', 'ms2222.JPG', 'ms3333.JPG'),
(2, 'หอพักหทัยพัฒน์', 1700, 'ซ.เจริญประดิษฐ์12 ถ.เจริญประดิษฐ์ รูสะมิแล เมืองปัตตานี ปัตตานี', '091-2029009', 'ห้องพักรวม', 'Free WiFi', 'หอพัก', '- สถานที่ใกล้เคียง ---\r\nมหาวิทยาลัยสงขลานครินทร์ วิทยาเขตปัตตานี\r\nโรงเรียนสาธิตมหาวิทยาลัยสงขลานครินทร์\r\nโรงเรียนเดชะปัตตนยานุกูล\r\nโรงเรียนเบญจมราชูทิศ จังหวัดปัตตานี\r\nโรงแรมซีแอสปัตตานี\r\nเทศบาลเมืองปัตตานี\r\nศาลากลางจังหวัดปัตตานี\r\nสำนักงานที่ดิน จังหวัดปัตตานี\r\nสำนักงานประกันสังคม จังหวัดปัตตานี\r\n', 'dm2.jpg', '3.5', 'ms1.JPG', 'ms2.JPG', 'ms3.JPG'),
(3, 'เก้าสนคอร์ท', 2500, 'ซ.5 ถ.หลังมอ. รูสะมิแล เมืองปัตตานี ปัตตานี', '081-0966006', 'ห้องพักรวม', 'Free WiFi', 'หอพัก', 'หอพัก-อพาร์ตเมนต์ราคาถูก ทำเลดีมาก ใกล้มอ. สามารถเดินได้150เมตร มีความปลอดภัย มี wifi มีร้านค้าภายใน เครื่องซักผ้าหยอดเหรียญ ที่จอดรถเยอะ คีย์การ์ด กล้องวงจรปิด', 'dm3.jpg', '5.0', 'ms11.JPG', 'ms22.JPG', 'ms33.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `game_id` varchar(15) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `game_price` int(5) NOT NULL,
  `game_detail` text NOT NULL,
  `game_img` varchar(255) NOT NULL,
  `game_stock` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `game_id`, `game_name`, `game_price`, `game_detail`, `game_img`, `game_stock`) VALUES
(30, 'GA4', 'Doraemon', 2500, '', 'pict_20211019_061925_addcf11224.jpg', 500),
(31, 'GA5', 'Titan', 2000, '', 'pict_20211019_063310_85270fa0c2.jpg', 10),
(32, 'GA6', 'Simson', 1000, '', 'pict_20211019_063356_2f8bb51c3c.jpg', 60),
(27, 'GA3', 'GTA V', 2000, 'Grand Theft Auto V is an open world, action-adventure video game developed by Rockstar North and published by Rockstar Games. It was released on 17 September 2013 for the PlayStation 3 and Xbox 360. It is the fifteenth title in the Grand Theft Auto series, and the first main entry since Grand Theft Auto IV in 2008. Set within the fictional state of San Andreas, based on Southern California, Grand Theft Auto V\'s single-player story follows three criminals and their efforts to execute a number of heists while under pressure from government agencies. The game\'s use of open world design allows the player to freely roam the state\'s countryside and the city of Los Santos, based on Los Angeles.', 'Gta5.jpg', 30),
(25, 'GA1', 'SkyRim', 1000, 'The Elder Scrolls V: Skyrim is an action role-playing video game developed by Bethesda Game Studios and published by Bethesda Softworks.', 'Skyrim.jpg', 10),
(26, 'GA2', 'Skyrim', 1500, 'Assassin\'s Creed IV: Black Flag is a 2013 historical action-adventure open world video game developed by Ubisoft Montreal and published by Ubisoft. It was released worldwide for the PlayStation 3 and Xbox 360 on October 29, 2013; for the Wii U on October 29, 2013 in North America, on November 21, 2013 in Australia, on November 22, 2013 in Europe, and on November 28, 2013 in Japan; for the PlayStation 4 on November 15, 2013 in North America, on November 22, 2013 in Europe, and on November 29, 2013 in Australia; for Microsoft Windows on November 19, 2013 in North America, on November 21, 2013 in Australia, and on November 22, 2013 in Europe; and for the Xbox One on November 22, 2013.', 'Ass4.jpg', 20);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `name`, `surname`) VALUES
('u1', 'p1', 'Nalinee', 'Inthamano'),
('u2', 'p2', 'Mintra', 'Deejai'),
('warin8674', '0987258674', 'warin', 'kongjan');

-- --------------------------------------------------------

--
-- Table structure for table `mansion`
--

CREATE TABLE `mansion` (
  `ms_id` int(11) NOT NULL,
  `ms_name` varchar(50) NOT NULL,
  `ms_price` int(11) NOT NULL,
  `ms_location` varchar(100) NOT NULL,
  `ms_phone` varchar(10) NOT NULL,
  `ms_limitedroom` varchar(30) NOT NULL,
  `ms_facilities` varchar(20) NOT NULL,
  `ms_type` varchar(20) NOT NULL,
  `ms_image` varchar(50) NOT NULL,
  `ms_review` varchar(10) NOT NULL,
  `ms_image2` varchar(50) NOT NULL,
  `ms_image3` varchar(50) NOT NULL,
  `ms_image4` varchar(50) NOT NULL,
  `ms_detail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mansion`
--

INSERT INTO `mansion` (`ms_id`, `ms_name`, `ms_price`, `ms_location`, `ms_phone`, `ms_limitedroom`, `ms_facilities`, `ms_type`, `ms_image`, `ms_review`, `ms_image2`, `ms_image3`, `ms_image4`, `ms_detail`) VALUES
(1, 'เจริญประดิษฐ์แมนชั่น', 4000, 'ซ.10 ถ.เจริญประดิษฐ์ รูสะมิแล เมืองปัตตานี ปัตตานี', '082-984332', 'ห้องพักรวม', 'Free WiFi', 'แมนชั่น', 'ms1.jpg', '4.0', 'ms1.JPG', 'ms2.JPG', 'ms3.JPG', 'สถานที่ใกล้เคียง\r\n- คลินิก อนุตรา \r\n- มหาวิทยาลัยสงขลานครินทร์ วิทยาเขตปัตตานี\r\n- โรงเรียนสาธิตมหาวิทยาลัยสงขลานครินทร์\r\n- โรงเรียนเดชะปัตตนยานุกูล\r\n- โรงเรียนเบญจมราชูทิศ จังหวัดปัตตานี\r\n- โรงแรมซีแอสปัตตานี'),
(2, 'เรนโบว์แมนชั่น', 3500, '115/3 ถนน โรงอ่าง ต.สะบารัง เทศบาลเมืองปัตตานี, จังหวัดปัตตานี', '095-443442', 'ห้องพักรวม', 'Free WiFi', 'แมนชี่น', 'ms2.jpg', '5.0', 'ms11.JPG', 'ms22.JPG', 'ms33.JPG', ' ย่างเท้าก้าวเข้าสู่ เรนโบว์ แมนชั่น เป็นอันสะดุดกับสีสันของแมนชั่นนี้ทันที ก็ด้วยสีที่สาดรอบแมนชั่นแบ่งเป็นสีสันดั่งรุ้งเจ็ดสี มองแล้วรู้สึกสดชื่น บวกกับบรรยากาศโดยรอบที่สร้างความชุ่มช่ำทั้งสระว่ายน้ำที่สะอาดตา ร้านอาหารบรรยากาศน่านั่ง ลมพัดเอื่อยๆเย็นสบาย มองแม่น้ำปัตตานีที่ไหลรินตัดขอบด้วยท้องฟ้าที่สดใส  โรแมนติกบวกกับความเก๋ไก๋เข้ากันมากทีเดียวค่ะ และที่นี่ยังมีจักรยานไว้ให้บริการแก่ผู้เข้าพักได้ปั่นทอดนั่งชมเมืองปัตตานีแบบฟรีๆ หรืออยากจะขยับร่างกายเบาๆก็มีฟิตเนสให้บริการด้วย'),
(3, 'สุมินตราแมนชั่น', 2500, 'ซ.- ถ.- รูสะมิแล เมืองปัตตานี ปัตตานี', '093-584399', 'ห้องพักรวม', 'Free WiFi', 'แมนชั่น', 'ms3.jpg', '3.0', 'ms111.JPG', 'ms222.JPG', 'ms333.JPG', 'ใกล้มหาวิทยาลัยสงขลานครินทร์ ปัตตานี\r\nใกล้ รร สาธิต ปัตตานี\r\nตั้งอยุ่ซอยร้านไทปัน');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`apm_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `condo`
--
ALTER TABLE `condo`
  ADD PRIMARY KEY (`condo_id`);

--
-- Indexes for table `dormitory`
--
ALTER TABLE `dormitory`
  ADD PRIMARY KEY (`dm_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `mansion`
--
ALTER TABLE `mansion`
  ADD PRIMARY KEY (`ms_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartment`
--
ALTER TABLE `apartment`
  MODIFY `apm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `condo`
--
ALTER TABLE `condo`
  MODIFY `condo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dormitory`
--
ALTER TABLE `dormitory`
  MODIFY `dm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `mansion`
--
ALTER TABLE `mansion`
  MODIFY `ms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

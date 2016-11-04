INSERT INTO `menu` (`title`, `icon`, `meta_keyword`, `meta_description`, `view`, `e_title`, `e_meta_keyword`, `e_meta_description`, `e_view`, `ind`, `active`) VALUES
('Thiết Bị', '', '', '', 'thiet-bi', 'Facilities', '', '', 'facilities', 5, 1);
UPDATE `menu` SET `ind` = '7' WHERE `menu`.`id` = 8;
UPDATE `menu` SET `ind` = '8' WHERE `menu`.`id` = 11;
UPDATE `menu` SET `ind` = '9' WHERE `menu`.`id` = 12;

--
-- Table structure for table `facility`
--

CREATE TABLE IF NOT EXISTS `facility` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `sum` text NOT NULL,
  `content` longtext NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `e_title` text NOT NULL,
  `e_sum` text NOT NULL,
  `e_content` longtext NOT NULL,
  `e_meta_keyword` text NOT NULL,
  `e_meta_description` text NOT NULL,
  `pId` int(11) DEFAULT NULL,
  `maps` text NOT NULL,
  `city` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `img` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  `ind` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pId` (`pId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id`, `title`, `sum`, `content`, `meta_keyword`, `meta_description`, `e_title`, `e_sum`, `e_content`, `e_meta_keyword`, `e_meta_description`, `pId`, `maps`, `city`, `district`, `img`, `active`, `ind`) VALUES
(1, 'XƯỞNG KHUÔN', 'XƯỞNG KHUÔN', '<p style="text-align:center"><img alt="" src="/file/ckfinder/userfiles/images/XUONG%20KHUON.png" style="height:334px; width:500px" /><br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-52-59%20CH.png" style="height:331px; width:500px" /><br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-53-13%20CH.png" style="height:335px; width:500px" /><br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-53-25%20CH.png" style="height:331px; width:500px" /><br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-53-37%20CH.png" style="height:332px; width:500px" /></p>\r\n', 'tin tuc, tin tức', 'Lorem ipsum dolor sit amet, ea eum exerci utroque liberavisse, vis in solet verear numquam, eam an soluta detracto. Eius aliquip nominati usu no, dico doctus convenire ut eam. ', '', '', '', '', '', 15, '<iframe src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=Kuningan,+Jakarta+Capital+Region,+Indonesia&aq=3&oq=kuningan+&sll=37.0625,-95.677068&sspn=37.410045,86.572266&ie=UTF8&hq=&hnear=Kuningan&t=m&z=14&ll=-6.238824,106.830177&output=embed"></iframe>', 3, 136, '147627968912-10-2016 5-53-13 CH.png', 1, 1),
(2, 'LÒ LUYỆN', 'LÒ LUYỆN', '<div style="text-align: center;"><img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-54-02%20CH.png" style="height:300px; width:500px" /><br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-54-16%20CH.png" style="height:306px; width:500px" /><br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-54-27%20CH.png" style="height:304px; width:500px" /><br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-54-36%20CH.png" style="height:301px; width:500px" /><br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-54-46%20CH.png" style="height:304px; width:500px" /></div>\r\n', 'tin tuc, tin tức', 'Lorem ipsum dolor sit amet, ea eum exerci utroque liberavisse, vis in solet verear numquam, eam an soluta detracto. Eius aliquip nominati usu no, dico doctus convenire ut eam. ', '', '', '', '', '', 15, '<iframe src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=Kuningan,+Jakarta+Capital+Region,+Indonesia&aq=3&oq=kuningan+&sll=37.0625,-95.677068&sspn=37.410045,86.572266&ie=UTF8&hq=&hnear=Kuningan&t=m&z=14&ll=-6.238824,106.830177&output=embed"></iframe>', 3, 136, '147627956712-10-2016 5-54-16 CH.png', 1, 0),
(3, 'ĐỊNH HÌNH', 'ĐỊNH HÌNH', '<div style="text-align: center;"><strong><img alt="" src="/file/ckfinder/userfiles/images/DINH%20HINH%201.png" style="height:310px; width:500px" /><br />\r\nĐỊNH HÌNH 1<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/DINH%20HINH%202.png" style="height:309px; width:500px" /><br />\r\nĐỊNH HÌNH 2<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/DINH%20HINH%203.png" style="height:309px; width:500px" /><br />\r\nĐỊNH HÌNH 3<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/DINH%20HINH%204.png" style="height:309px; width:500px" /><br />\r\nĐỊNH HÌNH 4<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/DINH%20HINH%205.png" style="height:306px; width:500px" /><br />\r\nĐỊNH HÌNH 5<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/DINH%20HINH%206.png" style="height:311px; width:500px" /><br />\r\nĐỊNH HÌNH&nbsp;6<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/DINH%20HINH%207.png" style="height:308px; width:500px" /><br />\r\nĐỊNH HÌNH&nbsp;7<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/DINH%20HINH%208.png" style="height:309px; width:500px" /><br />\r\nĐỊNH HÌNH&nbsp;8<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/DINH%20HINH%209.png" style="height:307px; width:500px" /><br />\r\nĐỊNH HÌNH&nbsp;9<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/DINH%20HINH%2010.png" style="height:310px; width:500px" /><br />\r\nĐỊNH HÌNH&nbsp;10<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/DINH%20HINH%2011.png" style="height:309px; width:500px" /><br />\r\nĐỊNH HÌNH&nbsp;11<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/DINH%20HINH%2012.png" style="height:302px; width:500px" /><br />\r\nĐỊNH HÌNH&nbsp;12<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/DINH%20HINH%2013.png" style="height:306px; width:500px" /><br />\r\nĐỊNH HÌNH 13</strong><br />\r\n&nbsp;</div>\r\n', '', '', '', '', '', '', '', NULL, '', 0, 0, '1476279888DINH HINH 1.png', 1, 0),
(4, 'KÉO NẮN', 'KÉO NẮN', '<div style="text-align: center;"><strong><img alt="" src="/file/ckfinder/userfiles/images/KEO%20NAN%201.png" style="height:302px; width:500px" /><br />\r\nKÉO NẮN<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/KEO%20NAN%202.png" style="height:304px; width:500px" /><br />\r\nKÉO NẮN<br />\r\n<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/KEO%20NAN%203.png" style="height:304px; width:500px" /><br />\r\nKÉO NẮN<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/KEO%20NAN%20THANG.png" style="height:305px; width:500px" /><br />\r\nKÉO NẮN<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/KHUON%20DINH%20HINH.png" style="height:304px; width:500px" /><br />\r\nKHUÔN ĐỊNH HÌNH<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/XU%20LY%20NHIET%20T4.png" style="height:743px; width:500px" /><br />\r\nXỬ LÝ NHIỆT T4<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/XU%20LY%20NHIET%20TO.png" style="height:303px; width:500px" /><br />\r\nXỬ LÝ NHIỆT T0</strong></div>\r\n', '', '', '', '', '', '', '', NULL, '', 0, 0, '1476280022KEO NAN THANG.png', 1, 1),
(5, 'MÁY PHUN CÁT', 'MÁY PHUN CÁT', '<div style="text-align: center;"><strong><img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-45-15%20CH.png" style="height:345px; width:500px" /><br />\r\nMÁY PHUN CÁT<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-45-33%20CH.png" style="height:310px; width:500px" /><br />\r\nMÁY PHUN CÁT<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-45-42%20CH.png" style="height:307px; width:500px" /><br />\r\nMÁY PHUN CÁT</strong><br />\r\n&nbsp;</div>\r\n', '', '', '', '', '', '', '', NULL, '', 0, 0, '147628010912-10-2016 5-45-42 CH.png', 1, 1),
(6, 'HỆ THỐNG XI MẠ', 'HỆ THỐNG XI MẠ', '<div style="text-align: center;"><strong><img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-43-28%20CH.png" style="height:281px; width:500px" /><br />\r\nHỆ THỐNG XI MẠ<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-44-03%20CH.png" style="height:335px; width:500px" /><br />\r\nHỆ THỐNG XI MẠ<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-44-15%20CH.png" style="height:310px; width:500px" /><br />\r\nHỆ THỐNG XI MẠ<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-44-25%20CH.png" style="height:307px; width:500px" /><br />\r\nHỆ THỐNG XI MẠ<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-44-35%20CH.png" style="height:307px; width:500px" /><br />\r\nHỆ THỐNG XI MẠ<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-44-46%20CH.png" style="height:304px; width:500px" /><br />\r\nHỆ THỐNG XI MẠ</strong></div>\r\n', '', '', '', '', '', '', '', NULL, '', 0, 0, '147628021312-10-2016 5-44-03 CH.png', 1, 1),
(7, 'SƠN TĨNH ĐIỆN', 'SƠN TĨNH ĐIỆN', '<div style="text-align: center;"><strong><img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-42-27%20CH.png" style="height:306px; width:500px" /><br />\r\nSƠN TĨNH ĐIỆN​<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-42-38%20CH.png" style="height:308px; width:500px" /><br />\r\nSƠN TĨNH ĐIỆN<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-42-52%20CH.png" style="height:306px; width:500px" /><br />\r\nSƠN TĨNH ĐIỆN<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-43-02%20CH.png" style="height:332px; width:500px" /><br />\r\nSƠN TĨNH ĐIỆN<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-43-13%20CH.png" style="height:310px; width:500px" /><br />\r\nSƠN TĨNH ĐIỆN</strong><br />\r\n<br />\r\n<strong><img alt="" src="/file/ckfinder/userfiles/images/SON%20TINH%20DIEN.png" style="height:306px; width:500px" /></strong></div>\r\n', '', '', '', '', '', '', '', NULL, '', 0, 0, '147628028712-10-2016 5-42-38 CH.png', 1, 1),
(8, 'GIA CÔNG CỬA', 'GIA CÔNG CỬA', '<div style="text-align: center;"><strong><img alt="" src="/file/ckfinder/userfiles/images/gia%20cong%20cua%20.png" style="height:304px; width:500px" /><br />\r\nGIA CÔNG CỬA<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/gia%20cong%20cua.png" style="height:305px; width:500px" /><br />\r\nGIA CÔNG CỬA<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/gia%20cong%20cua%20(2).png" style="height:310px; width:500px" /><br />\r\nGIA CÔNG CỬA<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/gia%20cong%20cua%20(3).png" style="height:310px; width:500px" /><br />\r\nGIA CÔNG CỬA<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/gia%20cong%20cua%20(4).png" style="height:310px; width:500px" /><br />\r\nGIA CÔNG CỬA</strong></div>\r\n', '', '', '', '', '', '', '', NULL, '', 0, 0, '1476280372gia cong cua .png', 1, 1),
(9, 'MÁY CẮT CNC', 'MÁY CẮT CNC', '<div style="text-align: center;"><img alt="" src="/file/ckfinder/userfiles/images/XUONG%20GIA%20CONG%20.png" style="height:332px; width:500px" /><br />\r\n<strong>XƯỞNG GIA CÔNG</strong><br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/CNC%202.png" style="height:333px; width:500px" /><br />\r\n<strong>MÁY&nbsp;CNC 1</strong><br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/CNC1.png" style="height:333px; width:500px" /><br />\r\n<strong>MÁY CNC 2</strong><br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/MAY%20CAT%20CNC%201.png" style="height:334px; width:500px" /><br />\r\n<strong>MÁY CẮT CNC<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/MAY%20CAT%20CNC.png" style="height:331px; width:500px" /><br />\r\nMÁY CẮT CNC<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/MAY%20CAT%20TU%20DONG.png" style="height:336px; width:500px" /><br />\r\nMÁY CẮT TỰ ĐỘNG<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/MAY%20DAP.png" style="height:309px; width:500px" /><br />\r\nMÁY DẬP<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/MAY%20KHOAN%20TU%20DONG.png" style="height:305px; width:500px" /><br />\r\nMÁY KHOAN TỰ ĐỘNG<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/MAY%20NAN%20THANG.png" style="height:331px; width:500px" /><br />\r\nMÁY NẮN THẲNG<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/MAY%20RUA%20SIEU%20AM.png" style="height:332px; width:500px" /><br />\r\nMÁY RỮA SIÊU ÂM<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/MAY%20BO%20GOC(1).png" style="height:333px; width:500px" /><br />\r\nMÁY BO GÓC<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/KIEM%20TRA%20CHAT%20LUONG%20SAN%20PHAM(1).png" style="height:333px; width:500px" /><br />\r\nKIỂM TRA CHẤT LƯỢNG SẢN PHẨM</strong><br />\r\n&nbsp;</div>\r\n', '', '', '', '', '', '', '', NULL, '', 0, 0, '1476280760XUONG GIA CONG .png', 1, 1),
(10, 'PHÒNG KỸ THUẬT CHẤT LƯỢNG', 'PHÒNG KỸ THUẬT CHẤT LƯỢNG', '<div style="text-align: center;"><strong><img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-30-18%20CH.png" style="height:332px; width:500px" /><br />\r\nPHÒNG QC<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-30-45%20CH.png" style="height:332px; width:500px" /><br />\r\nPHÒNG QC<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-31-00%20CH.png" style="height:333px; width:500px" /><br />\r\nPHÒNG QC<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-31-14%20CH.png" style="height:309px; width:500px" /><br />\r\nPHÒNG QC<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-31-28%20CH.png" style="height:311px; width:500px" /><br />\r\nPHÒNG QC<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-31-43%20CH.png" style="height:307px; width:500px" /><br />\r\nPHÒNG QC<br />\r\n<br />\r\n<img alt="" src="/file/ckfinder/userfiles/images/12-10-2016%205-31-58%20CH.png" style="height:305px; width:500px" /><br />\r\nPHÒNG QC</strong></div>\r\n', '', '', '', '', '', '', '', NULL, '', 0, 0, '147628153812-10-2016 5-31-00 CH.png', 1, 1);
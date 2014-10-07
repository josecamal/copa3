CREATE TABLE `members` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(80) CHARACTER SET utf8 NOT NULL,
  `password` varchar(70) CHARACTER SET utf8 NOT NULL,
  `mail` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;



INSERT INTO `members` (`id`, `username`, `password`, `mail`) VALUES
(16, 'yermista', 'bef708390dcc63bc9aaaadb4c5431152', ''),
(17, 'ed', 'b5f3729e5418905ad2b21ce186b1c01d', ''),
(18, 'Hispano', '731346ec824a4b304468c73eda270dcc', ''),
(19, 'Patria', '6f54b6221d83dc95780744b8cd26eb2b', ''),
(20, 'Guadalupe', '2b3582ef3785ff351ea3df5858231400', ''),
(21, 'Victoria', '842dae70d724e569252da847c7178baf', ''),
(22, 'Hidalgo', '90aa23053fa4a3156a1011fc134d3048', ''),
(23, 'Yermo', '019060c4bf3bbd4408e8e912f1109754', ''),
(24, 'Asilo', '0ad5b5f04b9492bb5dab810d56dbea24', ''),
(25, 'Frontera', 'ef239cd1df3d91d6866539bb61240063', ''),
(26, 'Stmaria', 'b2f21eb614ecd8cd6fda5374c00df488', ''),
(27, 'Mhidalgo', '15d75c5e0c9cf69ad4fb480edab18c35', '');

--
--Garma98 project 2019 Software Development Assignment
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` ( `username`, `email`, `password`) VALUES
('Garma98', 'example@email.com', '1234556');

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
 ADD PRIMARY KEY (`username`);

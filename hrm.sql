--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `pk_int_dep_id` int(11) NOT NULL,
  `vchr_department` varchar(50) NOT NULL,
  `date_created` date NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`pk_int_dep_id`, `vchr_department`, `date_created`, `date_modified`) VALUES
(1, 'Production', '2017-05-31', '2017-05-31'),
(2, 'Security', '2017-06-06', '2017-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE `tbl_designation` (
  `pk_int_designation_id` int(11) NOT NULL,
  `vchr_designation` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`pk_int_designation_id`, `vchr_designation`, `date_created`, `date_modified`) VALUES
(1, 'Developer', '2017-05-31 00:00:00', '2017-05-31'),
(2, 'Web Pen Tester', '2017-06-06 00:00:00', '2017-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `pk_int_emp_id` int(11) NOT NULL,
  `vchr_name` varchar(255) NOT NULL,
  `vchr_gender` varchar(10) NOT NULL,
  `date_dob` date NOT NULL,
  `vchr_email` varchar(50) NOT NULL,
  `vchr_nationality` varchar(50) NOT NULL,
  `vchr_mobile` varchar(12) NOT NULL,
  `vchr_address` varchar(255) NOT NULL,
  `vchr_profile_pic` varchar(255) NOT NULL,
  `vchr_password` varchar(255) DEFAULT NULL,
  `fk_int_designation_id` int(11) NOT NULL,
  `fk_int_dep_id` int(11) NOT NULL,
  `fk_int_user_type` int(11) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`pk_int_emp_id`, `vchr_name`, `vchr_gender`, `date_dob`, `vchr_email`, `vchr_nationality`, `vchr_mobile`, `vchr_address`, `vchr_profile_pic`, `vchr_password`, `fk_int_designation_id`, `fk_int_dep_id`, `fk_int_user_type`, `date_created`, `date_modified`) VALUES
(3, 'qqqqqqqqqqqqqqqqqq', 'Male', '2017-06-06', 'eee@ee.com', 'ef', '654321', 'rfvfd', 'upload\\qqqqqqqqqqqqqqqqqq964Capture.PNG', '637a81ed8e8217bb01c15c67c39b43b0ab4e20f1', 1, 1, 1, '2017-06-12 00:00:00', '2017-06-12'),
(4, 'qqqqqqqqqqqqqqqqqq', 'Male', '2017-06-06', 'ee', 'ef', '654321', 'rfvfd', 'upload\\qqqqqqqqqqqqqqqqqq122Capture.PNG', NULL, 1, 1, NULL, '2017-06-12 00:00:00', '2017-06-12'),
(5, 'qqqqqqqqqqqqqqqqqq', 'Male', '2017-06-06', 'ee', 'ef', '654321', 'rfvfd', 'upload\\qqqqqqqqqqqqqqqqqq858Capture.PNG', NULL, 1, 1, NULL, '2017-06-12 00:00:00', '2017-06-12'),
(6, 'Farsheel Rahman', 'Male', '1996-05-15', 'farsjhgfx@Gdw.dd', 'dsvdgsv', '456789', 'dvc dbn', 'upload\\Farsheel Rahman6871_ykbsBnohrwm83iZ_finalImage.png', NULL, 1, 1, NULL, '2017-06-15 00:00:00', '2017-06-15'),
(7, 'Farsheel Rahman', 'Male', '1996-05-15', 'farsjhgfx@Gdw.dd', 'dsvdgsv', '456789', 'dvc dbn', 'upload\\Farsheel Rahman3261_ykbsBnohrwm83iZ_finalImage.png', NULL, 1, 1, NULL, '2017-06-15 00:00:00', '2017-06-15'),
(8, 'Farsheel Rahman', 'Male', '1996-05-15', 'farsjhgfx@Gdw.dd', 'dsvdgsv', '456789', 'dvc dbn', 'upload\\Farsheel Rahman4311_ykbsBnohrwm83iZ_finalImage.png', NULL, 1, 1, NULL, '2017-06-15 00:00:00', '2017-06-15'),
(9, 'Farsheel Rahman', 'Male', '1996-05-15', 'farsjhgfx@Gdw.dd', 'dsvdgsv', '456789', 'dvc dbn', 'upload\\Farsheel Rahman631_ykbsBnohrwm83iZ_finalImage.png', NULL, 1, 1, 1, '2017-06-15 00:00:00', '2017-06-15'),
(10, 'Farsheel Rahman', 'Male', '1996-05-15', 'farsheelpk@gmail.com', 'Indian', '876543234', 'wertyuiok', 'upload\\Farsheel Rahman52Booking-100.png', '0b5e9e895c40ff874e568487a8462c456fcc02e2', 2, 2, 1, '2017-06-16 00:00:00', '2017-06-16'),
(11, 'Farsheel Rahman', 'Male', '1996-05-15', 'farsheelpkl@gmail.com', 'Indian', '876543234', 'wertyuiok', 'upload\\Farsheel Rahman318github.png', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, 2, 1, '2017-06-16 00:00:00', '2017-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_documents`
--

CREATE TABLE `tbl_employee_documents` (
  `pk_int_document_id` int(50) NOT NULL,
  `fk_int_emp_id` int(50) NOT NULL,
  `vchr_document_description` varchar(255) NOT NULL,
  `vchr_document_title` varchar(100) NOT NULL,
  `vchr_document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee_documents`
--

INSERT INTO `tbl_employee_documents` (`pk_int_document_id`, `fk_int_emp_id`, `vchr_document_description`, `vchr_document_title`, `vchr_document`) VALUES
(45, 5, 'vdbfnvm', 'vbfnbg', 'upload\\qqqqqqqqqqqqqqqqqq5880thlevel.pdf'),
(46, 5, 'fsdvgbh', 'vdgfbgg', 'upload\\qqqqqqqqqqqqqqqqqq4921_ykbsBnohrwm83iZ_finalImage.png'),
(50, 9, 'sx s', 'vsghxbn', 'upload\\Farsheel Rahman630thlevel.pdf'),
(51, 10, 'fgh', 'dfgh', 'upload\\Farsheel Rahman520thlevel.pdf'),
(56, 11, 'fgh', 'dfgh', 'upload\\Farsheel Rahman4950thlevel.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_experience`
--

CREATE TABLE `tbl_experience` (
  `pk_int_exp_id` int(11) NOT NULL,
  `fk_int_emp_id` int(50) NOT NULL,
  `vchr_company` varchar(255) NOT NULL,
  `vchr_period` varchar(255) NOT NULL,
  `vchr_designation` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_experience`
--

INSERT INTO `tbl_experience` (`pk_int_exp_id`, `fk_int_emp_id`, `vchr_company`, `vchr_period`, `vchr_designation`, `date_created`, `date_modified`) VALUES
(25, 4, 'eee', 'eee', 'efe', '2017-06-12 00:00:00', '2017-06-12'),
(42, 3, 'eee', 'eee', 'efe', '2017-06-12 00:00:00', '2017-06-12'),
(305, 5, 'eee', 'eee', 'efe', '2017-06-15 00:00:00', '2017-06-15'),
(306, 6, 'cgvb', ' cdb', 'vdg bnc', '2017-06-15 00:00:00', '2017-06-15'),
(307, 7, 'cgvb', ' cdb', 'vdg bnc', '2017-06-15 00:00:00', '2017-06-15'),
(308, 8, 'cgvb', ' cdb', 'vdg bnc', '2017-06-15 00:00:00', '2017-06-15'),
(312, 9, 'cgvb', ' cdb', 'vdg bnc', '2017-06-15 00:00:00', '2017-06-15'),
(313, 10, 'sdfghj', '2345', 'qwertyu', '2017-06-16 00:00:00', '2017-06-16'),
(318, 11, 'sdfghj', '2345', 'qwertyu', '2017-06-20 07:11:59', '2017-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

CREATE TABLE `tbl_leave` (
  `pk_int_leave_id` int(11) NOT NULL,
  `fk_int_emp_id` int(11) NOT NULL,
  `date_requested` date NOT NULL,
  `vchr_title` varchar(50) NOT NULL,
  `vchr_description` varchar(255) NOT NULL,
  `fk_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_leave`
--

INSERT INTO `tbl_leave` (`pk_int_leave_id`, `fk_int_emp_id`, `date_requested`, `vchr_title`, `vchr_description`, `fk_status`) VALUES
(1, 2, '2017-06-07', 'Medical', 'qwertyui', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave_status`
--

CREATE TABLE `tbl_leave_status` (
  `pk_int_status_id` int(11) NOT NULL,
  `vchr_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_leave_status`
--

INSERT INTO `tbl_leave_status` (`pk_int_status_id`, `vchr_status`) VALUES
(1, 'Applied'),
(2, 'Granted'),
(3, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payroll`
--

CREATE TABLE `tbl_payroll` (
  `pk_int_payroll_id` int(11) NOT NULL,
  `fk_int_emp_id` int(11) NOT NULL,
  `vchr_worked_hours` int(50) NOT NULL,
  `vchr_actual_hours` int(50) NOT NULL,
  `fk_int_payroll_month` int(11) NOT NULL,
  `fk_int_payroll_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payroll`
--

INSERT INTO `tbl_payroll` (`pk_int_payroll_id`, `fk_int_emp_id`, `vchr_worked_hours`, `vchr_actual_hours`, `fk_int_payroll_month`, `fk_int_payroll_year`) VALUES
(11, 1, 159, 240, 1, 2),
(12, 1, 230, 240, 2, 2),
(13, 1, 220, 240, 3, 1),
(14, 2, 240, 240, 1, 1),
(15, 2, 240, 240, 4, 2),
(16, 2, 100, 240, 6, 1),
(17, 1, 230, 240, 7, 2),
(18, 1, 230, 240, 7, 2),
(19, 1, 230, 240, 7, 2),
(20, 2, 200, 240, 2, 3),
(21, 2, 200, 240, 2, 3),
(22, 1, 180, 240, 7, 2),
(23, 2, 200, 240, 2, 2),
(24, 1, 120, 240, 12, 4),
(25, 1, 155, 240, 11, 4),
(26, 2, 158, 240, 11, 3),
(27, 1, 159, 240, 1, 4),
(28, 1, 188, 240, 2, 3),
(29, 1, 189, 240, 11, 4),
(30, 1, 200, 240, 11, 3),
(31, 2, 220, 240, 1, 1),
(32, 1, 200, 240, 1, 1),
(33, 1, 220, 240, 1, 1),
(34, 2, 200, 240, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payroll_details`
--

CREATE TABLE `tbl_payroll_details` (
  `pk_int_payroll_details_id` int(11) NOT NULL,
  `fk_salary_particular_id` int(11) NOT NULL,
  `fk_int_payroll_id` int(11) NOT NULL,
  `int_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payroll_details`
--

INSERT INTO `tbl_payroll_details` (`pk_int_payroll_details_id`, `fk_salary_particular_id`, `fk_int_payroll_id`, `int_amount`) VALUES
(23, 1, 11, 10000),
(24, 2, 11, 200),
(25, 3, 11, 500),
(26, 4, 11, 1000),
(27, 2, 12, 200),
(28, 3, 12, 500),
(29, 4, 12, 1000),
(30, 2, 13, 200),
(31, 3, 13, 500),
(32, 4, 13, 1000),
(33, 1, 14, 20000),
(34, 2, 14, 500),
(35, 3, 14, 250),
(36, 4, 14, 500),
(37, 1, 15, 20000),
(38, 2, 15, 500),
(39, 3, 15, 250),
(40, 4, 15, 500),
(41, 2, 16, 500),
(42, 3, 16, 250),
(43, 4, 16, 500),
(44, 1, 19, 10000),
(45, 2, 19, 200),
(46, 3, 19, 500),
(47, 4, 19, 1000),
(48, 1, 22, 7500),
(49, 2, 22, 200),
(50, 3, 22, 500),
(51, 4, 22, 1000),
(52, 1, 23, 16667),
(53, 2, 23, 500),
(54, 3, 23, 250),
(55, 4, 23, 500),
(56, 1, 24, 5000),
(57, 2, 24, 200),
(58, 3, 24, 500),
(59, 4, 24, 1000),
(60, 1, 25, 6458.3333333333),
(61, 2, 25, 200),
(62, 3, 25, 500),
(63, 4, 25, 1000),
(64, 1, 26, 12500),
(65, 2, 26, 500),
(66, 3, 26, 250),
(67, 4, 26, 500),
(68, 1, 27, 6625),
(69, 2, 27, 200),
(70, 3, 27, 500),
(71, 4, 27, 1000),
(72, 1, 28, 7833.3333333333),
(73, 2, 28, 200),
(74, 3, 28, 500),
(75, 4, 28, 1000),
(76, 1, 29, 7875),
(77, 2, 29, 200),
(78, 3, 29, 500),
(79, 4, 29, 1000),
(80, 1, 30, 8333.3333333333),
(81, 2, 30, 200),
(82, 3, 30, 500),
(83, 4, 30, 1000),
(84, 1, 31, 18333.333333333),
(85, 2, 31, 500),
(86, 3, 31, 250),
(87, 4, 31, 500),
(88, 1, 32, 8333.3333333333),
(89, 2, 32, 200),
(90, 3, 32, 500),
(91, 4, 32, 1000),
(92, 1, 33, 9166.6666666667),
(93, 2, 33, 200),
(94, 3, 33, 500),
(95, 4, 33, 1000),
(96, 1, 34, 16666.666666667),
(97, 2, 34, 500),
(98, 3, 34, 250),
(99, 4, 34, 500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payroll_month`
--

CREATE TABLE `tbl_payroll_month` (
  `pk_int_payroll_month_id` int(11) NOT NULL,
  `vchr_month` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payroll_month`
--

INSERT INTO `tbl_payroll_month` (`pk_int_payroll_month_id`, `vchr_month`) VALUES
(1, 'JANUARY'),
(2, 'FEBRUARY'),
(3, 'MARCH'),
(4, 'APRIL'),
(5, 'MAY'),
(6, 'JUNE'),
(7, 'JULY'),
(8, 'AUGUST'),
(9, 'SEPTEMBER'),
(10, 'OCTOBER'),
(11, 'NOVEMBER'),
(12, 'DECEMBER');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payroll_year`
--

CREATE TABLE `tbl_payroll_year` (
  `pk_int_payroll_year_id` int(11) NOT NULL,
  `year` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payroll_year`
--

INSERT INTO `tbl_payroll_year` (`pk_int_payroll_year_id`, `year`) VALUES
(1, 2001),
(2, 2002),
(3, 2003),
(4, 2004);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qualification`
--

CREATE TABLE `tbl_qualification` (
  `pk_int_qualification_id` int(11) NOT NULL,
  `fk_int_emp_id` int(11) NOT NULL,
  `vchr_qualification` varchar(255) NOT NULL,
  `vchr_institute` varchar(255) NOT NULL,
  `vchr_passout_year` varchar(10) NOT NULL,
  `float_percentage` float NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_qualification`
--

INSERT INTO `tbl_qualification` (`pk_int_qualification_id`, `fk_int_emp_id`, `vchr_qualification`, `vchr_institute`, `vchr_passout_year`, `float_percentage`, `date_created`, `date_modified`) VALUES
(25, 4, 'sss', 'ddd', 'e', 56, '2017-06-12 00:00:00', '2017-06-12'),
(42, 3, 'sss', 'ddd', 'e', 56, '2017-06-12 00:00:00', '2017-06-12'),
(305, 5, 'sss', 'ddd', 'e', 56, '2017-06-15 00:00:00', '2017-06-15'),
(306, 6, 'gvdcdgbn', 'bd cb', 'd c', 17, '2017-06-15 00:00:00', '2017-06-15'),
(307, 7, 'gvdcdgbn', 'bd cb', 'd c', 17, '2017-06-15 00:00:00', '2017-06-15'),
(308, 8, 'gvdcdgbn', 'bd cb', 'd c', 17, '2017-06-15 00:00:00', '2017-06-15'),
(312, 9, 'gvdcdgbn', 'bd cb', 'd c', 17, '2017-06-15 00:00:00', '2017-06-15'),
(313, 10, 'xcvbn', 'cvbn', '1234', 23, '2017-06-16 00:00:00', '2017-06-16'),
(318, 11, 'xcvbn', 'cvbn', '1234', 23, '2017-06-20 07:11:59', '2017-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salary_history`
--

CREATE TABLE `tbl_salary_history` (
  `pk_int_salary_history` int(50) NOT NULL,
  `fk_int_emp_id` int(50) NOT NULL,
  `salary_date` date NOT NULL,
  `int_salary` int(50) NOT NULL,
  `date_created` date NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salary_mapping`
--

CREATE TABLE `tbl_salary_mapping` (
  `pk_int_salary_id` int(11) NOT NULL,
  `fk_int_emp_id` int(11) DEFAULT NULL,
  `fk_int_particular_id` int(11) DEFAULT NULL,
  `int_value` int(11) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salary_mapping_history`
--

CREATE TABLE `tbl_salary_mapping_history` (
  `pk_int_history_id` int(11) NOT NULL,
  `fk_int_emp_id` int(11) NOT NULL,
  `fk_int_particular_id` int(11) NOT NULL,
  `int_value` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salary_particular`
--

CREATE TABLE `tbl_salary_particular` (
  `pk_int_particular_id` int(11) NOT NULL,
  `vchr_particular_name` varchar(255) DEFAULT NULL,
  `vchr_calculation` varchar(255) DEFAULT NULL,
  `vchr_type` varchar(255) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `pk_int_user_type_id` int(11) NOT NULL,
  `vchr_user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`pk_int_user_type_id`, `vchr_user_type`) VALUES
(1, 'admin'),
(2, 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`pk_int_dep_id`);

--
-- Indexes for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  ADD PRIMARY KEY (`pk_int_designation_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`pk_int_emp_id`),
  ADD KEY `fk_int_designation_id` (`fk_int_designation_id`),
  ADD KEY `tbl_employee_ibfk_2` (`fk_int_dep_id`),
  ADD KEY `fk_int_user_type` (`fk_int_user_type`),
  ADD KEY `fk_int_user_type_2` (`fk_int_user_type`),
  ADD KEY `fk_int_user_type_3` (`fk_int_user_type`),
  ADD KEY `fk_int_user_type_4` (`fk_int_user_type`);

--
-- Indexes for table `tbl_employee_documents`
--
ALTER TABLE `tbl_employee_documents`
  ADD PRIMARY KEY (`pk_int_document_id`),
  ADD KEY `tbl_employee_documents_ibfk_1` (`fk_int_emp_id`);

--
-- Indexes for table `tbl_experience`
--
ALTER TABLE `tbl_experience`
  ADD PRIMARY KEY (`pk_int_exp_id`),
  ADD KEY `tbl_experience_fk1` (`fk_int_emp_id`);

--
-- Indexes for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD PRIMARY KEY (`pk_int_leave_id`),
  ADD KEY `fk_status` (`fk_status`);

--
-- Indexes for table `tbl_leave_status`
--
ALTER TABLE `tbl_leave_status`
  ADD PRIMARY KEY (`pk_int_status_id`);

--
-- Indexes for table `tbl_payroll`
--
ALTER TABLE `tbl_payroll`
  ADD PRIMARY KEY (`pk_int_payroll_id`),
  ADD KEY `fk_int_emp_id` (`fk_int_emp_id`),
  ADD KEY `fk_int_payroll_month` (`fk_int_payroll_month`),
  ADD KEY `fk_int_payroll_year` (`fk_int_payroll_year`);

--
-- Indexes for table `tbl_payroll_details`
--
ALTER TABLE `tbl_payroll_details`
  ADD PRIMARY KEY (`pk_int_payroll_details_id`),
  ADD KEY `fk_salary_particular_id` (`fk_salary_particular_id`),
  ADD KEY `fk_int_payroll_id` (`fk_int_payroll_id`);

--
-- Indexes for table `tbl_payroll_month`
--
ALTER TABLE `tbl_payroll_month`
  ADD PRIMARY KEY (`pk_int_payroll_month_id`);

--
-- Indexes for table `tbl_payroll_year`
--
ALTER TABLE `tbl_payroll_year`
  ADD PRIMARY KEY (`pk_int_payroll_year_id`);

--
-- Indexes for table `tbl_qualification`
--
ALTER TABLE `tbl_qualification`
  ADD PRIMARY KEY (`pk_int_qualification_id`),
  ADD KEY `tbl_quali_fk1` (`fk_int_emp_id`);

--
-- Indexes for table `tbl_salary_history`
--
ALTER TABLE `tbl_salary_history`
  ADD PRIMARY KEY (`pk_int_salary_history`),
  ADD KEY `tbl_salary_fk1` (`fk_int_emp_id`);

--
-- Indexes for table `tbl_salary_mapping`
--
ALTER TABLE `tbl_salary_mapping`
  ADD PRIMARY KEY (`pk_int_salary_id`),
  ADD KEY `tbl_salary_map_fk1` (`fk_int_emp_id`),
  ADD KEY `tbl_salary_map_fk2` (`fk_int_particular_id`);

--
-- Indexes for table `tbl_salary_mapping_history`
--
ALTER TABLE `tbl_salary_mapping_history`
  ADD KEY `fk_int_particular_id` (`fk_int_particular_id`);

--
-- Indexes for table `tbl_salary_particular`
--
ALTER TABLE `tbl_salary_particular`
  ADD PRIMARY KEY (`pk_int_particular_id`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`pk_int_user_type_id`),
  ADD UNIQUE KEY `pk_int_user_type_id` (`pk_int_user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `pk_int_dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `pk_int_designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `pk_int_emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_employee_documents`
--
ALTER TABLE `tbl_employee_documents`
  MODIFY `pk_int_document_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `tbl_experience`
--
ALTER TABLE `tbl_experience`
  MODIFY `pk_int_exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;
--
-- AUTO_INCREMENT for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  MODIFY `pk_int_leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_payroll`
--
ALTER TABLE `tbl_payroll`
  MODIFY `pk_int_payroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_payroll_details`
--
ALTER TABLE `tbl_payroll_details`
  MODIFY `pk_int_payroll_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `tbl_payroll_month`
--
ALTER TABLE `tbl_payroll_month`
  MODIFY `pk_int_payroll_month_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_payroll_year`
--
ALTER TABLE `tbl_payroll_year`
  MODIFY `pk_int_payroll_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_qualification`
--
ALTER TABLE `tbl_qualification`
  MODIFY `pk_int_qualification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;
--
-- AUTO_INCREMENT for table `tbl_salary_history`
--
ALTER TABLE `tbl_salary_history`
  MODIFY `pk_int_salary_history` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_salary_mapping`
--
ALTER TABLE `tbl_salary_mapping`
  MODIFY `pk_int_salary_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_salary_particular`
--
ALTER TABLE `tbl_salary_particular`
  MODIFY `pk_int_particular_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `pk_int_user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD CONSTRAINT `tbl_employee_ibfk_1` FOREIGN KEY (`fk_int_designation_id`) REFERENCES `tbl_designation` (`pk_int_designation_id`),
  ADD CONSTRAINT `tbl_employee_ibfk_2` FOREIGN KEY (`fk_int_dep_id`) REFERENCES `tbl_department` (`pk_int_dep_id`),
  ADD CONSTRAINT `tbl_employee_ibfk_3` FOREIGN KEY (`fk_int_user_type`) REFERENCES `tbl_user_type` (`pk_int_user_type_id`) ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_employee_documents`
--
ALTER TABLE `tbl_employee_documents`
  ADD CONSTRAINT `tbl_employee_documents_ibfk_1` FOREIGN KEY (`fk_int_emp_id`) REFERENCES `tbl_employee` (`pk_int_emp_id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_experience`
--
ALTER TABLE `tbl_experience`
  ADD CONSTRAINT `tbl_experience_fk1` FOREIGN KEY (`fk_int_emp_id`) REFERENCES `tbl_employee` (`pk_int_emp_id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD CONSTRAINT `tbl_leave_ibfk_1` FOREIGN KEY (`fk_status`) REFERENCES `tbl_leave_status` (`pk_int_status_id`);

--
-- Constraints for table `tbl_payroll_details`
--
ALTER TABLE `tbl_payroll_details`
  ADD CONSTRAINT `tbl_payroll_details_ibfk_1` FOREIGN KEY (`fk_int_payroll_id`) REFERENCES `tbl_payroll` (`pk_int_payroll_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_payroll_details_ibfk_2` FOREIGN KEY (`fk_int_payroll_id`) REFERENCES `tbl_payroll` (`pk_int_payroll_id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_qualification`
--
ALTER TABLE `tbl_qualification`
  ADD CONSTRAINT `tbl_quali_fk1` FOREIGN KEY (`fk_int_emp_id`) REFERENCES `tbl_employee` (`pk_int_emp_id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_salary_history`
--
ALTER TABLE `tbl_salary_history`
  ADD CONSTRAINT `tbl_salary_fk1` FOREIGN KEY (`fk_int_emp_id`) REFERENCES `tbl_employee` (`pk_int_emp_id`);

--
-- Constraints for table `tbl_salary_mapping`
--
ALTER TABLE `tbl_salary_mapping`
  ADD CONSTRAINT `tbl_salary_map_fk1` FOREIGN KEY (`fk_int_emp_id`) REFERENCES `tbl_employee` (`pk_int_emp_id`),
  ADD CONSTRAINT `tbl_salary_map_fk2` FOREIGN KEY (`fk_int_particular_id`) REFERENCES `tbl_salary_particular` (`pk_int_particular_id`);

--
-- Constraints for table `tbl_salary_mapping_history`
--
ALTER TABLE `tbl_salary_mapping_history`
  ADD CONSTRAINT `tbl_salary_mapping_history_ibfk_1` FOREIGN KEY (`fk_int_particular_id`) REFERENCES `tbl_salary_particular` (`pk_int_particular_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

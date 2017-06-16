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
(1, 'CS', '2001-06-17', '2001-06-17'),
(2, 'mech', '2017-06-05', '2017-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE `tbl_designation` (
  `pk_int_designation_id` int(11) NOT NULL,
  `vchr_designation` varchar(50) NOT NULL,
  `date_created` date NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`pk_int_designation_id`, `vchr_designation`, `date_created`, `date_modified`) VALUES
(1, 'Developer', '2017-06-13', '2017-06-14'),
(2, 'Tester', '2017-06-13', '2017-06-27');

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
  `fk_int_designation_id` int(11) NOT NULL,
  `fk_int_dep_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `fk_int_user_type` int(30) NOT NULL,
  `date_modified` date NOT NULL,
  `vchr_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`pk_int_emp_id`, `vchr_name`, `vchr_gender`, `date_dob`, `vchr_email`, `vchr_nationality`, `vchr_mobile`, `vchr_address`, `vchr_profile_pic`, `fk_int_designation_id`, `fk_int_dep_id`, `date_created`, `fk_int_user_type`, `date_modified`, `vchr_password`) VALUES
(3, 'anu', 'female', '1995-10-11', 'anu@gmail.com', 'Indian', '9946548712', 'Calicut', '', 1, 1, '2017-06-05', 2, '2017-06-05', 'anu123'),
(4, 'Snj', 'F', '1996-02-29', 'snj@gmail.com', 'Indian', '8089258389', 'WestHill', '', 2, 1, '2017-06-05', 1, '2017-06-05', 'snj123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_documents`
--

CREATE TABLE `tbl_employee_documents` (
  `pk_int_document_id` int(50) NOT NULL,
  `fk_int_employee_id` int(50) NOT NULL,
  `vchr_document_description` int(50) NOT NULL,
  `vchr_document_title` int(50) NOT NULL,
  `vchr_document` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `date_created` date DEFAULT NULL,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 3, '2011-05-02', 'Hey', 'hjvjhjk', 1),
(2, 3, '2011-05-22', 'Hey', 'hjvjhjk', 1);

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
-- Table structure for table `tbl_qualification`
--

CREATE TABLE `tbl_qualification` (
  `pk_int_qualification_id` int(11) NOT NULL,
  `fk_int_emp_id` int(11) DEFAULT NULL,
  `vchr_school` varchar(255) DEFAULT NULL,
  `vchr_board` varchar(255) DEFAULT NULL,
  `date_school_passout` date DEFAULT NULL,
  `vchr_school_result` float DEFAULT NULL,
  `vchr_degree_level` varchar(255) DEFAULT NULL,
  `vchr_college` varchar(255) DEFAULT NULL,
  `date_college_passout` date DEFAULT NULL,
  `vchr_university` varchar(255) DEFAULT NULL,
  `float_college_result` float DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `pk_int_user_id` int(50) NOT NULL,
  `vchr_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`pk_int_user_id`, `vchr_type`) VALUES
(1, 'Admin'),
(2, 'Employee');

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
  ADD KEY `fk_user_type` (`fk_int_user_type`),
  ADD KEY `fk_user_type_2` (`fk_int_user_type`);

--
-- Indexes for table `tbl_employee_documents`
--
ALTER TABLE `tbl_employee_documents`
  ADD PRIMARY KEY (`pk_int_document_id`),
  ADD KEY `fk_int_employee_id` (`fk_int_employee_id`);

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
  ADD KEY `fk_int_emp_id` (`fk_int_emp_id`),
  ADD KEY `tbl_leave_ibfk_2` (`fk_status`);

--
-- Indexes for table `tbl_leave_status`
--
ALTER TABLE `tbl_leave_status`
  ADD PRIMARY KEY (`pk_int_status_id`);

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
-- Indexes for table `tbl_salary_particular`
--
ALTER TABLE `tbl_salary_particular`
  ADD PRIMARY KEY (`pk_int_particular_id`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`pk_int_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `pk_int_designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `pk_int_emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_employee_documents`
--
ALTER TABLE `tbl_employee_documents`
  MODIFY `pk_int_document_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_experience`
--
ALTER TABLE `tbl_experience`
  MODIFY `pk_int_exp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  MODIFY `pk_int_leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_leave_status`
--
ALTER TABLE `tbl_leave_status`
  MODIFY `pk_int_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_qualification`
--
ALTER TABLE `tbl_qualification`
  MODIFY `pk_int_qualification_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `pk_int_user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD CONSTRAINT `tbl_employee_ibfk_1` FOREIGN KEY (`fk_int_designation_id`) REFERENCES `tbl_designation` (`pk_int_designation_id`),
  ADD CONSTRAINT `tbl_employee_ibfk_2` FOREIGN KEY (`fk_int_dep_id`) REFERENCES `tbl_department` (`pk_int_dep_id`),
  ADD CONSTRAINT `tbl_employee_ibfk_3` FOREIGN KEY (`fk_int_user_type`) REFERENCES `tbl_user_type` (`pk_int_user_id`);

--
-- Constraints for table `tbl_employee_documents`
--
ALTER TABLE `tbl_employee_documents`
  ADD CONSTRAINT `tbl_employee_documents_ibfk_1` FOREIGN KEY (`fk_int_employee_id`) REFERENCES `tbl_employee` (`pk_int_emp_id`);

--
-- Constraints for table `tbl_experience`
--
ALTER TABLE `tbl_experience`
  ADD CONSTRAINT `tbl_experience_fk1` FOREIGN KEY (`fk_int_emp_id`) REFERENCES `tbl_employee` (`pk_int_emp_id`);

--
-- Constraints for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD CONSTRAINT `tbl_leave_ibfk_1` FOREIGN KEY (`fk_int_emp_id`) REFERENCES `tbl_employee` (`pk_int_emp_id`),
  ADD CONSTRAINT `tbl_leave_ibfk_2` FOREIGN KEY (`fk_status`) REFERENCES `tbl_leave_status` (`pk_int_status_id`);

--
-- Constraints for table `tbl_qualification`
--
ALTER TABLE `tbl_qualification`
  ADD CONSTRAINT `tbl_quali_fk1` FOREIGN KEY (`fk_int_emp_id`) REFERENCES `tbl_employee` (`pk_int_emp_id`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

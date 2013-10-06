CREATE TABLE `pds_phonebook` (
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `mobile_number` bigint(20) NOT NULL,
  `block_number` int(11) NOT NULL,
  PRIMARY KEY (`mobile_number`),
  KEY `block_number` (`block_number`),
  CONSTRAINT `phonebook_ibfk_1` FOREIGN KEY (`block_number`) REFERENCES `pds_record_set` (`block_number`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
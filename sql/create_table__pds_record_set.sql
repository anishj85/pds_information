CREATE TABLE `pds_record_set` (
  `block_number` int(11) NOT NULL,
  `allocation_month` date NOT NULL,
  `item_id` int not null,
  `item_quantity` float DEFAULT 0,
  PRIMARY KEY (`block_number`, `allocation_month`,`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
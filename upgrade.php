<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Untitled</title>
</head>

<body>
CREATE TABLE `banners` (
`id` INT( 5 ) NOT NULL AUTO_INCREMENT,
`username` VARCHAR( 15 ) NOT NULL ,
`url` VARCHAR( 50 ) NOT NULL ,
`urlto` VARCHAR( 50 ) NOT NULL ,
`clicks` MEDIUMINT( 5 ) NOT NULL ,
`views` MEDIUMINT( 5 ) NOT NULL ,
PRIMARY KEY ( `id` ) 
) TYPE = MYISAM COMMENT = 'Banners'

CREATE TABLE textads (
  id int(11) NOT NULL auto_increment,
  username varchar(15) NOT NULL default '',
  text varchar(150) NOT NULL default '',
  url varchar(50) NOT NULL default '',
  urlto varchar(50) NOT NULL default '',
  clicks mediumint(5) NOT NULL default '0',
  views mediumint(5) NOT NULL default '0',
  PRIMARY KEY  (id)
) TYPE = MYISAM 
Database random2 - Table textads running on localhost 
# phpMyAdmin mysql-Dump
# version 2.4.0
# http://www.phpmyadmin.net/ (download page)
#
# Host: localhost
# Generation Time: Oct 20, 2003 at 02:07 AM
# Server version: 4.0.12
# PHP Version: 4.3.1
# Database : `random2`

#
# Dumping data for table `textads`
#

INSERT INTO textads VALUES (1, 'admin', 'Create your Randomizer site in a few minutes,using TheRandomizer.Accepts more Payment Processors then ever!Rotate banners and text ads!', 'The Randomizer.net', 'http://www.therandomizer.net', 0, 0);

    
</body>
</html>

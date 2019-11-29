<?php
$con=mysqli_connect("localhost","root","","p");



$q="CREATE TABLE `reg` (
    `Username` varchar(15) NOT NULL,
    `First_Name` varchar(15) DEFAULT NULL,
    `Last_Name` varchar(15) DEFAULT NULL,
    `Password` varchar(15) DEFAULT NULL,
    `Phone` varchar(10) DEFAULT NULL,
    `Email` varchar(30) DEFAULT NULL,
    `Gender` varchar(6) DEFAULT NULL,
    PRIMARY KEY (`Username`),
    UNIQUE KEY `Email` (`Email`),
    UNIQUE KEY `Phone` (`Phone`)
   );";
   mysqli_query($con,$q);
$q="CREATE TABLE `pets` (
    `pet_id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(30) NOT NULL,
    `category` varchar(4) DEFAULT NULL,
    `breed` varchar(30) DEFAULT NULL,
    `vecsin` varchar(3) DEFAULT NULL,
    `price` int(6) DEFAULT NULL,
    `house_no` varchar(4) DEFAULT NULL,
    `street_no` varchar(4) DEFAULT NULL,
    `area` varchar(15) DEFAULT NULL,
    `city` varchar(10) DEFAULT NULL,
    `state` varchar(20) DEFAULT NULL,
    `zipcode` int(6) DEFAULT NULL,
    `age` int(3) DEFAULT NULL,
    `image` varchar(2000) NOT NULL,
    PRIMARY KEY (`pet_id`,`username`)
   ) ;";

mysqli_query($con,$q);
$q="CREATE TABLE `Breeds` (
    `breed` varchar(50) NOT NULL,
    `category` varchar(30) NOT NULL,
    PRIMARY KEY (`breed`)
   );";
    mysqli_query($con,$q);
$q=   "CREATE TABLE `cart` (
    `pet` int(11) NOT NULL,
    `username` varchar(30) NOT NULL,
    PRIMARY KEY (`pet`,`username`)
   );";
    mysqli_query($con,$q);

   	$q="CREATE TABLE `sell` (
    `pet_id` int(11) NOT NULL,
    `username` varchar(30) NOT NULL,
    PRIMARY KEY (`pet_id`)
   ) ;";

mysqli_query($con,$q);

$q="REATE TRIGGER `iis` AFTER INSERT ON `pets` FOR EACH ROW BEGIN INSERT INTO sell VALUES(new.pet_id,new.username); END";
mysqli_query($con,$q);
 
?>
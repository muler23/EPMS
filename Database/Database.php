<?php
$domain="localhost";
$dbuser="root";
$dbpass="";
$dbname="osuvs";
$x=0;
mysqli_connect($domain,$dbuser,$dbpass) or die(mysqli_error($con));
if(mysqli_select_db($dbname, $con))
$x=1;
else
$x=2;
if($x==2)
{
mysqli_query("create database osuvs") or die(mysqli_error($con));
		echo "<br>Database Successfully created";
}
else if($x==1)
{
//create account table
	mysql_query("create table account(userid int auto_increment,fname varchar(20),lname varchar(20),sex varchar(10),age int,username varchar(15) Not null,UNIQUE,role varchar(30),status int,photo LONGTEXT,primary key(username))") or die(mysql_error());
	echo "<br>account table created";
		  //create feedback
	mysql_query("create table feedback(id int auto_increment,fname varchar(20),lname varchar(20),email varchar(20),comment LONGTEXT,date Date,primary key(id))") or die(mysql_error());
	echo "<br>comment table created";
	//create Notice table
		mysql_query("create table notice(id int auto_increment,Title varchar(20),Dates DATE,Ex_Dates DATE,Content LONGTEXT,sender VARCHAR(20),primary key(id))") or die(mysql_error());
	echo "<br>Notice table created";
		//create Promotion table
		mysql_query("create table promotion(id int auto_increment,Dates DATE,Ex_Dates DATE,Title varchar(20),Content LONGTEXT,sender VARCHAR(20),primary key(id))") or die(mysql_error());
	echo "<br>promotion table created";
		//create Student data table
		mysql_query("create table student(sid VARCHAR(20),fname varchar(20),lname varchar(20),gender varchar(20),age int,collage varchar(20),department varchar(20),year varchar(20),cgpa varchar(20),phone varchar(20),date DATE,primary key(sid))") or die(mysql_error());
	echo "<br>Student table created";
			//create apply candidate table
		mysql_query("create table candidate(cid VARCHAR(20),fname varchar(20),lname varchar(20),gender varchar(20),age int,collage varchar(20),department varchar(20),year varchar(20),cgpa varchar(20),email varchar(20),photo LONGTEXT,date DATE,primary key(cid))") or die(mysql_error());
	echo "<br>Candidate table created";
				//create apply voter table
		mysql_query("create table voter(vid VARCHAR(20),fname varchar(20),lname varchar(20),gender varchar(20),age int,collage varchar(20),department varchar(20),year varchar(20),email varchar(20),date DATE,primary key(vid))") or die(mysql_error());
	echo "<br>Voter table created";
}
				//create Election Date table
		mysql_query("create table elecetion_date(id int auto_increment,startdate DATETIME,closedate DATETIME,primary key(id))") or die(mysql_error());
	echo "<br> Election Date table created";

?>
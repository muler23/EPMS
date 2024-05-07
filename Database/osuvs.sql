DROP TABLE IF EXISTS account;

CREATE TABLE `account` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(30) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `photo` longtext,
  `requestid` varchar(20) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

INSERT INTO account VALUES("1","getahin","yadalaw","Male","18","getahun","202cb962ac59075b964b07152d234b70","Main-Registrar","1","userphoto/10.jpg","");
INSERT INTO account VALUES("2","gizachew","erk","male","22","gizachew","202cb962ac59075b964b07152d234b70","Adminstrator","1","../userphoto/8.jpg","");
INSERT INTO account VALUES("3","Solomon","g/kedan","Male","25","solomon","202cb962ac59075b964b07152d234b70","SSD","1","userphoto/11.jpg","");
INSERT INTO account VALUES("16","Girmaw","Erkyihun","male","31","girma","202cb962ac59075b964b07152d234b70","Candidate","1","../userphoto/7.jpg","TER/4705/07");
INSERT INTO account VALUES("17","Tigist","Samuel","female","21","tigist","202cb962ac59075b964b07152d234b70","Voter","1","userphoto/1.jpg","AGR/4701/07");
INSERT INTO account VALUES("18","Ensmaw","Kahile","male","33","ensmaw","202cb962ac59075b964b07152d234b70","Voter","1","userphoto/6.jpg","TER/4703/07");
INSERT INTO account VALUES("19","samirawit","getachew","female","21","samri","202cb962ac59075b964b07152d234b70","Voter","1","userphoto/2.jpg","AGR/4703/07");
INSERT INTO account VALUES("20","Hirut","Meseret","male","21","hirut","202cb962ac59075b964b07152d234b70","Candidate","1","userphoto/1.jpg","AGR/4706/07");
INSERT INTO account VALUES("21","abebe","abeebe","Male","20","abebe","202cb962ac59075b964b07152d234b70","SSD","1","userphoto/7.jpg","");
INSERT INTO account VALUES("22","kebede","abebe","Male","19","kebede","202cb962ac59075b964b07152d234b70","Main-Registrar","1","userphoto/9.jpg","");
INSERT INTO account VALUES("23","Beniyam","Adamu","male","21","bini","e10adc3949ba59abbe56e057f20f883e","Candidate","1","userphoto/yila.jpg","AGR/4705/07");
INSERT INTO account VALUES("24","Walie","Sinishaw","male","44","walie","202cb962ac59075b964b07152d234b70","Voter","1","userphoto/15.jpg","TER/4704/07");


DROP TABLE IF EXISTS apply_date;

CREATE TABLE `apply_date` (
  `ApplyDateID` int(11) NOT NULL,
  `StartDate` datetime NOT NULL,
  `EndDate` datetime NOT NULL,
  PRIMARY KEY (`ApplyDateID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO apply_date VALUES("1","2018-05-31 01:00:00","2018-05-31 16:45:00");


DROP TABLE IF EXISTS attempt;

CREATE TABLE `attempt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS ballotstoretable;

CREATE TABLE `ballotstoretable` (
  `Voters_ID` varchar(20) NOT NULL,
  `Candidate_ID` varchar(20) NOT NULL,
  PRIMARY KEY (`Voters_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO ballotstoretable VALUES("17","16");


DROP TABLE IF EXISTS count;

CREATE TABLE `count` (
  `CID` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `collage` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `cgpa` float NOT NULL,
  `VOICE` int(11) NOT NULL,
  UNIQUE KEY `CID` (`CID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO count VALUES("16","Girmaw Erkyihun","31","male","Agricalture","plant","3rd","3.1","1");


DROP TABLE IF EXISTS discipline;

CREATE TABLE `discipline` (
  `Did` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `collage` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `disciplineType` varchar(200) NOT NULL,
  `sid` varchar(20) NOT NULL,
  PRIMARY KEY (`Did`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO discipline VALUES("17","Walie","Sinishaw","male","44","Technology","IT","4th","eating more than once by favouring","AGR/4702/07");


DROP TABLE IF EXISTS elecetion_date;

CREATE TABLE `elecetion_date` (
  `ElectionDateID` int(11) NOT NULL,
  `startdate` datetime NOT NULL,
  `closedate` datetime NOT NULL,
  PRIMARY KEY (`ElectionDateID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO elecetion_date VALUES("1","2018-05-28 02:01:00","2018-05-31 14:59:00");


DROP TABLE IF EXISTS examdate;

CREATE TABLE `examdate` (
  `closedate` datetime NOT NULL,
  PRIMARY KEY (`closedate`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO examdate VALUES("2018-05-31 17:58:00");


DROP TABLE IF EXISTS examresult;

CREATE TABLE `examresult` (
  `candidate_ID` varchar(20) NOT NULL,
  `TotalQuetions` int(11) NOT NULL,
  `correct` int(11) NOT NULL,
  `incorrect` int(11) NOT NULL,
  `Total` float NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`candidate_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO examresult VALUES("23","6","6","0","100","Pass");


DROP TABLE IF EXISTS feedback;

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(20) DEFAULT NULL,
  `comment` longtext,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS notice;

CREATE TABLE `notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(20) DEFAULT NULL,
  `Dates` date DEFAULT NULL,
  `Ex_Dates` date DEFAULT NULL,
  `myfile` longtext,
  `sender` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

INSERT INTO notice VALUES("19","for all dEBRE","2018-05-31","2018-06-01","          in 2010 student union voting system are started in day 24/09/2010 e.c.all student that partecpate            in election send acount request for admin from day 25/09/2010 e.c and that can be elect and to be elected             when we send account to admin act as a candidate the follwing points are included:-                     1. send request for admin act as a candidate comulative gpa greater that 3.0                     2.can not register in deciplane before election can started                     3. regular student that are curently learned in the university                     4. non GC student that are curently learned in the university           when we send request act admin act as voter the follwing poin are included:            1.regular student that are curently occure in the univeristry             2.GC and non GC student that are curently learned in the university","solomon");
INSERT INTO notice VALUES("20","for apply request to","2018-05-31","2018-06-01","                 all debre markose university student
\n          in 2010 student union voting system are started in day 24/09/2010 e.c.all student that partecpate 
\n          in election send acount request for admin from day 25/09/2010 e.c and that can be elect and to be elected 
\n           when we send account to admin act as a candidate the follwing points are included:-
\n                    1. send request for admin act as a candidate comulative gpa greater that 3.0
\n                    2.can not register in deciplane before election can started
\n                    3. regular student that are curently learned in the university
\n                    4. non GC student that are curently learned in the university
\n          when we send request act admin act as voter the follwing poin are included:
\n           1.regular student that are curently occure in the univeristry
\n            2.GC and non GC student that are curently learned in the university","solomon");
INSERT INTO notice VALUES("21","for all candidates t","2018-05-31","2018-06-01","                         all debre markose university student
\n          in 2010 student union voting system are started in day 27/09/2010 e.c.all  student that send 
\n         request act as a candidate that can  be elected online exam take on tuseday 25/09/2010 at local 
\n         time 8:00 all candidate student that learn in the university take online exam","solomon");


DROP TABLE IF EXISTS preguesstable;

CREATE TABLE `preguesstable` (
  `CID` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `collage` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `cgpa` float NOT NULL,
  `VOICE` int(11) NOT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS preguesstime;

CREATE TABLE `preguesstime` (
  `closedate` datetime NOT NULL,
  PRIMARY KEY (`closedate`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO preguesstime VALUES("2018-05-31 16:59:00");


DROP TABLE IF EXISTS promotion;

CREATE TABLE `promotion` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `Dates` date DEFAULT NULL,
  `Ex_Dates` date DEFAULT NULL,
  `Title` varchar(200) DEFAULT NULL,
  `Content` longtext,
  `userid` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO promotion VALUES("17","2018-05-21","2018-05-22","elect me","dasasdafafgs
\ndasgfsdgsgs
\nsadgsdgsg
\nsdgsg","14");


DROP TABLE IF EXISTS question;

CREATE TABLE `question` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `optiona` varchar(100) NOT NULL,
  `optionb` varchar(100) NOT NULL,
  `optionc` varchar(100) NOT NULL,
  `optiond` varchar(100) NOT NULL,
  `txtansw` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO question VALUES("1","In this text constitutionalism is considered a form of _________ rather than an activity involving mere textual interpretation.","politics as usual "," permanent revolution ","governance ","philosophy ","C","10");
INSERT INTO question VALUES("2","What branch makes the law?","Executive","Judicial ","Legislative","None","C","10");
INSERT INTO question VALUES("3","The skills needed to become good citizens include all of the following EXCEPT","communication skills.","decision-making skills.","personal interaction skills.","writing skills.","C","10");
INSERT INTO question VALUES("4","A teacher who begins the school year by involving students in establishing classroom rules is attempting to establish","a democratic classroom.","herself/himself as a valuable leader.","firm control of the class from the beginning.","student trust.","C","10");
INSERT INTO question VALUES("5","From the following which one is 
\nunique?","memory","cpu","key board","hard disk","C","8");
INSERT INTO question VALUES("6","WHAT WAS OUR COUNTRYS FIRST CONSTITUTION CALLED","THE ARTICLES OF CONFEDERATION","THE DECLARATION OF INDEPENDENCE","THE FEDERALIST PAPER","THE EMANCIPATION PROCLAMATION","C","8");


DROP TABLE IF EXISTS requesttable;

CREATE TABLE `requesttable` (
  `Student_ID` varchar(30) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `collage` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `year` varchar(10) NOT NULL,
  `cgpa` float NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` longtext NOT NULL,
  `requesttype` varchar(20) NOT NULL,
  `votestatus` varchar(20) NOT NULL,
  `photo` longtext NOT NULL,
  `approved` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`Student_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO requesttable VALUES("AGR/4701/07","Tigist","Samuel","female","21","Agricalture","plant","3rd","3.1","tigist","202cb962ac59075b964b07152d234b70","Candidate","unvote","userphoto/1.jpg","yes","2018-05-30 00:00:00");
INSERT INTO requesttable VALUES("AGR/4703/07","samirawit","getachew","female","21","Agricalture","agro Economics","3rd","2.67","samri","202cb962ac59075b964b07152d234b70","Voter","unvote","userphoto/2.jpg","yes","2018-05-30 08:21:05");
INSERT INTO requesttable VALUES("AGR/4705/07","Beniyam","Adamu","male","21","Agricalture","Animal","3rd","3.6","bini","e10adc3949ba59abbe56e057f20f883e","Candidate","unvote","userphoto/yila.jpg","yes","2018-05-31 00:00:00");
INSERT INTO requesttable VALUES("AGR/4706/07","Hirut","Meseret","male","21","Agricalture","plant","3rd","3","hirut","202cb962ac59075b964b07152d234b70","Voter","unvote","userphoto/1.jpg","yes","2018-05-30 09:17:10");
INSERT INTO requesttable VALUES("TER/4703/07","Ensmaw","Kahile","male","33","Technology","IT","4th","2.88","ensmaw","202cb962ac59075b964b07152d234b70","Voter","unvote","userphoto/6.jpg","yes","2018-05-30 07:51:36");
INSERT INTO requesttable VALUES("TER/4704/07","Walie","Sinishaw","male","44","Technology","IT","4th","2.9","walie","202cb962ac59075b964b07152d234b70","Voter","unvote","userphoto/15.jpg","yes","2018-05-31 11:42:52");
INSERT INTO requesttable VALUES("TER/4705/07","Girmaw","Erkyihun","male","31","Technology","IT","4th","3.7","girma","5dae429688af1c521ad87ac394192c6d","Candidate","unvote","userphoto/14.jpg","yes","2018-05-30 00:00:00");


DROP TABLE IF EXISTS requesttablepreguess;

CREATE TABLE `requesttablepreguess` (
  `Student_ID` varchar(30) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `collage` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `cgpa` float NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` longtext NOT NULL,
  `requesttype` varchar(20) NOT NULL,
  `votestatus` varchar(20) NOT NULL,
  `photo` longtext NOT NULL,
  `approved` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`Student_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO requesttablepreguess VALUES("AGR/4705/07","Beniyam","Adamu","male","21","Agricalture","Animal","3rd","3.6","bini","e10adc3949ba59abbe56e057f20f883e","Candidate","unvote","userphoto/yila.jpg","yes","2018-05-31 00:00:00");
INSERT INTO requesttablepreguess VALUES("AGR/4706/07","Hirut","Meseret","male","21","Agricalture","plant","3rd","3","hirut","202cb962ac59075b964b07152d234b70","Voter","unvote","userphoto/1.jpg","yes","2018-05-30 09:17:10");
INSERT INTO requesttablepreguess VALUES("TER/4704/07","Walie","Sinishaw","male","44","Technology","IT","4th","2.9","walie","202cb962ac59075b964b07152d234b70","Voter","unvote","userphoto/15.jpg","yes","2018-05-31 11:42:52");


DROP TABLE IF EXISTS ssdnotification;

CREATE TABLE `ssdnotification` (
  `notificationid` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `to` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`notificationid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO ssdnotification VALUES("6","Send Student Data","When you incorporate security features into your applications design  implementation  and deployment it helps to have a good understanding of how attackers think By thinking like attackers and being aware of their likely tactics  you can be more effective","Main-Registrar","read");
INSERT INTO ssdnotification VALUES("7","safsdfsfs","xcxbxbxbxbxcbxcbxcbxcbb","Main-Registrar","read");


DROP TABLE IF EXISTS student;

CREATE TABLE `student` (
  `sid` varchar(20) NOT NULL DEFAULT '',
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `collage` varchar(20) DEFAULT NULL,
  `department` varchar(20) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `cgpa` varchar(20) DEFAULT NULL,
  `program` varchar(100) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO student VALUES("AGR/4701/07","Tigist","Samuel","female","21","Agricalture","plant","3rd","3.1","regular");
INSERT INTO student VALUES("AGR/4702/07","Derege","adigo","male","21","Agricalture","animal","3rd","2.95","regular");
INSERT INTO student VALUES("AGR/4703/07","samirawit","getachew","female","21","Agricalture","agro Economics","3rd","2.67","regular");
INSERT INTO student VALUES("AGR/4704/07","Daniel","Gebrahewat","female","21","Agricalture","NARM","3rd","3.4","regular");
INSERT INTO student VALUES("AGR/4705/07","Beniyam","Adamu","male","21","Agricalture","Animal","3rd","3.6","regular");
INSERT INTO student VALUES("AGR/4706/07","Hirut","Meseret","male","21","Agricalture","plant","3rd","3","regular");
INSERT INTO student VALUES("AGR/4707/07","helen","Samuel","female","21","Agricalture","plant","3rd","2.95","regular");
INSERT INTO student VALUES("TER/4701/07","Gizachew","Erkyihun","male","22","Technology","IT","4th","2.95","extension");
INSERT INTO student VALUES("TER/4702/07","Melsaw","Dagnaw","male","21","Technology","IT","4th","3.3","regular");
INSERT INTO student VALUES("TER/4703/07","Ensmaw","Kahile","male","33","Technology","IT","4th","2.88","regular");
INSERT INTO student VALUES("TER/4704/07","Walie","Sinishaw","male","44","Technology","IT","4th","2.9","regular");
INSERT INTO student VALUES("TER/4705/07","Girmaw","Erkyihun","male","31","Technology","IT","4th","3.7","regular");
INSERT INTO student VALUES("TER/4706/07","Senayet","Samuel","female","25","Computational","Maths","3rd","2.95","regular");



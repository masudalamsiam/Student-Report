DROP DATABASE IF EXISTS examsdb;
CREATE DATABASE examsdb;
USE examsdb;

CREATE TABLE students (
	 id int,
	 gender varchar(10),
	 county varchar(25),
	 studentId varchar(10),
	 average int ,
	 age int ,
	PRIMARY KEY (id)
 );
 
LOAD DATA LOCAL INFILE '/Applications/MAMP/htdocs/15.Final.Inclass/Data/students-update.csv'
INTO TABLE students
FIELDS TERMINATED BY ','    
LINES TERMINATED BY '\n'
IGNORE 1 LINES;
 
 
select * from students
LIMIT 25;





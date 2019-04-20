<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('math.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "";
   }
   //用户表
   $sql =<<<EOF
   		CREATE TABLE USER
   		(
			USERNAME CHAR(20)PRIMARY KEY,
			PASSWORD CHAR(20) NOT NULL
   		);
EOF;

	$ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table USER created successfully\n";
   }
   
   //小数乘法表
   $sql =<<<EOF
   		CREATE TABLE DECIMALMULTIPLICATION
   		(
   			DM_ID INTEGER PRIMARY KEY AUTOINCREMENT,
			DM_CONTENT CHAR(50) NOT NULL,
			DEGREE CHAR(10) default "中等",
			DM_Z INTEGER NOT NULL
   		);
EOF;

	$ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table DECIMALMULTIPLICATION created successfully\n";
   }
   
   //小数除法表
   $sql =<<<EOF
   		CREATE TABLE DECIMALDIVISION
   		(
   			DD_ID INTEGER PRIMARY KEY AUTOINCREMENT,
			DD_CONTENT CHAR(50) NOT NULL,
			DEGREE CHAR(10) default "中等",
			DD_Z INTEGER NOT NULL
   		);
EOF;

	$ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table DECIMALDIVISION created successfully\n";
   }
   //简算题表
   $sql =<<<EOF
   		CREATE TABLE SIMPLIFIEDCALCULATION
   		(
   			SC_ID INTEGER PRIMARY KEY AUTOINCREMENT,
			SC_CONTENT CHAR(100) NOT NULL,
			DEGREE CHAR(10) default "中等",
			SC_Z INTEGER NOT NULL
   		);
EOF;

	$ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table SIMPLIFIEDCALCULATION created successfully\n";
   }
   //四则运算表
   $sql =<<<EOF
   		CREATE TABLE FOURHYBRID
   		(
   			FH_ID INTEGER PRIMARY KEY AUTOINCREMENT,
			FH_CONTENT CHAR(100) NOT NULL,
			DEGREE CHAR(10) default "中等",
			FH_Z INTEGER NOT NULL
   		);
EOF;

	$ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table FOURHYBRID created successfully\n";
   }
   //解方程表
   $sql =<<<EOF
   		CREATE TABLE EQUATIONS
   		(
   			E_ID INTEGER PRIMARY KEY AUTOINCREMENT,
			E_CONTENT CHAR(100) NOT NULL,
			DEGREE CHAR(10) default "中等",
			E_Z INTEGER NOT NULL
   		);
EOF;

	$ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table EQUATIONS created successfully\n";
   }
?>
<?php
	//CONNECTION to database
	try{
		$pdo = new PDO("mysql:host=localhost;dbname=users_info", "root", "");
		
		// Set the PDO error mode to exception
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		// Print host information
		//echo "Connect Successfully. Host info: " . 
		$pdo->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
		} catch(PDOException $e){
			die("ERROR: Could not connect. " . $e->getMessage());
		}
	
	// DATABASE CREATION if not exists
	try{
		$sql = "CREATE DATABASE IF NOT EXISTS users_info";
		$pdo->exec($sql);
		//echo "Database created successfully";
	} catch(PDOException $e){
		die("ERROR: Could not able to execute $sql. " . $e->getMessage());
	}
	
	// TABLE CREATION if not exist
	try{
		$sql = "CREATE TABLE IF NOT EXISTS contact_form(
			id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			first_name VARCHAR(30) NOT NULL,
			last_name VARCHAR(30) NOT NULL,
			phone VARCHAR(30) NOT NULL,
			email VARCHAR(70) NOT NULL UNIQUE,
			interest VARCHAR(30),
			message TEXT)";    
		$pdo->exec($sql);
		//echo "Table created successfully.";
	} catch(PDOException $e){
		die("ERROR: Could not able to execute $sql. " . $e->getMessage());
	}		
?>
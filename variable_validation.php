<?php
	//Variable declaration to Store input
	$fName = $lName = $phone = $email = $interest = $message = "";
	
	//Variable declaration to check and store Error Message
	$fNameErr = $lNameErr = $phoneErr = $emailErr = $interestErr = $mssgErr = "";
	
	//Variable declaration for Succes message
	$succes = "";
	
	//Additional field validation for not empty
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty($_POST["fName"])){
			$fNameErr = "First name is required";
		} else {
			$fName = test_input($_POST["fName"]);
		}
		if(empty($_POST["lName"])){
			$lNameErr = "Last name is required";
		} else {
			$lName = test_input($_POST["lName"]);
		}
		if(empty($_POST["phone"])){
			$phoneErr = "Phone number is required";
		} else {
			$phone = test_input($_POST["phone"]);
			//Validates that phone input are numbers from 0-9, it must be 10 digits
			if(!preg_match("/^[0-9]{10}$/", $phone)){ 
				$phoneErr = "Phone number not valid";
			}
		}
		if(empty($_POST["email"])){
			$emailErr = "Email address is required";
		} else {
			$email = test_input($_POST["email"]);
			//Validates that email fields contains "@" and ".", also this is validated by the html attribute "type="email""
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$emailErr = "Invalid email format";
			}
		}
		if(empty($_POST["reason"])){
			//$interestErr = "Interest is required";
		} else {
			$interest = test_input($_POST["reason"]);
		}
		if(empty($_POST["message"])){
			//$mssgErr = "Message is empty";
		} else {
			$message = test_input($_POST["message"]);
		}
		
		//Data Validation for submition to database
		if($fNameErr =="" && $lNameErr == "" && $phoneErr == "" && $emailErr == ""){
			// DATA INSERT TO DATABASE
			try{
				$sql = "INSERT INTO contact_form (first_name, last_name, phone, email, interest, message) VALUES ('$fName', '$lName', $phone, '$email', '$interest', '$message')";    //$fName, $lName, $phone, $email - 'John', 'Doe', '5615554444', 'john@doe.com'
				$pdo->exec($sql);
				$succes = "Form submitted successfully.";
			} catch(PDOException $e){
				die("ERROR: Could not able to execute $sql. " . $e->getMessage());
			}
		}
		
	}
	
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>
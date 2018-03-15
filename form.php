<!DOCTPYE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="author" content="Martin Naparstek">
		<meta name="description" content="Cre8tive Devs, Software, Security, Databases, Marketing">
		<title>Enquiry/Contact Form</title>
		
		<script>	
			//Function to validate that there is input in Name fields
			function ffield(){
				var field = document.forms["form1"]["fName"].value;
				if(field != ''){
					document.getElementById("fCheck").innerHTML = "✓";
					document.getElementById("fCheck").style.color = "green";
				}
			}
			function lfield(){
				var field = document.forms["form1"]["lName"].value;
				if(field != ''){
					document.getElementById("lCheck").innerHTML = "✓";
					document.getElementById("lCheck").style.color = "green";
				} 
			}
		</script>
		<style>
			body {
				margin: auto;
				width: 50%;
				padding: 10px;
			}
			img {
				padding-left: 20px;
			}
			.contact{
				background: linear-gradient(to left, #7b4397, #dc2430);
				text-align: center;
				margin-bottom: 15px;
			}
			h2 { 
				color: white;
				align: center;
			}
			form {
				background-color: white;
				text-align: left;
				margin-right: 15px;
				margin-left: 15px;
				
			}
			#fCheck, #lCheck, #pCheck, #eCheck  {color: #FF0000;}
		</style>
	</head>
	<body>
	<?php include "database.php" ?>
	<?php include "variable_validation.php" ?>
		
		<img src="assets/logo-2.png" alt="Creative Devs logo" align="center"/>
		<div class="contact">
			<h2>Enquiry/Contact Form</h2>
			
			<!--Contact Form-->
			<form name="form1" method="post" action="form.php">
				
				<!--User info-->
				<span id="fName">*First Name:</span> 
				<input type="text" name="fName" placeholder="First Name" onblur="ffield()">
				<span id="fCheck"><?php echo $fNameErr; ?></span><br/>
				
				<span id="lName">*Last Name:</span> 
				<input type="text" name="lName" placeholder="Last Name" onblur="lfield()">
				<span id="lCheck"><?php echo $lNameErr; ?></span><br/>
				
				<span id="phone">*Phone Number</span> 
				<input type="text" name="phone" placeholder="(___)-___-____" onblur="pfield()">
				<span id="pCheck"><?php echo $phoneErr; ?></span><br/>
				
				<span id="email">*E-mail</span> 
				<input type="email" name="email" placeholder="name@domain.com" onblur="evalid()">
				<span id="eCheck"><?php echo $emailErr; ?></span><br/>
				
				<!--Service Interested-->
				<p id="service">I'm interested in:</p>
				<select name="reason">
					<option value="Software">Software Development</option>
					<option value="Security">Security Implementation</option>
					<option value="Database">Database Design</option>
					<option value="Marketing">Marketing</option>
				</select>
				
				<!--Message-->
				<p>Message:</p><textarea name="message" rows="5" cols="35" placeholder="Type here..."></textarea>
				<br/>
				<br/>
				<input type="submit" name="submit" value="Submit" /><?php echo $succes ?>
				<br/>   
			</form>
			<br/><br/>
		</div>
	</body>
	<footer>
		<p>By Martin Naparstek</p>
	</footer>
</html>
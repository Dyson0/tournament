<?php
	require 'config.php';

	$dbConnection->query("CREATE TABLE IF NOT EXISTS payments(id INT(11) NOT NULL AUTO_INCREMENT, PRIMARY KEY(id), name VARCHAR(30)NOT NULL, phone_number VARCHAR(15), tx_ref VARCHAR(50) NOT NULL, price DOUBLE(10,2), plan_id INT(11)NOT NULL, FOREIGN KEY(plan_id) REFERENCES tickets(id), status VARCHAR(10))");


	if(isset($_POST['name'])){
		$name = $_POST['name'];
		$phone_number= $_POST['phone_number'];
		$tx_ref= $_POST['tx_ref'];
		$amount= $_POST['amount'];
		$plan_id = $_POST['plan_id'];
		$status= "pending";



		$dbConnection->query("INSERT INTO TABLE payments(name,phone_number,tx_ref,price,plan_id,status)VALUES ($name ,$phone_number,$tx_ref,$amount,$plan_id ,$status)");
	}

	?>

<!DOCTYPE html>
<html>
	<head>
		<title>Dyson</title>
	</head>
	<body>
		<form method="POST">
			<label  for ="name">NAME</label>
			<input type="text" id = "name" name="name"><br>
			<label for ="phone_number">Phone Number</label>
			<input type="text" id ="phone_number" name="phone_number"><br>
			
			<input type="text" id="tx_ref" name="tx_ref" hidden ="true">
			
			<input type="text" id ="amount" name="amount" hidden="true">
			
			<input type="text" id  ="plan_id" name="plan_id" hidden="true">
			<label for ="email">EMAIL</label>
			<input type="text" id ="email" name="email"><br>
			
			<input type="text" id="status" name="status" hidden="true">
			<hr>
			<button type="submit" class="btn-btn success">pay</button>



			
		</form>

	</body>
</html>

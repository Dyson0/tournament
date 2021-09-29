<?php
	require 'config.php';

	$createQuery = "CREATE TABLE IF NOT EXISTS payments(
		id INT(11) NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(id),
		name VARCHAR(30) NOT NULL, 
		phone_number VARCHAR(15), 
		tx_ref VARCHAR(50) NOT NULL, 
		price DOUBLE(10,2), 
		plan_id INT(11)NOT NULL, 
		FOREIGN KEY(plan_id) REFERENCES tickets(id), 
		status VARCHAR(10))";

	//  echo $createQuery;

	$dbConnection->query(
		$createQuery
	);

	if(isset($_POST['name'])){
		$name         = $_POST['name'];
		$phone_number = $_POST['phone_number'];
		$tx_ref       = $_POST['tx_ref'];
		$amount       = $_POST['amount'];
		$plan_id      = $_POST['plan_id'];
		$status       = "pending";

		$insertQuery = "INSERT INTO payments(
				name, phone_number, tx_ref, price, plan_id, status
			)VALUES (
				'$name' ,'$phone_number', '$tx_ref', '$amount', '$plan_id', '$status'
			)";
		echo  $insertQuery;

		$dbConnection->query($insertQuery);
	
	}

?>


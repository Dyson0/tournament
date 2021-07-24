<?php
require 'config.php';
require 'africatalking/AfricasTalkingGateway.php';

$status = $_GET['status'];
$tx_ref = $_GET['tx_ref'];
$readPayment = $dbConnection->query("SELECT * FROM payments WHERE tx_ref = '$tx_ref' AND status = '$status' ");
$results = $readPayment->fetch_assoc();
$phone_number = $results['phone_number'];
$name = $results['name'];
$seatNumber = "VIP-4";


if($status == "successful"){
	$dbConnection->query("UPDATE payments SET status = '$status' WHERE tx_ref = '$tx_ref' ");
	$message = "Hello ". $name."thank you for paying for the tournament,your seat number is ".$seatNumber.",the match starts at 4:00pm at kitende stadium on 1stMay2021";

	$apikey = "2844ee85678488c4cb8a116e50ff6d9362e2cfe88c95488f3269ab9410a047eb";

	$gateway =  new AfricasTalkingGateway("sandbox",$apikey);

	$gateway->sendMessage($phone_number,$message);

	header("location: ../thank_you.php?message=thank you for paying");
}else{
	header("location: ../thank_you.php?message=your payment failed");
}
?>

<!DOCTYPE html>
<?php
require 'config.php'; 
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Buy a ticket</title>
	<link rel ="stylesheet" type="text/css"href="africatalking/css/app.css">
</head>
<body>
	<span id="app"></span>
	<?php
	$id = $_GET['id'];
	$tickets = "SELECT * FROM tickets WHERE id = $id";
	$records = $dbConnection->query($tickets);
	foreach ($records as $key => $value){
	$id = $value['id'];
	$name = $value['name'];
	$price = $value['price'];
}

	?>
	<main class="py-4">
		<div class="container">
			
		</div>
		<h1>Football ticket for (Uganda cranes Vs Harampe stars)</h1><br>
		<h4> <?php echo $name?> @ <?php echo $price?> </h4>
		<hr>

		<div class="row">
			<div class="col-md-6 col-sm-12">
				<img src="images/airtel.jfif"width="100px"height="100px">
				<img src="images/mtn.jfif"width="100px"height="100px">
				<img src="images/credit.jfif"width="100px"height="100px">
				<hr>
				
			</div>
			
		</div>
		
		<form>
			<script src="https://checkout.flutterwave.com/v3.js"></script>
			<label>Name</label>
			<input type="text" id="name" class="form-control"><br>

			<input type="hidden" id="ticket_id" value="<?php echo $id?>">

			<input type="hidden" id="amount" value="<?php echo $price?>">

			<label>Phone number</label>
			<input type="text" id="phone number" class="form-control"><br>

			<label>Email</label>
			<input type="text" id="email" class="form-control">
			<hr>
			<button type="button" id ="make_payment" class= "btn btn-info" >pay now</button>
		</form>
				1. save the data but set it pending[status]<br>
				2. launch the payment widget<br>
				3. After the payment return the status and verify the transaction<br>
				4. send the sms to the customer<br> 
		</div>	
	</main>

	<script src="africatalking/js/app.js"></script>
	<script >
		$(document).ready (function(){
			$("#make_payment").click(function(){
				$.ajax({
					type: "POST",
					url: "initiate_payment.php",
				data: {
					tx_ref: "<?php echo "football-".time()?>",
					plan_id: $("#ticket_id").val(),
					amount: $("#amount").val(),
					name: $("#name").val(),
					phone_number: $("#phone_number").val(),

				},
					success: function(tx_ref){
						console.log(tx_ref);
						makePayment(tx_ref);

					}
				});
			})

		})

		function makePayment(tx_ref){
			flutterwaveCheckout({
				public_key:"FLWPUBK-fdf258473843df0a0cfdc450f5669a7a-X",
				tx_ref: tx_ref,
				amount:$("#amount").val(),
				currency: "UGX",
				country: "UG",
				payment_options: "card,mobilemoneyuganda",
				redirect_url:
				"verify_payment.php",
				meta: {

				},
				customer: {
					email: $("#email").val(),
					phone_number: $("#phone_number").val(),
					name: $("#name").val(),

				},
				callback: function(data){
					console.log(data);
				},
				onclose: function(){
					//close modal
				},
				customizations: {
					title: "Football ticket for (Uganda cranes Vs Harampe stars)",
					description: "payment for the tournament",
					logo: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ00-_dAxRwXE1aQ02JxCHIMXkJZmodwIdgWA&usqp=CAU",
				},
			})
			}
		


	</script>
</body>
</html>
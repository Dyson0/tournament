<!DOCTYPE html>
<?php
require 'config.php'; 
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Buy a ticket</title>
	<link rel ="stylesheet" type="text/css"href="../css/app.css">
</head>
<body>
	<?php
	$id = $_GET['id'];
	$tickets = "SELECT * FROM tickets WHERE id = $id";
	$records = $dbConnection->query($tickets);

	?>
	<main class="py-4">
		<div class="container">
			
		</div>
		<h1>Football ticket for (Uganda cranes Vs Harampe stars)</h1><br>
		<h4> <?php echo $name?>@<?php echo $price?> </h4>
		<hr>

		

		
	</main>

</body>
</html>
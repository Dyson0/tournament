<?php
if (isset($_POST['name'])){

		$name = $_POST['name'];
		$age = $_POST['age'];
		$like = $_POST['like'];
		$friend = $_POST['friend'];
		echo 'My name is ' . $name . " and iam " . $age ." i like". $like;
	}
	
?>

<html>
	<form method="POST">
		<label for="name">
			Name
		</label>
		<input id="name" name="name" /><br>
		<label for="age">Age</label>
		<input id="age" name="age"><br>
		<label id="like">like</label>
		<input id="like" name="like"><br>
		<label id="friend">friend</label>
		<input id="friend" name="friend">
		<hr>
		<button type="submit">
			Submit
		</button>
	</form>
</html>
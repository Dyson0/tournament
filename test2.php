<?php
if(isset($_POST['course_id'])){
	$course_id = $_POST['course_id'];
	$course_name = $_POST['course_name'];
	$course_instructor = $_POST['course_instructor'];
	echo 'course_id is ' .  $course_id.  " course_name is " . $course_name.  " and course_instructor is " . $course_instructor;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>COURSE</title>

</head>
<body>
	<h2>COURSE</h2><hr>
	<form method="POST">
		<label for="course_id">Course Id</label>
		<input type="text" id="course_id" name="course_id"><br>
		<label for = "course_name">Course Name</label>
		<input type="text" id = "course_name" name="course_name"><br>
		<label for="course_instructor">Course Instructor</label>
		<input type="text" id="course_instructor" name="course_instructor">
		<hr>
		<button type="submit">submit</button>
	</form>
</body>
</html>
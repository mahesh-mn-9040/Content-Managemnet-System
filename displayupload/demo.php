<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<h1 class="text-white bg-dark text-center">
		Register
	</h1>
	<form action="upload.php" method="post" enctype="multipart/form-data">	
		<label for="user">Username</label>

		<input type="text" name="username" id="user" class="form-control">
        		<label for="user">PIc:</label>

		<input type="file" name="file" id="file" class="form-control">
		 <input type="submit" name="submit" value="submit">


	</form>
</div>
</body>
</html>
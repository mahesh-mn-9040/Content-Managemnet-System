

 <!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body>
<div class="container">
	<h1 class="text-white bg-dark text-center">
		Register
	</h1>

	<div class="table-responsive">
		<table border="2" class="table table-bordered table-striped table-hover">
		<thead>
			<th>Id</th>
			<th>user</th>
			<th>pic</th>
		</thead>
	<tbody>
    <?php 
  $con = mysqli_connect('localhost','root');
  mysqli_select_db($con,'displayupload');

  if(isset($_POST['submit'])){
  	$username = $_POST['username'];
  	$files = $_FILES['file'];
  	$filename= $files['name'];
    $fileerror = $files['error'];
    $filetmp = $files['tmp_name'];
    $fileext = explode('.', $filename);
    $filecheck = strtolower(end($fileext));
    $fileextstored = array('png','jpg','jpeg');

    if(in_array($filecheck, $fileextstored)){
    	$destinationfile = 'uploads/'.$filename;
    	move_uploaded_file($filetmp, $destinationfile);
    	$q = "INSERT INTO `imgupload`(`username`,`image`) VALUES('$username','$destinationfile')";
    	$query = mysqli_query($con,$q);
    	$displayquery = "SELECT * FROM imgupload";
    	$querydisplay= mysqli_query($con,$displayquery);
    	while ($result = mysqli_fetch_array($querydisplay)) {
    		?>
    		<tr>
    			<td><?php $result['id']; ?></td>
    			<td><?php $result['username']; ?></td>
    			<td><img src="<?php $result['image']; ?>" height="100px" width"100px"></td>
    		</tr>
    	
        <?php
    
       }
    }

  }  
 ?>
	</tbody>	
	</table>
	</div>
</div>
</body>
</html>
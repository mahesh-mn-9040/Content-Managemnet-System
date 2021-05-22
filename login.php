<?php include 'connection.php'; ?>
<?php
if(isset($_POST['login']))
{
    $username= $_POST['username'];
   $password = $_POST['password'];
}
  $username = mysqli_real_escape_string($con,$username);
  $password = mysqli_real_escape_string($con,$password);

  $query = "SELECT * FROM users where username = '{$username}'";
  $select_user_query = mysqli_query($con,$query);

  if(!$select_user_query){

  	die("Wrong");

  }

  while($row = mysqli_fetch_array($select_user_query)) {
  	echo $db_id = $row['user_id'];
  }

?>
<?php 
  include 'connection.php';
  ?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="adminindex.php">CMS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="welcome.php">Home</a></li>
                <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                
                <li class="dropdown">
                    
                    <ul class="dropdown-menu">
                        <li>
                           
                        </li>
                        
                        <li class="divider"></li>
                        
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                   
                    
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="posts.php">View All Post</a>
                            </li>
                            <li>
                                <a href="posts.php?source=add_post">Add Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-fw fa-wrench"></i> Categories</a>
                    </li>
                    
                    <li class="active">
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Comments</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">

                        <?php
                        if(isset($_POST['submit'])){
                        $cat_title= $_POST['cat_title'];
                        if($cat_title == "" || empty($cat_title)){
                        echo "Please Enter the category";
                        }
                        else{
                        $query = "INSERT INTO categories(cat_title)";
                        $query .= "VALUES('{$cat_title}')";
                        $create_category_query = mysqli_query($con,$query);
                        if(!$create_category_query){
                        	die("Failed".mysqli_error($con));
                        }

                        }	
                        }


                        ?>

                        <form action="" method="post">
                        	<div class="form-group">
                        		<label for="cat_title">Add category</label>
                        		<input type="text" class="form-control" name="cat_title">

                        	</div>
                            <div class="form-group">
                        		<input class="btn btn-primary" type="submit" name="submit" value="Add category">

                        	</div>


                        </form>
                      <form action="" method="post">
                        	<div class="form-group">
                        <label for="cat_title">Edit category</label>
                    <?php
                    if(isset($_GET['edit'])){
                    $cat_id = $_GET['edit'];
                    $query="SELECT * FROM categories WHERE cat_id = $cat_id";
                    $select_categories_id = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_assoc($select_categories_id)) {
                    	$cat_id = $row['cat_id'];
                    	$cat_title = $row['cat_title'];
                    ?>
                    <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">
                        

                        <?php } } ?>


    <?php
    if(isset($_POST['update_category'])){
	$the_cat_title = $_POST['cat_title'];
	$query = "UPDATE categories SET  cat_title ='{$the_cat_title}' WHERE cat_id ={$cat_id} ";
    $update_query = mysqli_query($con,$query);
    if(!$update_query){
    	die("sdfgdfb".mysqli_error($con));

    }
    }
    ?>
                    	                    


                        	
                        	</div>
                            <div class="form-group">
                        		<input class="btn btn-primary" type="submit" name="update_category" value="Update category">

                        	</div>


                        </form>
                    </div>
                        <div class="col-xs-6">

                        	<table class="table table-bordered table-hover"><thead>
                        		<tr>
                        			<th>Id</th>
                        			<th>Category Title</th>
                        		</tr>
                        	</thead>
                        <tbody>
<?php
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($con,$query);

    while($row = mysqli_fetch_assoc($select_categories)) {
       $cat_title = $row['cat_title'];
       $cat_id = $row['cat_id'];
       echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
             
 ?>   

 <?php
    if(isset($_GET['delete'])){
	$the_cat_id = $_GET['delete'];
	$query = "DELETE FROM `categories` WHERE cat_id = $the_cat_id ";
	$delete_query = mysqli_query($con,$query);
	header('location:categories.php');

}
 ?>                     	
                            
           
     </tbody>
     </table>



                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

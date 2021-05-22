<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

?>

<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

   <style>

h3   {color: white;}

li   {color: white;}

</style>

</head>

<body  style="background-color:powderblue;">

               
    
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                     <li>
                        
                         <?php echo "<h3>Welcome to cms " . $_SESSION['username'] . "</h3>"; ?>
                    </li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                    <li>
                        <a href="addp.php"><h4>Add Post</h4></a>
                        
                    </li>
                    <li>
                        <a href="p2.php"><h4>View All Post</h4></a>
                    </li>
                    <li>
                        <a href="adminlog.php"><h4>Admin</h4></a>
                    </li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                    <li>
                        <a href="logout.php" style="align-content: left;"><strong><h4>Logout</h4></strong></a>
                    </li>
        
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <?php

                if(isset($_GET['p_id'])){

                    $the_post_id = $_GET['p_id'];
                }
                 $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
             
    $select_all_posts = mysqli_query($con,$query);

    while($row = mysqli_fetch_assoc($select_all_posts)) {
       $post_title = $row['post_title'];
       $post_author = $row['post_author'];
       $post_date = $row['post_date'];
       $post_image = $row['post_image'];
       $post_content = $row['post_content'];
       
        ?>


                <!-- Title -->
                <h2><a href="#"><?php echo $post_title ?></a></h2>

                <!-- Author -->
                <p class="lead">
                    by <a href="demo.php"><?php echo $post_author ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>

                <hr>

                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="" width="500" height="500">
                </a>

                

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $post_content ?></p>

                <hr>


        <hr>
  <?php   }  ?>



<?php 

    if(isset($_POST['create_comment'])) {

        $the_post_id = $_GET['p_id'];
        $comment_author = $_POST['comment_author'];
        $comment_content = $_POST['comment_content'];


        if (!empty($comment_author) && !empty($comment_content)) {


            $query = "INSERT INTO comments (comment_post_id, comment_author, comment_content,comment_date) VALUES ($the_post_id ,'{$comment_author}', '{$comment_content }',now())";

            $create_comment_query = mysqli_query($con, $query);

            if (!$create_comment_query) {
                die('QUERY FAILED' . mysqli_error($con));


            }


        }


    }




?> 
   <div class="well">



            <h4>Leave a Comment:</h4>
            <form action="#" method="post" role="form">

                <div class="form-group">
                    <label for="Author">Name</label>
                    <input type="text" name="comment_author" class="form-control" name="comment_author">
                </div>

                <div class="form-group">
                    <label for="comment">Your Comment</label>
                    <textarea name="comment_content" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
            </form>
        </div>

                <hr>
                <?php 


            $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ORDER BY comment_id DESC ";
            
            $select_comment_query = mysqli_query($con, $query);
            if(!$select_comment_query) {

                die('Query Failed' . mysqli_error($con));
             }
            while ($row = mysqli_fetch_array($select_comment_query)) {
            $comment_date   = $row['comment_date']; 
            $comment_content= $row['comment_content'];
            $comment_author = $row['comment_author'];
        }
                
                ?>

                
                

                <!-- Comment -->
                <div class="media">
                    
                </div>


                
                

            </div>
            <br><br>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
           
       
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php 

    $query = "SELECT * FROM categories";
    $select_all_categories_query = mysqli_query($con,$query);

    while($row = mysqli_fetch_assoc($select_all_categories_query)) {
       $cat_title = $row['cat_title'];
       $cat_id = $row['cat_id'];
        
        echo "<li><a href='/cms/category/{$cat_id}'>{$cat_title}</a></li>";
    }
                    
    ?>
                                
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                  
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

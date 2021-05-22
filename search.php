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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/blog-home.css" rel="stylesheet">

</head>
<body style="background-color:powderblue;">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               
            </div>
         
            <ul class="nav navbar-nav">
                  <li>
                        <a class="navbar-brand" href="welcome.php">CMS</a>
                        
                    </li>
                 
                    <li>
                        <a href="addp.php"><h4>Add Post</h4></a>
                        
                    </li>
                    <li>
                        <a href="p2.php"><h4>View All Post</h4></a>
                    </li>
                    <li>
                        <a href="adminlog.php"><h4>Admin</h4></a>
                    </li>
                    <li>
                        <a href="logout.php" style="align-content: left;"><strong><h4>Logout</h4></strong></a>
                    </li>
                    
        
                </ul>
           
        </div>
        
    </nav>


    <div class="container">

        <div class="row">
            <div class="col-md-8">
           

            <?php
            if(isset($_POST['submit'])){
            $search = $_POST['search'];
            

            $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
            $search_query = mysqli_query($con,$query);

            if(!$search_query){
                die("Wrong".mysqli_error($con));
            }
            
            $count = mysqli_num_rows($search_query);
            if($count == 0){
            
            echo " no res";
            
            }

            else
            {
             while($row = mysqli_fetch_assoc($search_query)){
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                ?>
                
                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            
            <?php } 
            }

            }



            ?>
             
              

             
           
            </div>

            <div class="col-md-4">

            
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                </div>





                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <?php 

    $query = "SELECT * FROM categories LIMIT 3";
    $select_all_categories_query = mysqli_query($con,$query);

    while($row = mysqli_fetch_assoc($select_all_categories_query)) {
       $cat_title = $row['cat_title'];
       $cat_id = $row['cat_id'];
        
        echo "<li><a href='/cms/category/{$cat_id}'>{$cat_title}</a></li>";
    }
                    
    ?>
                
                    </div>
                </div>
                

            </div>

        </div>

        <hr>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                </div>
            </div>
        </footer>

    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
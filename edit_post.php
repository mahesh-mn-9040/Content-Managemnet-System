
<?php

     if(isset($_GET['p_id'])){
       $the_post_id = $_GET['p_id']; 
     }
     $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
     $select_posts_by_id = mysqli_query($con,$query);
        while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_date = $row['post_date'];
            $post_tags = $row['post_tags'];

        }

        if(isset($_POST['update_post'])){
            $post_author = $_POST['post_author'];
            $post_title = $_POST['post_title'];
            $post_category_id = $_POST['post_category'];
            $post_image = $_FILES['image']['name'];
            $post_image_temp = $_FILES['image']['tmp_name'];
            $post_content = $_POST['post_content'];
            $post_tags = $_POST['post_tags'];

        move_uploaded_file($post_image_temp,"images/$post_image");

        if (empty($post_image)) {
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
            $select_image = mysqli_query($con,$query);
            while ($row = mysqli_fetch_array($select_image)) {
                $post_image = $row['post_image'];
                # code...
            }
            # code...
        }
        
        $query = "UPDATE posts SET post_title = '{$post_title}', post_category_id = '{$post_category_id}', post_date = now(), post_author = '{$post_author}',post_tags = '{$post_tags}',post_content = '{$post_content}',post_image = '{$post_image}' WHERE post_id ={$the_post_id}";

        $update_post = mysqli_query($con,$query);

        if(!$update_post){
            die("fail".mysqli_error($con));
        }

        }
    ?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post title</label>
        <input value="<?php echo $post_title; ?>" type="text" name="post_title" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_category">Post category Id</label>
        <select name="post_category" id="">
            <?php
            $query="SELECT * FROM categories";
                    $select_categories = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_assoc($select_categories)) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];

                        echo "<option value='$cat_id'>{$cat_title}</option>";


                    }


            ?>


        </select>
    </div>
    
    <div class="form-group">
        <label for="title">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" name="post_author" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="title">Post Image</label>
        <img width="100"  src="images/<?php echo$post_image; ?>" alt="img"><br><br>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="title">Post tags</label>
        <input value="<?php echo $post_tags;?>" type="text" name="post_tags" class="form-control">
    </div>
    <div class="form-group">
        <label for="title">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10">
            <?php echo $post_content; ?>
        </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>
</form>
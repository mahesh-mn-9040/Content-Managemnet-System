<?php
if(isset($_POST['create_post'])){
    $post_title = $_POST['title'];
   $post_author = $_POST['author'];
   $post_category_id = $_POST['post_category'];
   $post_image = $_FILES['image']['name'];
   $post_image_temp = $_FILES['image']['tmp_name'];
   $post_tags = $_POST['post_tags'];
   $post_content = $_POST['post_content'];
   $post_date = date('d-m-y');

   move_uploaded_file($post_image_temp,"images/$post_image");

   $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags) VALUES('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}') ";

   $create_post_query = mysqli_query($con, $query);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body style="background-color:powderblue;">
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post title</label>
        <input type="text" name="title" class="form-control">
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
        <input type="text" name="author" class="form-control">
    </div>
    
    
    <div class="form-group">
        <label for="title">Post tags</label>
        <input type="text" name="post_tags" class="form-control">
    </div>
    <div class="form-group">
        <label for="title">Post Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="form-group">
        <label for="title">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>
</form>

</body>
</html>


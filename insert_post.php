<?php 
  include 'connection.php';
   if(isset($_POST['submit'])){
   $post_title = $_POST['title'];
   $post_author = $_POST['author'];
   $post_category_id = $_POST['post_category_id'];
   $post_status = $_POST['post_status'];
   $post_image = "posts/".basename($_FILES['image']['name']);
   $img_text = $_POST['text'];
   $post_tags = $_POST['post_tags'];
   $post_content = $_POST['post_content'];
   $post_date = date('d-m-y');
   $post_comment_count = 4;
   
move_uploaded_file($post_image_temp,"images/$post_image");
    $q = "INSERT INTO `posts`(`post_category_id`, `post_title`, `post_author`,`post_date`,`post_image`,`post_content`,`post_tags`,`post_comment_count`,`post_status`) VALUES ('$post_category_id','$post_title','$post_author','$post_date','$post_image','$post_content','$post_tags','$post_comment_count','$post_status')";

    $query = mysqli_query($con,$q);
   }

 ?>

   	   <form method="post" enctype="multipart/form-data">
   	   	<br><br>
   	   	<div class="card">
   	   		<div class="card-header bg-dark">
   	   			<h3 class="text-white text-center">Add Post</h>

   	   		</div>
   	   		<br>
   	   		<label for="title">Post title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="post_category">Post category Id</label>
        <input type="text"  class="form-control" name="post_category_id">
    </div>
    
    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name="author">
    </div>
    <div class="form-group">
        <label for="title">Post Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>
    <div class="form-group">
        <label for="title">Post Image</label>
        <input type="file" class="form-control" name="image">
    </div>
    <div class="form-group">
        <label for="title">Post tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="title">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" 
        value="Publish Post">
    </div>
   	   	</div>

   	   </form>
 
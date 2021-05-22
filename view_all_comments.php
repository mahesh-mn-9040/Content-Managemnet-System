<?php
include 'connection.php';
?>

<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                            <th>Id</th>
                            <th>Author</th>
                            <th>In Responce:</th>
                            <th>comment</th>
                            <th>Date</th>
                            <th>Delete</th>
                            
                        </tr></thead> 
                        <tbody>
                            <?php 
                         $query = "SELECT * FROM comments";
                        $select_comments = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_assoc($select_comments)) {
                        $comment_id = $row['comment_id'];
                        $comment_post_id = $row['comment_post_id'];
                        $comment_author = $row['comment_author'];

                        $comment_content = $row['comment_content'];
                        $comment_date = $row['comment_date'];
                        
                        echo "<tr>";
                        echo "<td> $comment_id </td>";
                        echo "<td> $comment_author </td>";
                        $query = "SELECT * FROM posts WHERE post_id=$comment_post_id";
                        $select_post_id_query = mysqli_query($con,$query);
                        while ($row = mysqli_fetch_assoc($select_post_id_query)) {
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            echo "<td><a href='post.php?p_id=$post_id'> $post_title</a> </td>";
                         } 

                        
                        echo "<td> $comment_content </td>";
                        
                        echo "<td> $comment_date </td>";
                        
                        echo "<td><a href='comments.php?delete={$comment_id}'>Delete</td>";
                        

                        
                        
                        
                        echo "</tr>";
                        }

                            ?>
                            
                            
                            
                        </tbody></table>


                        <?php
                        if(isset($_GET['delete'])){
                            $comment_id = $_GET['delete'];
                            $query ="DELETE FROM comments WHERE comment_id = {$comment_id}";
                            $delete_query = mysqli_query($con,$query);

                            header('location:comments.php');
                        }


                        ?>
                       
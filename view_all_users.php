<?php
include 'connection.php';
?>

<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                            <th>id</th>
                            <th>username</th>
                            <th>email</th>
                            
                        </tr></thead> 
                        <tbody>
                            <?php 
                         $query = "SELECT * FROM login";
                    $select_users = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_assoc($select_users)) {
                        $user_id = $row['id'];
                        $username = $row['username'];
                        $email = $row['email'];


                        echo "<tr>";
                        echo "<td> $user_id </td>";
                        echo "<td> $username </td>";
                        echo "<td> $email </td>";
                        echo "</tr>";
                        }

                            ?>
                            
                            
                            
                        </tbody></table>

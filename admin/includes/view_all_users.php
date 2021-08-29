                
                        <table class="table table-hover responsive">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>USERNAME</th>
                                    <th>EMAIL</th>
                                    <th>FULL NAME</th>
                                    <th>IMAGE</th>
                                    
                                    <th>ROLE</th>
                                    
                                </tr>
                            </thead>
                        
                        <tbody>

                        <?php 
                        global $connection;
                            $query = "SELECT * FROM users";
                            $select_posts = mysqli_query($connection,$query);  

                            $counter = 0;

                            while($row = mysqli_fetch_assoc($select_posts)) {
                            $user_id = $row['user_id'];
                            $username = $row['username'];
                            $user_firstname = $row['user_firstname'];
                            $user_lastname = $row['user_lastname'];
                            $user_email = $row['user_email'];
                            $user_role = $row['user_role'];
                           
                           
                           

                       



                            echo "<tr class='responsive'>";
                                echo "<td>$user_id          </td>";
                                echo "<td>$username         </td>";
                                echo "<td>$user_email       </td>";
                                echo "<td>$user_firstname   $user_lastname</td>";
                                echo "<td>some image </td>";
                                
                            

                            //     $p_query = "SELECT * FROM posts WHERE post_id = {$comment_post_id}" ;
                            //     $related_post_query = mysqli_query($connection, $p_query);
                            
                            //     while($row = mysqli_fetch_assoc($related_post_query)) {
                            //        $the_post_image = $row['post_image'];
                            //         echo "<td>
                            //         <a href='../post.php?p_id=$comment_post_id'>
                            //         <img class='img-responsive' width='100' src='../images/$the_post_image'>
                            //         </a>
                                    
                            //         </td>";
                                
                            // }
                            echo "<td>$user_role         </td>";



                              
                                echo "<td><a class='btn btn-success' href='users.php?upgrade=$user_id'>UPGRADE</a></td>";
                                echo "<td><a class='btn btn-warning' href='users.php?downgrade=$user_id'>DOWNGRADE</a></td>";
                                echo "<td><a class='btn btn-danger' href='users.php?deleted=$user_id'>DELETE</a></td>";
                                
                                
                            echo "</tr>";
                            $counter++;
                            }
                            if($counter > 0){
                                if($counter == 1){
                                    echo "{$counter} user exist";
                                }else
                               
                                echo "<h3>{$counter} users exist</h3>";
                            }else{
                                echo "<h2>no user has signed in yet...!</h2>";
                            }

                        ?>
                           
                        </tbody>
                        </table>

                        <?php 
                            if(isset($_GET['deleted'])){
                               
                                    $the_user_id = $_GET['deleted'];
                                    $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
                                    $delete_user_query = mysqli_query($connection, $query);
                                    header("Location: ./users.php");
                            }
                        ?>

                        <?php 
                            if(isset($_GET['upgrade'])){
                                    $the_user_id = $_GET['upgrade'];
                                    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = {$the_user_id}";
                                    $upgrade_user_query = mysqli_query($connection, $query);
                                    header("Location: ./users.php");
                            }
                        ?>

<?php 
                            if(isset($_GET['downgrade'])){
                                    $the_user_id = $_GET['downgrade'];
                                    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = {$the_user_id}";
                                    $downgrade_user_query = mysqli_query($connection, $query);
                                    header("Location: ./users.php");
                            }
                        ?>
                        
                
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
                            $select_users = mysqli_query($connection,$query);  

                            

                            while($row = mysqli_fetch_assoc($select_users)) {
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
                            if($user_role == 'admin'){
                                echo "<td><a class='btn btn-warning' href='users.php?change_role=$user_id'>To subscriber</a></td>";
                            }else{
                                echo "<td><a class='btn btn-success' href='users.php?change_role=$user_id'>To admin</a></td>";
                            }



                                
                            echo "<td><a class='btn btn-primary' href='./users.php?source=edit_user&p_id=$user_id'>EDIT</a></td>";
                            echo "<td><a class='btn btn-danger' href='users.php?deleted=$user_id'>DELETE</a></td>";
                                
                                
                            echo "</tr>";
                            
                            }
                            $counter = mysqli_num_rows($select_users);
                            if($counter > 0){
                                if($counter == 1){
                                    echo "{$counter} user exist <hr>";
                                }else
                               
                                echo "<h3>{$counter} users exist</h3> <hr>";
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
                        
                        if(isset($_GET['change_role'])){

                           $the_user_id = $_GET['change_role'];
                            
                            
                            $query1 = "SELECT * FROM users WHERE user_id = {$the_user_id}";
                            $getting_user_info_query = mysqli_query($connection, $query1);

                            while($row = mysqli_fetch_assoc($getting_user_info_query)){
                               echo $the_user_role = $row['user_role'];
                            }

                            if($the_user_role == 'admin'){
                            
                                $query2 = "UPDATE users SET user_role = 'subscriber' WHERE user_id = {$the_user_id}";
                                $downgrade_user_query = mysqli_query($connection, $query2);
                                header("Location: ./users.php");
                            }
                            else{
                                $query3 = "UPDATE users SET user_role = 'admin' WHERE user_id = {$the_user_id}";
                                $upgrade_user_query = mysqli_query($connection, $query3);
                                header("Location: ./users.php");
                            }

                        }
                        
                        
                        
                        ?>
                        
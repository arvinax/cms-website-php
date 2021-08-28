                
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    
                                    <th>AUTHOR</th>
                                    <th>EMAIL</th>
                                    <th>POST</th>
                                    <th>CONTENT</th>
                                    
                                    <th>STATUS</th>
                                    <TH>DATE</TH>
                                </tr>
                            </thead>
                        
                        <tbody>

                        <?php 
                        global $connection;
                            $query = "SELECT * FROM comments";
                            $select_comments = mysqli_query($connection,$query);  

                            $counter = 0;

                            while($row = mysqli_fetch_assoc($select_comments)) {
                            $comment_id = $row['comment_id'];
                            $comment_post_id = $row['comment_post_id'];
                            $comment_author = $row['comment_author'];
                            $comment_email = $row['comment_email'];
                            $comment_content = $row['comment_content'];
                            $comment_status = $row['comment_status'];
                            $comment_date = $row['comment_date'];

                           
                           

                       



                            echo "<tr>";
                                echo "<td>$comment_id         </td>";
                                echo "<td>$comment_author       </td>";
                                echo "<td> $comment_email      </td>";
                                echo "<td>$comment_post_id         </td>";

                                $p_query = "SELECT * FROM posts WHERE post_id = {$comment_post_id}" ;
                                $related_post_query = mysqli_query($connection, $p_query);
                            
                                while($row = mysqli_fetch_assoc($related_post_query)) {
                                   echo  $the_post_image = $row['post_image'];
                                    //echo "<td><img class='img-responsive' width='100' src='../images/$the_post_image'></td>";
                                
                            }




                                echo "<td>$comment_content     </td>";

           

                                echo "<td>$comment_status</td>";
                                echo "<td>$comment_date        </td>";
                              
                                echo "<td><a href='#'>APPROVE</a></td>";
                                echo "<td><a href='#'>UNAPPROVE</a></td>";
                                echo "<td><a href='comments.php?deleted=$comment_id'>DELETE</a></td>";
                                
                                
                            echo "</tr>";
                            $counter++;
                            }
                            if($counter > 0){
                                echo "there is {$counter} comment(s) in the box";
                            }else{
                                echo "comment box is empty";
                            }

                        ?>
                           
                        </tbody>
                        </table>

                        <?php 
                            if(isset($_GET['deleted'])){
                                    $the_post_id = $_GET['deleted'];
                                    $query = "DELETE FROM comments WHERE comment_id = {$comment_id}";
                                    $delete_comment_query = mysqli_query($connection, $query);
                                    header("Location: ./comments.php");
                            }
                        ?>
                        
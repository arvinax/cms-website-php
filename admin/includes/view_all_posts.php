                
                        <table class="table table-hover">
                            <thead >
                                <tr>
                                    <th>ID</th>
                                    <th>TITLE</th>
                                    <th>AUTHOR</th>
                                    <th>CATEGORY</th>
                                    <th>CAPTION</th>
                                   
                                    <th>IMAGE</th>
                                    <th>COMMENTS</th>
                                    <th>TAGS</th>
                                    <TH>DATE</TH>
                                    <th>STATUS</th>


                                
                                    
                                </tr>
                            </thead>
                        
                        <tbody>

                        <?php 
                        global $connection;
                            $query = "SELECT * FROM posts";
                            $select_posts = mysqli_query($connection,$query);  

                            
                            

                            while($row = mysqli_fetch_assoc($select_posts)) {
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            $post_status = $row['post_status'];
                            $post_date =  $row['post_date'];
                            $post_category_id = $row['post_category_id'];
                            $post_comment_count = $row['post_comment_count'];
                            $post_tag =  $row['post_tag'];

                           
                            




                            echo "<tr>";
                                echo "<td>$post_id          </td>";
                                
                                echo "<td>
                                    <a href='../post.php?p_id=$post_id'>
                                     $post_title
                                    </a>
                                    
                                    </td>";

                                echo "<td>$post_author      </td>";


                                $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                                $select_cat = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($select_cat)){
                                    $cat_title = $row['cat_title'];

                                    echo "<td>$cat_title</td>";
                                }

                                echo "<td>$post_content     </td>";
                                

                                echo "<td>
                                    <a href='../post.php?p_id=$post_id'>
                                    <img class='img-responsive' width='100' src='../images/$post_image'>
                                    </a>
                                    
                                    </td>";

            //echo "<td><img class='img-responsive' width='100' src='../images/$post_image'></td>";

                                echo "<td>$post_comment_count</td>";
                                echo "<td>$post_tag         </td>";
                                echo "<td>$post_date        </td>";
                                echo "<td>$post_status      </td>";

                                if($post_status == 'draft'){
                                    echo "<td><a class='btn btn-success' href='posts.php?change_post_status={$post_id}'>PUBLISH</a></td>";
                                }else{
                                    echo "<td><a class='btn btn-warning' href='posts.php?change_post_status={$post_id}'>DRAFT</a></td>";
                                }

                                
                                echo "<td><a class='btn btn-primary' href='posts.php?source=edit_post&p_id={$post_id}'>EDIT</a></td>";
                                echo "<td><a class='btn btn-danger' href='posts.php?deleted={$post_id}'>DELETE</a></td>";

                                
                            echo "</tr>";
                            }
                            $counter = mysqli_num_rows($select_posts);
                            if($counter > 0){
                             echo "<h3>number of posts: {$counter}</h3> <hr>";
                            }else{
                                echo "<h3>no user posted yet...!<h3>";
                            }

                        ?>
                           
                        </tbody>
                        </table>

                        <?php 
                            if(isset($_GET['deleted'])){
                                    $the_post_id = $_GET['deleted'];
                                    $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
                                    $delete_post_query = mysqli_query($connection, $query);
                                    header("Location: ./posts.php");
                            }
                        ?>


                        <?php 
                            if(isset($_GET['change_post_status'])){
                                $the_post_id = $_GET['change_post_status'];
                                
                                $query1 = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
                                $select_post = mysqli_query($connection, $query1);
                                while($row = mysqli_fetch_assoc($select_post)){
                                    $the_post_status = $row['post_status'];
                                }
                                if($the_post_status == 'draft'){
                                    $query2 = "UPDATE posts SET post_status = 'published' WHERE post_id = {$the_post_id}";
                                    $publish_post_query = mysqli_query($connection, $query2);
                                    header("Location: ./posts.php");
                                }else{
                                    $query3 = "UPDATE posts SET post_status = 'draft' WHERE post_id = {$the_post_id}";
                                    $publish_post_query = mysqli_query($connection, $query3);
                                    header("Location: ./posts.php");
                                }
                            }
                        
                        ?>
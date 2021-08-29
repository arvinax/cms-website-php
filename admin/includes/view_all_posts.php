                
                        <table class="table table-hover">
                            <thead >
                                <tr>
                                    <th>ID</th>
                                    <th>TITLE</th>
                                    <th>AUTHOR</th>
                                    <th>CATEGORY</th>
                                    <th>STATUS</th>
                                    <th>IMAGE</th>
                                    <th>COMMENTS</th>
                                    <th>TAGS</th>
                                    <TH>DATE</TH>


                                
                                    
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
                                echo "<td>$post_title       </td>";
                                echo "<td>$post_author      </td>";


                                $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                                $select_cat = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($select_cat)){
                                    $cat_title = $row['cat_title'];

                                    echo "<td>$cat_title</td>";
                                }
                                



                                echo "<td>$post_status      </td>";

            echo "<td><img class='img-responsive' width='100' src='../images/$post_image'></td>";

                                echo "<td>$post_comment_count</td>";
                                echo "<td>$post_tag         </td>";
                                echo "<td>$post_date        </td>";
                                echo "<td><a class='btn btn-success' href='posts.php?published={$post_id}'>PUBLISH</a></td>";
                                echo "<td><a class='btn btn-warning' href='posts.php?draft={$post_id}'>DRAFT</a></td>";
                                echo "<td><a class='btn btn-primary' href='posts.php?source=edit_post&p_id={$post_id}'>EDIT</a></td>";
                                echo "<td><a class='btn btn-danger' href='posts.php?deleted={$post_id}'>DELETE</a></td>";

                                
                            echo "</tr>";
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
                            if(isset($_GET['published'])){
                                    $the_post_id = $_GET['published'];
                                    $query = "UPDATE posts SET post_status = 'published' WHERE post_id = {$the_post_id}";
                                    $publish_post_query = mysqli_query($connection, $query);
                                    header("Location: ./posts.php");
                            }
                        ?>

<?php 
                            if(isset($_GET['draft'])){
                                     $the_post_id = $_GET['draft'];
                                    $query = "UPDATE posts SET post_status = 'draft' WHERE post_id = {$the_post_id}";
                                    $publish_post_query = mysqli_query($connection, $query);
                                    header("Location: ./posts.php");
                            }
                        ?>
                        
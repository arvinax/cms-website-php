
           
           
           
           <?php //include("delete_modal.php");

if(isset($_POST['checkBoxArray'])) {

    foreach($_POST['checkBoxArray'] as $postValueId ){
        $bulk_options = $_POST['bulk_options'];
        switch($bulk_options) {
            
            case 'published':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}  ";
                $update_to_published_status = mysqli_query($connection,$query);
                confirmQuery($update_to_published_status);
                break;
            case 'draft':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}  ";
                $update_to_draft_status = mysqli_query($connection,$query);
                confirmQuery($update_to_draft_status);
                break;
            case 'delete':
                $query = "DELETE FROM posts WHERE post_id = {$postValueId}  ";
                $update_to_delete_status = mysqli_query($connection,$query);
                confirmQuery($update_to_delete_status);
                break;
            case 'clone':
                $query = "SELECT * FROM posts WHERE post_id = '{$postValueId}' ";
                $select_post_query = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_array($select_post_query)) {
                    $post_title         = $row['post_title'];
                    $post_category_id   = $row['post_category_id'];
                    $post_date          = $row['post_date'];
                    $post_author        = $row['post_author'];
                    $post_status        = $row['post_status'];
                    $post_image         = $row['post_image'] ;
                    $post_tags          = $row['post_tag'];
                    $post_content       = $row['post_content'];

                }
                $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date,post_image,post_content,post_tag,post_status) ";
                $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}') ";
                $copy_query = mysqli_query($connection, $query);

                if(!$copy_query ) {

                    die("QUERY FAILED" . mysqli_error($connection));
                }
                break;

        }

    }

}


?>
               
               
               
               
               
               
               
               <form action="" method="post">
                        <table class="table table-hover">

        <div id="bulkOptionContainer" class="col-xs-4">
            <select class="form-control" name="bulk_options" id="">
                <option value="">Select Options</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
                <option value="clone">Clone</option>
            </select>
        </div>

        <div class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
        </div>




                            <thead >
                                <tr>
                                    <th><input type="checkbox" name="" id="selectAllBoxes"></th>
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

                            $published_posts_counter = 0;
                            
                            

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

                           
                            
                            if($post_status == 'published'){
                                $published_posts_counter++;
                            }



                            echo "<tr>";
                            ?>


                            <td><input type="checkbox" name="checkBoxArray[]" class="checkBoxes" 
                            value="<?php echo $post_id; ?>" ></td>




                            <?php
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
                                    <img 
                                    style='vertical-align: middle;
                                    width: 50px;
                                    height: 50px;
                                    border-radius: 50%; '
                                    src='../images/$post_image'>
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
                            if($counter == 0){
                                echo "<h3>no user posted yet...!<h3> <hr>";
                            }
                            echo "<h3>Published posts: {$published_posts_counter} of total {$counter}</h3> <hr>";

                        ?>
                           
                        </tbody>
                        </table>
                        </form>

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
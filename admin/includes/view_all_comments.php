<?php //include("delete_modal.php");

if(isset($_POST['checkBoxArray'])) {

    foreach($_POST['checkBoxArray'] as $commentValueId ){
        $bulk_options = $_POST['bulk_options'];
        switch($bulk_options) {
            
            case 'approved':
                $query = "UPDATE comments SET comment_status = '{$bulk_options}' WHERE comment_id = {$commentValueId}  ";
                $update_to_approved_status = mysqli_query($connection,$query);
                confirmQuery($update_to_approved_status);
                break;
            case 'unapproved':
                $query = "UPDATE comments SET comment_status = '{$bulk_options}' WHERE comment_id = {$commentValueId}  ";
                $update_to_unapproved_status = mysqli_query($connection,$query);
                confirmQuery($update_to_unapproved_status);
                break;
            case 'delete':
                $query = "DELETE FROM comments WHERE comment_id = {$commentValueId}  ";
                $update_to_delete_status = mysqli_query($connection,$query);
                confirmQuery($update_to_delete_status);
                break;
          

        }

    }

}


?>
               <form action="" method="post">
                        <table class="table table-hover responsive">



        <div id="bulkOptionContainer" class="col-xs-4">
            <select class="form-control" name="bulk_options" id="">
                <option value="">Select Options</option>
                <option value="approved">approve</option>
                <option value="unapproved">unapprove</option>
                <option value="delete">delete</option>
              
            </select>
        </div>

        <div class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
        </div>




                            <thead>
                                <tr>
                                <th><input type="checkbox" name="" id="selectAllBoxes"></th>
                                    <th>ID</th>
                                    
                                    <th>AUTHOR</th>
                                    <th>EMAIL</th>
                                    <th>POST</th>
                                    <th>CONTENT</th>
                                    
                                    
                                    <TH>DATE</TH>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                        
                        <tbody>

                        <?php 
                        global $connection;
                            $query = "SELECT * FROM comments";
                            $select_comments = mysqli_query($connection,$query);  

                           $approved_comments_counter = 0;

                            while($row = mysqli_fetch_assoc($select_comments)) {
                            $comment_id = $row['comment_id'];
                            $comment_post_id = $row['comment_post_id'];
                            $comment_author = $row['comment_author'];
                            $comment_email = $row['comment_email'];
                            $comment_content = $row['comment_content'];
                            $comment_status = $row['comment_status'];
                            $comment_date = $row['comment_date'];

            
                                if($comment_status == 'approved'){
                                    $approved_comments_counter++;
                                }

                            echo "<tr class='responsive'>";
                            ?>


                            <td><input type="checkbox" name="checkBoxArray[]" class="checkBoxes" 
                            value="<?php echo $comment_id; ?>" ></td>




                            <?php
                                echo "<td>$comment_id         </td>";
                                echo "<td>$comment_author       </td>";
                                echo "<td>$comment_email      </td>";
                               // echo "<td>$comment_post_id         </td>";


                                $p_query = "SELECT * FROM posts WHERE post_id = {$comment_post_id}" ;
                                $related_post_query = mysqli_query($connection, $p_query);
                            
                                while($row = mysqli_fetch_assoc($related_post_query)) {
                                   $the_post_image = $row['post_image'];
                                    echo "<td>
                                    <a href='../post.php?p_id=$comment_post_id'>
                                    <img class='img-responsive' width='100' src='../images/$the_post_image'>
                                    </a>
                                    
                                    </td>";
                                
                            }




                                echo "<td>$comment_content     </td>";

           

                                
                                echo "<td>$comment_date        </td>";
                                echo "<td>$comment_status</td>";
                                if($comment_status == 'approved'){
                                    echo "<td><a class='btn btn-warning' href='comments.php?unapprove=$comment_id'>UNAPPROVE</a></td>";
                                }else{
                                    echo "<td><a class='btn btn-success' href='comments.php?approve=$comment_id'>APPROVE</a></td>";
                                }
                              
                                
                                
                                echo "<td><a class='btn btn-danger' href='comments.php?deleted=$comment_id'>DELETE</a></td>";
                                
                                
                            echo "</tr>";
                          
                            }
                            $counter = mysqli_num_rows($select_comments);
                           
                            if($counter == 0){
                                echo "<h1>comment box is empty</h1> <hr>";
                            }
                            echo "<h3>Approved comments: {$approved_comments_counter} of total {$counter}</h3> <hr>";
                            
                           

                        ?>
                           
                        </tbody>
                        </table>
               </form>

                        <?php 
                            if(isset($_GET['deleted'])){
                                    $the_comment_id = $_GET['deleted'];
                                    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
                                    $delete_comment_query = mysqli_query($connection, $query);
                                    header("Location: ./comments.php");
                            }
                        ?>

                        <?php 
                            if(isset($_GET['approve'])){
                                    $the_comment_id = $_GET['approve'];
                                    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = {$the_comment_id}";
                                    $approve_comment_query = mysqli_query($connection, $query);
                                    header("Location: ./comments.php");
                            }
                        ?>

<?php 
                            if(isset($_GET['unapprove'])){
                                    $the_comment_id = $_GET['unapprove'];
                                    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = {$the_comment_id}";
                                    $unapprove_comment_query = mysqli_query($connection, $query);
                                    header("Location: ./comments.php");
                            }
                        ?>
                        
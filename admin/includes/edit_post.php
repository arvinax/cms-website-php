
<?php
   
    if(isset($_GET['p_id'])){
        $the_post_id =  $_GET['p_id'];
    }
   
   $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
   $select_posts_by_id = mysqli_query($connection,$query);  

   while($row = mysqli_fetch_assoc($select_posts_by_id)) {
   $post_id = $row['post_id'];
   $post_title = $row['post_title'];
   $post_author = $row['post_author'];
   $post_image = $row['post_image'];
   $post_content = $row['post_content'];
   $post_status = $row['post_status'];
   $post_date =  $row['post_date'];
   $post_category_id = $row['post_category_id'];
   $post_comment_count = $row['post_comment_count'];
   $post_tags =  $row['post_tag'];
   }

   if(isset($_POST['update_post'])){

    $post_user           =  escape($_POST['post_author']);
    $post_title          =  escape($_POST['post_title']);
    $post_category_id    =  escape($_POST['post_category']);

    $post_status         =  escape($_POST['post_status']);
    $post_image_temp     =  escape($_FILES['image']['tmp_name']);
    $post_image          =  escape($_FILES['image']['name']);
   
    $post_content        =  escape($_POST['post_content']);
    $post_tags           =  escape($_POST['post_tags']);

   move_uploaded_file($post_image_temp, "C:/xampp/htdocs/demo/cms/images/$post_image");
    

    $query = "UPDATE posts SET ";
    $query .="post_title  = '{$post_title}', ";
    $query .="post_category_id = '{$post_category_id}', ";
    $query .="post_date   =  now(), ";
    $query .="post_author = '{$post_author}', ";
    $query .="post_status = '{$post_status}', ";
    $query .="post_tag   = '{$post_tags}', ";
    $query .="post_content= '{$post_content}', ";
    $query .="post_image  = '{$post_image}' ";
    $query .= "WHERE post_id = {$the_post_id} ";
  
  $update_post = mysqli_query($connection,$query);
  
  confirmQuery($update_post);
  
  echo "<p class='bg-success'>Post Updated. <a href='../post.php?p_id={$the_post_id}'>View Post </a> or <a href='posts.php'>Edit More Posts</a></p>";



   }
    

 //   
?>

    <form action="" method="post" enctype="multipart/form-data">    
     
     
      <div class="form-group ">
         <label for="title">TITLE</label>
          <input type="text" class="form-control" name="post_title" value="<?php echo $post_title ?>">
       
      </div>
      

      <label for="category">CATEGORY</label>
         <div class="form-group ">
       
       <select name="post_category" id="">
           
<?php

        $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection,$query);
        
        confirmQuery($select_categories);


        while($row = mysqli_fetch_assoc($select_categories )) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
            
           
            echo "<option value='$cat_id'>{$cat_title}</option>";
         
            
        }

?>
           
        
       </select>
      
      </div>


      <label for="users">USERNAME</label>
       <div class="form-group ">
       
        <input type="text" name="post_author" class="form-control" value="<?php echo $post_author ?>">
      
      </div>





      <!-- <div class="form-group">
         <label for="title">Post Author</label>
          <input type="text" class="form-control" name="author">
      </div> -->
      
      

       <div class="form-group">
         <select name="post_status" id="">
             <option value="draft"><?php echo $post_status ?></option>
             <option value="published">Published</option>
             <option value="draft">Draft</option>
         </select>
      </div>
      
      
      <label for="post_image">IMAGE</label>
    <div class="form-group">
        
          <img name="post_image" src="../images/<?php echo $post_image ?>" width='100' alt="">
          <input type="file"  name="image">
      </div>

      <div class="form-group ">
         <label for="post_tags">TAGS</label>
          <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags ?>">
      </div>
      
      <div class="form-group">
         <label for="post_content">CONTENT</label>
         <textarea class="form-control "name="post_content" id="" cols="30" rows="10">
         <?php echo $post_content ?>
         </textarea>
      </div>
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_post" value="SAVE">
      </div>


</form>
    
            <h1 class="">
                <small>Add new post</small>
            </h1>
            


<?php
   

   if(isset($_POST['create_post'])) {
   
            $post_title        = escape($_POST['title']);
            $post_user         = $_SESSION['username'];
            $post_category_id  = escape($_POST['post_category']);
            $post_status       = 'waiting...';
    
            $post_image        = escape($_FILES['image']['name']);
            $post_image_temp   = $_FILES['image']['tmp_name'];
    
    
            $post_tags         = escape($_POST['post_tags']);
            $post_content      = escape($_POST['post_content']);
            $post_date         = escape(date('d-m-y'));


          


       
        move_uploaded_file($post_image_temp, "../images/$post_image" );
    

       
       
       
      $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date,post_image,post_content,post_tag, post_status) ";
             
      $query .= "VALUES({$post_category_id},'{$post_title}','{$post_user}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}') "; 
             
      $create_post_query = mysqli_query($connection, $query);  
          
      confirmQuery($create_post_query);

      $the_post_id = mysqli_insert_id($connection);


      echo "<p class='bg-success'>Post Created. Your post will be published after consideration. <a href='../post.php?p_id={$the_post_id}'>View Post </a> </p>";
     


   }
    

    
    
?>

    <form action="" method="post" enctype="multipart/form-data">    
     
     
      <div class="form-group">
         <label for="title">TITLE</label>
          <input type="text" class="form-control" name="title">
      </div>
      <hr>

         <div class="form-group">
       <label for="category">CATEGORY</label>
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
      
      





      <!-- <div class="form-group">
         <label for="title">Post Author</label>
          <input type="text" class="form-control" name="author">
      </div> -->
      
      

       <hr>
      
      
      
    <div class="form-group">
         <label for="post_image">IMAGE</label>
          <input type="file"  name="image">
      </div>
      <hr>

      <div class="form-group">
         <label for="post_tags">TAGS</label>
          <input type="text" class="form-control"  name="post_tags">
      </div>
      
      <div class="form-group" >
         <label for="post_content">CONTENT</label>
         <textarea class="form-control "name="post_content" id="editor" cols="30" rows="10">
         </textarea>
      </div>
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_post" value="SAVE">
      </div>


</form>
    
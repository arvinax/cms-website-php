
            <h1 class="">
                <small>Edit user</small>
            </h1>
<?php



    if(isset($_GET['p_id'])){
       $p_id = $_GET['p_id'];
    }
    $query = "SELECT * FROM users WHERE user_id = $p_id";
    $select_user = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_user)){
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_password = $row['user_password'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        
    }
   

   if(isset($_POST['update_user'])) {

    $new_username = $_POST['user_name'];
    $new_user_firstname = $_POST['user_firstname'];
    $new_user_password = $_POST['user_password'];
    $new_user_lastname = $_POST['user_lastname'];
    $new_user_email = $_POST['user_email'];
  
    $query = "UPDATE users SET ";
    $query .= "username = '{$new_username}', ";
    $query .= "user_password = '{$new_user_password }', ";
    $query .= "user_firstname = '{$new_user_firstname}', ";
    $query .= "user_lastname = '{$new_user_lastname}', ";
    $query .= "user_email = '{$new_user_email}' ";
    $query .= "WHERE user_id = {$p_id}";

    $update_user_query = mysqli_query($connection, $query);


      echo "<p class='bg-success'>User Created. <a href='./users.php'>View users </a></p>";
       


   }
    

    
    
?>

    <form action="" method="post" enctype="multipart/form-data">    
     
     
      <div class="form-group">
         <label for="title">USERNAME</label>
          <input type="text" class="form-control" name="user_name" value="<?php echo $username ?>">
      </div>

    
      <div class="form-group">
         <label for="title">EMAIL</label>
          <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>">
      </div>
      
      <div class="form-group">
         <label for="post_tags">FISR NAME</label>
          <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname ?>">
      </div>

      <div class="form-group">
         <label for="post_tags">LAST NAME</label>
          <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname ?>">
      </div>
      

       <div class="form-group">
         <select name="post_status" id="">
             <option value="">ROLE</option>
             
         </select>
      </div>
      
      
      
    <div class="form-group">
         <label for="post_image">IMAGE</label>
         <img name="post_image" src="../images/<?php echo $user_image ?>" width='100' alt="">
          <input type="file"  name="image">
      </div>


      <div class="form-group">
         <label for="post_tags">PASSWORD</label>
          <input type="password" class="form-control" name="user_password" value="<?php echo $user_password ?>">
      </div>
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_user" value="SAVE">
      </div>


</form>
    
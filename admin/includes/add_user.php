
            <h1 class="">
                <small>Add new user</small>
            </h1>
<?php
   

   if(isset($_POST['add_user'])) {

    global $connection;

    $username = $_POST['user_name'];
    $user_firstname = $_POST['user_firstname'];
    $user_password = $_POST['user_password'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_role = 'subscriber';
    $user_image = 'some image';


       
        //move_uploaded_file($post_image_temp, "../images/$post_image" );
       
       
      $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email,user_image, user_role) ";
             
      $query .= "VALUES('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_image}', '{$user_role}') "; 
             
      $create_user_query = mysqli_query($connection, $query);  
          
      confirmQuery($create_user_query);

     


      echo "<p class='bg-success'>User Created. <a href='./users.php'>View users </a></p>";
       


   }
    

    
    
?>

    <form action="" method="post" enctype="multipart/form-data">    
     
     
      <div class="form-group">
         <label for="title">USERNAME</label>
          <input type="text" class="form-control" name="user_name">
      </div>

    
      <div class="form-group">
         <label for="title">EMAIL</label>
          <input type="email" class="form-control" name="user_email">
      </div>
      
      <div class="form-group">
         <label for="post_tags">FISR NAME</label>
          <input type="text" class="form-control" name="user_firstname">
      </div>

      <div class="form-group">
         <label for="post_tags">LAST NAME</label>
          <input type="text" class="form-control" name="user_lastname">
      </div>
      

       <div class="form-group">
         <select name="post_status" id="">
             <option value="subscriber">ROLE</option>
         </select>
      </div>
      
      
      
    <!-- <div class="form-group">
         <label for="post_image">IMAGE</label>
          <input type="file"  name="image">
      </div> -->


      <div class="form-group">
         <label for="post_tags">PASSWORD</label>
          <input type="password" class="form-control" name="user_password">
      </div>
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="add_user" value="SAVE">
      </div>


</form>
    
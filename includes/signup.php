
<?php session_start(); ?>
<?php include "db.php"; ?>
<?php
   

   if(isset($_POST['sign_up'])) {




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

      if($create_user_query){
        $_SESSION['username'] = $username;
        $_SESSION['user_firstname'] = $user_firstname;
        $_SESSION['user_lastname'] = $user_lastname;
        $_SESSION['user_role'] = $user_role;
        $_SESSION['user_email'] = $user_email;
        $_SESSION['user_password'] = $user_password;
      }

      header("Location: ../index.php");


   }
    

 
    
?>
 
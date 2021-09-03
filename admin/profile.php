
           


<?php include "includes/admin_header.php" ?>
    
<?php 

if(isset($_SESSION['username'])){

    echo $username = $_SESSION['username'];


    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $select_user_profile = mysqli_query($connection, $query);
    if(!$select_user_profile){
        die("in profile.php select_user_profile auery " . mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($select_user_profile)){
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_password = $row['user_password'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
    }

}



    if(isset($_POST['update_profile'])) {
       
        $new_username = $_POST['user_name'];
        $new_user_firstname = $_POST['user_firstname'];
        $new_user_password = $_POST['user_password'];
        $new_user_lastname = $_POST['user_lastname'];
        $new_user_email = $_POST['user_email'];

        $new_user_image        = escape($_FILES['user_image']['name']);
        $user_image_temp   = $_FILES['user_image']['tmp_name'];

        move_uploaded_file($user_image_temp, "./images/$new_user_image" );
      
        $query  = "UPDATE users SET ";
        $query .= "username = '{$new_username}', ";
        $query .= "user_password = '{$new_user_password }', ";
        $query .= "user_firstname = '{$new_user_firstname}', ";
        $query .= "user_lastname = '{$new_user_lastname}', ";
        $query .= "user_email = '{$new_user_email}', ";
        $query .= "user_image = '{$new_user_image}' ";
        $query .= "WHERE username = '{$username}'";
    
        $update_profile_query = mysqli_query($connection, $query);
        if(!$update_profile_query){
            die(mysqli_error($connection));
        }
        header("Location: profile.php");

        
        
       
    
       }
   


    
    
?>

    <div id="wrapper">
       

        
  

        <!-- Navigation -->
 
        <?php include "includes/admin_navigation.php" ?>
        
        
    

<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">


            <h1 class="page-header">
                Profile  
                <small><?php echo $_SESSION['username']; ?></small>
            </h1>

        

            <form action="" method="post" enctype="multipart/form-data">    
     
     
     <div class="form-group">
        <label for="title">USERNAME</label>
         <input type="text" class="form-control" name="user_name" value="<?php echo $username ?>">
     </div>

   
     <div class="form-group">
        <label for="title">EMAIL</label>
         <input type="email" class="form-control" name="user_email" value="<?php echo $user_email;?> " >
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
        <label for="user_image">IMAGE</label>
         <input type="file"  name="user_image">
     </div>


     <div class="form-group">
        <label for="post_tags">PASSWORD</label>
         <input type="password" class="form-control" name="user_password" value="<?php echo $user_password ?>">
     </div>
     
     

      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="update_profile" value="SAVE">
     </div>


</form>
   





            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>

    </div>

<?php 

deleteCategories();

 ?>

  
        
     
        
        <!-- /#page-wrapper -->
        
    <?php include "includes/admin_footer.php" ?>

<?php include "includes/db.php" ?>

<?php include "includes/header.php" ?>


<body>



    <!-- Navigation -->
   <?php include "includes/navigation.php" ?>




    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php 
             if(isset($_GET['user'])){
                $user = $_GET['user'];
            }
            
            ?>

                <h1 class="page-header">
                    Posts of the author 
                    <small><?php echo $user ?></small>
                </h1>

                <!-- First Blog Post -->

                <?php 

               



                $query = "SELECT * FROM posts WHERE post_author = '{$user}'";
                $select_all_posts = mysqli_query($connection, $query);
                // if($select_all_posts){
                //     echo "selected";
                // }
                while($row = mysqli_fetch_assoc($select_all_posts)){
     
                $post_title	 = $row['post_title'];
                $post_author = $row['post_author'];
                $post_image	 = $row['post_image'];
                $post_content= $row['post_content'];
                $post_date = $row['post_date'];
                ?>






                        <?php 
                    $query = "SELECT * FROM users WHERE username = '{$post_author}'";
                    $select_user = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($select_user)){
                        $user_image = $row['user_image'];
                        echo "<div> <img class='img-responsive'  
                        style='vertical-align: middle;
                        width: 40px;
                        height: 40px;
                        border-radius: 50%; 
                        float: left;' src='images/$user_image'>  </div>";
                    
                        }
                        ?>
                    
           
                  <p class="lead">
                     <a href="index.php" ><?php echo $post_author ?></a>
                  </p>

               
                
                <img class="img-responsive" style="width: 100%; height: 500px;" src="images/<?php echo $post_image  ?>" alt="">
                <hr>
                <!-- <h2>
                    <a href="#"> <?php echo $post_title ?> </a>
                </h2> -->
                <p><?php echo $post_content ?></p>
                <a class="" href="#">More...</a>
               <br>
               <br>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>


<?php



                }
                ?>







         
                

                <!-- Comment -->
            
        </div>
    
            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>


        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php" ?>
        
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

                <h1 class="page-header">
                    Explore READITx
                    
                </h1>

                <!-- First Blog Post -->

                <?php 
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else {
                    $page = "";
                }

                if($page == '' || $page == 1){
                    $page_1 = 0;
                }else{
                    $page_1 = ($page * 5) - 5;
                } // 5 is number of posts per page





                $post_count_query = "SELECT * FROM posts WHERE post_status = 'published'";
                $count_posts = mysqli_query($connection, $post_count_query);
                $all_posts_number = mysqli_num_rows($count_posts);
                
               $pages_number = ceil($all_posts_number / 5);






                $query = "SELECT * FROM posts  where post_status = 'published' LIMIT $page_1, 5";
                $select_all_posts = mysqli_query($connection, $query);
              
                while($row = mysqli_fetch_assoc($select_all_posts)){
                    $post_id = $row['post_id'];
     
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
                  <a href="user_posts.php?user=<?php echo $post_author ; ?>" ><?php echo $post_author ?></a>
                  </p>
            
                  
                
            
               
                <a href="post.php?p_id=<?php echo $post_id ; ?>">
                <img class="img-responsive" style="width: 100%; height: 500px;" src="images/<?php echo $post_image  ?>" alt="">
                </a>
                <hr>
                <!-- <h2>
                    <a href="#"> <?php echo $post_title ?> </a>
                </h2> -->
                <p><?php echo $post_content ?></p>
                <a class="" href="#">More...</a>
               <br>
               <br>
                <p class="pull-right"><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>


<?php



                }
                ?>





               

               

                

               

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>


                <!-- pagers -->
                <ul class="pager">
               <?php 
               
               for($i = 1; $i <= $pages_number; $i++){


                if(isset($_GET['page'])){
                    if($_GET['page'] == $i){
                        echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
                    }else{
                        echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                    }
                }else{
                    
                    echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                }
                   
               }
               ?>
               </ul>





            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>


        <hr>


        <!-- Footer -->
        <?php include "includes/footer.php" ?>
        
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
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->

                <?php 

                if(isset($_GET['p_id'])){
                    $p_id = $_GET['p_id'];
                }



                $query = "SELECT * FROM posts WHERE post_id = {$p_id}";
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

                
                <p class="lead">
                  <a href="index.php"><?php echo $post_author ?></a>
                </p>
               
                
                <img class="img-responsive" src="images/<?php echo $post_image  ?>" alt="">
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





<!-- Blog Comments -->
                <?php  
                
                if(isset($_POST['create_comment'])){

                    $the_post_id =   $_GET['p_id'];
                    
                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];

                    $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, 
                    comment_content, comment_status, comment_date) ";
                    $query .= "VALUES ('{$the_post_id}', '{$comment_author}', '{$comment_email}', 
                    '{$comment_content}', 'waiting', now() )";

                    $comment_query = mysqli_query($connection, $query);
                   

                }
                
                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="comment_author" placeholder="username">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="comment_email" placeholder="email">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
               
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>




               

               

                

               

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>


        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php" ?>
        
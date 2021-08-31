<?php include "includes/admin_header.php" ?>



<?php 

if(!isset($_SESSION['username'])){
    header("Location: ../index.php");
}elseif(isset($_SESSION['user_role'])){
    if($_SESSION['user_role'] !== 'admin'){
        header("Location: ../index.php");
    }
}


?>





<body>

    <div id="wrapper">

      <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin room
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                        
                        </ol>
                    </div>
                </div>
                <!-- /.row -->






       
                <!-- /.row -->
                
                <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php
                    
                    $query = "SELECT * FROM posts";
                    $posts_query = mysqli_query($connection, $query);
                    $counter = mysqli_num_rows($posts_query);
                    echo "<div class='huge'>{$counter}</div>";
                    
                    ?>

                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">


                    <?php
                    
                    $query = "SELECT * FROM comments";
                    $comments_query = mysqli_query($connection, $query);
                    $counter = mysqli_num_rows($comments_query);
                    echo "<div class='huge'>{$counter}</div>";
                    
                    ?>
                     
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                    
                    $query = "SELECT * FROM users";
                    $users_query = mysqli_query($connection, $query);
                    $counter = mysqli_num_rows($users_query);
                    echo "<div class='huge'>{$counter}</div>";
                    
                    ?>
                    
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php
                    
                    $query = "SELECT * FROM categories";
                    $categories_query = mysqli_query($connection, $query);
                    $counter = mysqli_num_rows($categories_query);
                    echo "<div class='huge'>{$counter}</div>";
                    
                    ?>
                    
                       
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->










            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

  <?php include "includes/admin_footer.php"; ?>

</body>

</html>

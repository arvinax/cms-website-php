<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./index.php">READITx</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                <?php 
                global $connection;

                $query = "SELECT * FROM categories";
                $select_all_categories = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_categories)){
                    $cat_title = $row['cat_title'];

                    echo " <li><a href='#'> {$cat_title}</a> </li> ";
                }
                    

            
                    ?>
                    <?php 
                    if(isset($_SESSION['user_role'])){
                        if($_SESSION['user_role'] == 'admin'){
                        echo "<li><a href='./admin/index.php'>Admin</a></li>";
                        }else{
                            // echo "<li><a href='#'> {$_SESSION['username']} </a></li>";
                            echo "
                            <li class='dropdown navbar-right'>
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-user'></i>{$_SESSION['username']}<b class='caret'></b></a>
                                <ul class='dropdown-menu'>
                                    <li>
                                        <a href='./admin/profile.php'><i class='fa fa-fw fa-user'></i> Profile </a>
                                    </li>
                                    <li class='divider'></li>
                                    <li>
                                        <a href='includes/logout.php'><i class='fa fa-fw fa-power-off'></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>";
                            
                        }
                    }else{
                        echo "<li><a href='includes/login_page.html'>log in</a></li>";
                        echo "<li><a href='includes/login_page.html'>sign up</a></li>";
                    }
                    ?>






      








                    

                   
                        
                   
                </ul>
               
            </div>
            
            <!-- /.navbar-collapse -->
        </div>
        
        <!-- /.container -->
    </nav>
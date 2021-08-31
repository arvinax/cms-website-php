
<div class="col-md-4">


  

<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="./search.php" method="post">
        <div class="input-group">
            <input name="search" type="text" class="form-control">
            <span class="input-group-btn">
                <button name="submit" class="btn btn-default" type="submit" >
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div> 
    </form>
    <!-- /.input-group -->
</div>





<!-- log in form-->

<?php 
if(!isset($_SESSION['user_role'])){
    echo "<div class='well'>
    <h4>Login</h4>
    <form action='includes/login.php' method='post'>
        <div class='form-group'>
            <input name='username' type='text' class='form-control' placeholder='Enter username'>
        </div> 
        
        <div class='input-group'>
            <input name='password' type='password' class='form-control' placeholder='Enter password'>
         
        <span class='input-group-btn'>
            <button class='btn btn-primary' name='login' type='submit'>log in</button>

        </span>
        </div>

    </form>
</div>";
   
}
?>


<!-- Blog Categories Well -->
<?php include "includes/categories.php" ?>




<!-- Side Widget Well -->
<div class="well">
    <h4>Side Widget Well</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
       Inventore, perspiciatis adipisci accusamus laudantium odit 
       aliquam repellat tempore quos aspernatur vero.</p>
</div>





<?php include "signuporlogin.php" ?>





<!-- end of sidebar container -->
</div>

</div>
<!-- /.row -->








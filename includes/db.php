<?php 

 $connection = mysqli_connect('localhost', 'root', '', 'cms');

 if(!$connection){
    global $connection;
 die("connection faild " . mysqli_error($connection));
}
?>
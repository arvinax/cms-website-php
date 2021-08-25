
<div class="well">
                    <h4>Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">

                            <?php
                            
                            $query = "SELECT * FROM categories";
                            $select_all_categories = mysqli_query($connection, $query);
            
                            while($row = mysqli_fetch_assoc($select_all_categories)){
                                $cat_title = $row['cat_title'];
            
                                echo " <li><a href='#'> {$cat_title} </a> </li> ";
                            }
                            
                            ?>


                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>
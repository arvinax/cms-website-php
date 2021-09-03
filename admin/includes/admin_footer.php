  <!-- jQuery -->
  <script src="js/jquery.js"></script>




<!-- external js file -->
 
<script>



$(document).ready(function(){

	

$('#selectAllBoxes').click(function(event){

if(this.checked) {

$('.checkBoxes').each(function(){

    this.checked = true;

});

} else {


$('.checkBoxes').each(function(){

    this.checked = false;

});


}

});



});


function loadUsersOnline() {


$.get("functions.php?onlineusers=result", function(data){

    $(".usersonline").text(data);


});



}


setInterval(function(){

loadUsersOnline();


},500);







</script>



<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
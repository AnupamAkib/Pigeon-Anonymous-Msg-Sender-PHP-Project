<?php include "header.php" ?>
<?php
if(isset($_SESSION['usernm'])){
	echo "<script> window.location.href='/u/".rtrim($_SESSION['usernm'])."/view_message.php' </script>";
}
?>
<title>Pigeon | FREE anonymous msg!</title>
<center>
<div class='part1'>
<h1 align='center'>Welcome to pigeon anonymous msg sender!</h1>
Create account, share link, receive anonymous message and make fun!
<br><br>
<button class='spBTN' style="background:darkred; background-image: linear-gradient(#B50D06, darkred);" onclick="window.location.href='/register.php'">Register My Account</button>
	<br>
<button class='spBTN' style="background:#008c02; background-image: linear-gradient(#008c02, darkgreen);" onclick="window.location.href='/login.php'">Login to My Account</button>
    <br>
</div>
<div class='part3' style='color:#000'>
	<h2>What is Pigeon?</h2>
	Pigeon is an anonymous message sender. Using this web app, you can send and receive anonymous message from your friends. Just create an account, share the profile link with your friends or in your facebook account and receive secret message.
    Play this game when you feel bored and make fun!<br><br>
</div>
<div class='part3'>
	<h2 style='color:#000'>Why you should use Pigeon?</h2>
	
	<button class='features'>
	    <i class='fa fa-user' style='font-size:70px'></i><br>
		<font size='5'><b>Usability</b></font><hr color='#09072a'>
		Easy to use, normal, simple and colorful user interface.
	</button>
	<?php
	if($desk==0){
		echo "<br>";
	}
	?>
	<button class='features'>
	    <i class="fa fa-ban" style='font-size:70px;'></i><br>
		<font size='5'><b>No ads</b></font><hr color='#09072a'>
		Faster load and no ads. It's completely FREE for you!
	</button>
	<?php
	if($desk==0){
		echo "<br>";
	}
	?>
	<button class='features'>
	    <i class="fa fa-internet-explorer" style='font-size:70px;'></i><br>
		<font size='5'><b>Lower MB uses</b></font><hr color='#09072a'>
		As this site doesn't contain ads. So, it saves your data from wasting by loading ads.
	</button>
	<?php
	if($desk==0){
		echo "<br>";
	}
	?>
	<button class='features'>
	    <i class="fa fa-bell" style='font-size:70px;'></i><br>
		<font size='5'><b>Send Notifications</b></font><hr color='#09072a'>
		If you receive a new message then a notification will be sent to your email if you privide it. This feature is not available in other site.
	</button>
	<?php
	if($desk==0){
		echo "<br>";
	}
	?>
	
</div>



<div class='part4'>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<center>
<div id="slideshow">
   <div>
     <img src="images/1.png" width="100%">
   </div>
   <div>
     <img src="images/2.png" width="100%">
   </div>
   <div>
     <img src="images/3.png" width="100%">
   </div>
</div>

</center>

<script>
	$("#slideshow > div:gt(0)").hide();

setInterval(function() {
  $('#slideshow > div:first')
    .fadeOut(0)
    .next()
    .fadeIn(0)
    .end()
    .appendTo('#slideshow');
}, 2800);
</script>

<style>
#slideshow {
  position:relative;
  margin-bottom:15px;
  max-width:600px;
  width: 100%;
  padding: 0px;
  box-shadow: 0 0 6px rgba(0, 0, 0, 0.5);
}

#slideshow > div {
  top: 10px;
  left: 10px;
  right: 10px;
  bottom: 10px;
}
.utsorgo{
	background:black;
	Color:#fff;
	padding: 0px 0px 4px 0px;
	box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
}
</style>
</div>



<?php include "footer.php" ?>
	
	
	
	
	
	
	
	
	
	
	
	

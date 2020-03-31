<?php include "header.php" ?>
<?php
if(isset($_SESSION['sent'])==false){
    echo "<script> window.location.href='/'</script>";
}
unset($_SESSION['sent']);
?>
<title>Pigeon | Message Sent!</title>
<center><div class='division'>
<h1 style='color: #008c02'>Your message has been sent successfully!</h1>
<font size='5'>Now it's your turn!<br><a href='register.php'>Create an account</a>, receive anonymous messages and make fun. <b>It's completely FREE</b></font>
<hr>#StayHome<br>#StaySafe<br>
</center></division>
<?php include "footer.php" ?>

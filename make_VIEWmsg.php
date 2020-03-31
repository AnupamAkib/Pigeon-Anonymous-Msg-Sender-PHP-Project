<?php include $_SERVER['DOCUMENT_ROOT']."/header.php" ?>
<?php
$dta = array_fill(0, 1000, 0);
$cnt = 0;
$file = fopen("DaTaZZZ.txt", "r");
while(!feof($file)) {
    $x=fgets($file);
    $dta[$cnt]=$x;
    $cnt++;
}
fclose($file);


if(isset($_SESSION['usernm'])==false){
    echo "<script> window.location.href='/login.php' </script>";
}
else if(rtrim($_SESSION['usernm']) != rtrim($dta[0])){
    echo "<script> window.location.href='/login.php' </script>";
}

$msg_cnt=0;
if(file_exists("MsGg.txt")){
    $file = fopen("MsGg.txt", "r");
    while(!feof($file)) {
    	$x=fgets($file);
        $msg_cnt++;
    }
    fclose($file);
    $msg_cnt = ($msg_cnt-1)/2;
}
?>
	
<title>Pigeon | All Messages</title>
<center><h1>WELCOME, <?php echo $_SESSION['usernm'] ?>!</h1>

<div class='profile_link'>Your Profile Link: <br><a style="text-decoration:none; color:white; font-size:22px;" href="/u/<?php echo $_SESSION['usernm'] ?>" target="_blank">http://pigeonbd.ml<br>/u/<?php echo $_SESSION['usernm'] ?></a><br><br>
<a href="https://www.facebook.com/sharer/?u=http://pigeonbd.ml/u/<?php echo $_SESSION['usernm']?>" class="share" target='_blank'><i class='fa fa-facebook-square' style='color:#fff; font-size:28px;'></i> Share My Profile</a></button><br>
</div><br>
<h1>All messages (<?php echo $msg_cnt ?>)</h1>Touch the message to view full screen</center>
<div class='divisionTWO'>

<?php
if(isset($_POST['out'])){
    unset($_SESSION['usernm']);
    unset($_SESSION['passwd']);
    unset($_POST['out']);
    echo "<script> window.location.href='/login.php' </script>";
}

$all = array_fill(0, 1000, 0);
$cnt = 0;
if(!file_exists("MsGg.txt")){
    echo "<center><h2 style='color:#000'>Opps! No message yet</h2>Share your profile to get message from other!</center>";
}
else{
    $file = fopen("MsGg.txt", "r");
    while(!feof($file)) {
        $x=fgets($file);
        $all[$cnt]=$x;
        $cnt++;
    }
    fclose($file);

    for($i=$cnt-3; $i>=0; $i=$i-2){
        echo "<div class='msgBody' onclick='openX()'><i class='fa fa-envelope-o' style='font-size:22px'></i> <b>MESSAGE</b> to <b>".$dta[0]."</b><br><i class='fa fa-clock-o' style='font-size:25px'></i> ".$all[$i+1]."<hr><font size='5'>".$all[$i]."</font><br><br><b>- Someone</b></div><br>";
    }
}
?>
<button class='cross' id='xx' onclick='closeX()'>CLOSE</button>
<script>
	function openX(){
		document.getElementById('xx').style = "display:block";
	}
	function closeX(){
		document.getElementById('xx').style = "display:none";
	}
</script>
</div>
<div align='center' style='margin:10px;' class='lout'>
<form method='POST'><button class='logout' type='submit' name='out'><i class='fa fa-sign-out' style='font-size:21px'></i> LOGOUT</button></form>
</div>
<?php include $_SERVER['DOCUMENT_ROOT']."/footer.php" ?>










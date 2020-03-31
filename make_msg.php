<?php
function make_SUCCESS($username, $message){
    $f = fopen($_SERVER['DOCUMENT_ROOT'] . "/u/".$username."/MsGg.txt", "a+") or die('cannot open the file');

    $message = str_replace(array("\n", "\r"), ' ', $message);
    date_default_timezone_set('Asia/Dhaka');
    $time = date("h").":".date("i")."".date("a")." | ". date("d/m/y");
    fwrite($f, rtrim($message)."\n".$time."\n");
    fclose($f);
}
function send_notification($username){
	$cnt = 0;
    $file = fopen("DaTaZZZ.txt", "r");
    while(!feof($file)) {
        $x=fgets($file);
        $dta[$cnt]=$x;
        $cnt++;
    }
    fclose($file);
    if(rtrim($dta[2])!="null"){
    	$em = rtrim($dta[2]);
        $notification = "Hey ".$username.", You have one unread new anonymous message in Pigeon. Check it now!!";
    	mail($em, "You have 1 new message on PIGEON", $notification);
    }
}

if(isset($_POST['btn'])){
    $msg = $_POST['msg'];
    $u = basename(dirname($_SERVER['PHP_SELF']));
    make_SUCCESS($u, $msg);
    send_notification($u);
    $_SESSION['sent'] = true;
    echo "<script> window.location.href='/success.php'</script>";
}
?>

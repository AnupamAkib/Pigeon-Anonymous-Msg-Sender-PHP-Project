<?php include $_SERVER['DOCUMENT_ROOT']."/header.php" ?>

<?php
$all = array_fill(0, 1000, 0);
$cnt = 0;
$file = fopen("USERNAMES.txt", "r");
while(!feof($file)) {
    $x=fgets($file);
    $all[$cnt]=$x;
    $cnt++;
}
fclose($file);
$flag=1;
if(isset($_POST['submit'])){
    for($i=0; $i<$cnt; $i+=2){
        if(rtrim($all[$i]) == rtrim($_POST['user']) && rtrim($all[$i+1]) == rtrim($_POST['pass'])){
            $flag=0;
            $u = $_POST['user'];
            $_SESSION['usernm'] = $u;
            $p = $_POST['pass'];
            $_SESSION['passwd'] = $p;
            echo "<script> window.location.href='u/". $_POST['user'] ."/view_message.php'</script>";
            break;
        }
    }
    if($flag==1){
        echo "<div class='error'>Sorry, username or password didn't match. Try again!</div>";
    }
}
?>

<title>Pigeon | Login to view messages</title>
<div class='division'>
<h1>View Messages</h1>
<form method='POST' autocomplete="on">
    <input style='border-radius:8px 8px 0px 0px' class='txtfield' placeholder="Username" type='text' name='user' autocomplete="on" required><br>
    <input style='border-radius:0px 0px 8px 8px' class='txtfield' placeholder="Password" type='password' name='pass' required><br>
    <button class='btn' type='submit' name='submit'>LOGIN</button>
</form>
<a style='text-decoration:none; color:darkblue' href='recover.php'>Forgot Password?</a> | <a style='text-decoration:none; color:darkblue' href='register.php'>Signup</a>
</div>

<?php include $_SERVER['DOCUMENT_ROOT']."/footer.php" ?>












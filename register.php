<?php include $_SERVER['DOCUMENT_ROOT']."/header.php" ?>

<?php
function make_INDEX($username){
    $file = fopen($_SERVER['DOCUMENT_ROOT'] . "/u/".$username."/index.php", "a+") or die('cannot open the file');
    echo fwrite($file, "<?php include '".$_SERVER['DOCUMENT_ROOT']."/header.php' ?>");
    echo fwrite($file, "<title>Send ".$username." a secret message using pigeon</title>");
    echo fwrite($file, "<div class='profilebody'><font style='font-size:30px'>Send <b>".$username." </b>an anonymous msg!</font><br>");

    $content = "<div class='division'><form method='POST'><img src='/images/bird.png' width='60px'><br><i class='fa fa-quote-left'></i> Tell me your message.<br>I will bring it to your friend! <i class='fa fa-quote-right'></i><br><textarea name='msg' class='msg' placeholder='Write your secret msg here...' required></textarea><br><button class='btn' name='btn' type='submit'><i class='fa fa-paper-plane'></i> SEND</button></form></div></div>";
    $content .= "<?php include '".$_SERVER['DOCUMENT_ROOT']."/make_msg.php' ?>";
    echo fwrite($file, $content);

    echo fwrite($file, "<?php include '".$_SERVER['DOCUMENT_ROOT']."/footer.php' ?>");

    fclose($file);
}


function make_ViewMSG($username){
    $file = fopen($_SERVER['DOCUMENT_ROOT'] . "/u/".$username."/view_message.php", "a+") or die('cannot open the file');
    echo fwrite($file, "<?php include '".$_SERVER['DOCUMENT_ROOT']."/make_VIEWmsg.php' ?>");
    fclose($file);
}


function make_USER_Data($username, $password, $email){
    $file = fopen($_SERVER['DOCUMENT_ROOT'] . "/u/".$username."/DaTaZZZ.txt", "a+") or die('cannot open the file');
    echo fwrite($file, $username."\n".$password."\n".$email."\n");
    fclose($file);

    $file = fopen("USERNAMES.txt", "a");
    echo fwrite($file, $username."\n".$password."\n");
    fclose($file);
}

//extract all username to check if inputed username is exist or available
$all = array_fill(0, 1000, 0);
$cnt = 0;
$file = fopen("USERNAMES.txt", "r");
while(!feof($file)) {
    $x=fgets($file);
    $all[$cnt]=$x;
    $cnt++;
}
fclose($file);


if(isset($_POST['submit'])){
	if(isset($_POST['test'])){
	
    $space = 0;
    $tmp = "";
    $tmp = rtrim($_POST['user']);
    //check if there is a space in username
    for($i=0; $i<strlen($tmp); $i++){
        if($tmp[$i] == ' '){
            $space = 1;
            break;
        }
    }
    if($space == 1){
        echo "<div class='error'>Space not allowed in username</div>";
    }
    else if($_POST['pass'] != $_POST['cPass']){
        echo "<div class='error'>Password didn't match. Try again!</div>";
    }
    else if(strlen($_POST['pass'])<6){
        echo "<div class='error'>Password should be 6 character at least</div>";
    }
    else{
        $flag = 1;
        for($i=0; $i<$cnt; $i+=2){
            //check username with all registered username
            if(rtrim($all[$i]) == rtrim($_POST['user'])){
                $flag = 0;
                break;
            }
        }
        if($flag == 1){
            //info is OK to registration
            $username = rtrim($_POST['user']);
            $password = $_POST['pass'];
            $email = $_POST['email'];
            if(strlen($email) <= 10){
            	$email = "null";
            }
            else{
            	$ok=0;
            	for($i=0; $i<strlen($email); $i++){
            	    if($email[$i]=='@'){
            	        $ok=1; break;
                    }
                }
                if($ok==0){
                	$email="null";
                }
            }

            mkdir("u/".$username);
            //create all file for the username

            make_INDEX($username);
            make_ViewMSG($username);
            make_USER_Data($username, $password, $email);
            $_SESSION['usernm'] = $username;

            //echo "ok, registration done.";
            echo "<script> window.location.href='u/". $username ."/view_message.php'</script>";

        }
        else{
            echo "<div class='error'>This username is already exist. Try another!</div>";
        }

    }

    } //isset checkbox
    else{
	    echo "<div class='error'>You have to agree with our terms and conditions</div>";
    }
}


?>

<title>Pigeon | Registration</title>

<div class='recommend' id='rec'>
	<i class='fa fa-lightbulb-o' style='font-size:24;'></i> <b>Recommendation: </b>Provide your email address so that we can notify you when a new message will be received.
    <br><center><button class='btn2' onclick='closeR()'>Got it</button></center>
</div>
<script>
	function openR(){
		document.getElementById('rec').style='display:block';
	}
	function closeR(){
		document.getElementById('rec').style='display:none';
	}
	setTimeout("openR()", 1500);
</script>


<div class='division'>
<h1 align='center'>Register</h1>
<form method='POST'>
    <input style='border-radius:8px 8px 0px 0px' class='txtfield' placeholder='Enter username' type='text' name='user' required><br>
    <input class='txtfield' placeholder='Email (not mandatory)' name='email'><br>
    <input class='txtfield' placeholder='Enter password' type='password' name='pass' required><br>
    <input style='border-radius:0px 0px 8px 8px; margin-bottom: 6px' class='txtfield' placeholder='Re-enter username' type='password' name='cPass' required><br>
    <input type="checkbox" name="test" value="ok"> I agree with <a style='text-decoration:none; color:darkblue' href="/conditions.php">Terms & Conditions</a><br>
    <button type='submit' name='submit' class='btn'>REGISTER</button>
</form>
<a style='text-decoration:none; color:darkblue' href='login.php'>Already have an account? Login</a>
</div>


<?php include $_SERVER['DOCUMENT_ROOT']."/footer.php" ?>




















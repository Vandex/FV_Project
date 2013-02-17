<!DOCTYPE HTML><html>
<?php include_once("webfunc.php"); Mysql_Connector($mysql['host'], $mysql['account'], $mysql['password']);
echo '<head><link REL="StyleSheet" href="style.css" type="text/css" />';
	if(isset($_GET['dologuit']) == true){
		echo "<title>Log out</title>";
	}else if((isset($_GET['doregister']) == true) || (isset($_GET['doregistering']) == true)){
		echo "<title>Register</title>";
	}else{
		echo "<title>Menu</title>";
	}
	echo '</head><body><div id="container">';
	if((isset($_GET['dologuit']) == false) && (isset($_GET['doregister']) == false)){
		if((!isset($_POST['button'])) && (!IsLogged())){
			echo InlogForm("Name", "Password", "password", "form1", "dologin", "login.php", "post"); //form
		}else{
			if((isset($_POST['namef'])) && (isset($_POST['passwf']))){
				$name = htmlspecialchars($_POST['namef']);
				$pass = htmlspecialchars($_POST['passwf']);
			}
			if(isset($_POST['dologin']) == true){
				if(GetUser($name, $pass)){
					$_SESSION['logged'] = true;
					$_SESSION['name'] = $name;
					header("Location:index.php");
				}else{
					echo "wrong name or password, <a href='index.php'>go back</a>";
				}

			}else if(isset($_POST['doregistering']) == true){
					NewUser($name, sha1($pass));
					header("Location:index.php");    
			}else{
				if(IsLogged()){
					echo "<a href='index.php'>Go back</a>.<br><br>";
					echo "<a href='login.php?dologuit=1'>Log out</a>.";
				}else{
					header("Location:index.php");
				}
			}
		}
	}else if(isset($_GET['dologuit']) == true){
		if(IsLogged()){
			$_SESSION['logged'] = false;
			echo "Logged out<br/><br/>Go to the <a href='index.php'>main page</a>.";
		}else{
			header("Location:index.php");
		}
	}else{
		if((!isset($_POST['button'])) && (!IsLogged())){ 
			echo "<b>Warning: you need to be accepted by the admin for logging in!<br/>\n".InlogForm("new name", "New password", "text", "form2", "doregistering", "login.php", "post")."<br/>\nGo to the <a href='index.php'>main page</a>.";
		}else{
			header("Location:index.php");
		}
	}
echo '</div></body>'; ?>
</html>
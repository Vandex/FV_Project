<!DOCTYPE HTML><?php require_once("db/db.php"); include_once("webfunc.php"); Mysql_Connector($mysql['host'], $mysql['account'], $mysql['password']); ?>
<html>
	<head>
		<title>Vandooz's Server Website</title>
		<script src="bugtrac.js" langauge="javascript"></script>
		<link REL="StyleSheet" href="style.css" type="text/css" /> <!-- <- waar ben jij? -->
	</head>

	<style>
		#issues {
			min-width:200px;
			min-height:120px;
			margin-top:20px;
			margin-left:10px;
			margin-right:10px;
			margin-bottom:30px;
			padding-top:15px;
			padding-left:10px;
			padding-right:10px;
			padding-bottom:8px;
			background-color:red;
			-moz-border-radius: 20px;
    		-webkit-border-radius: 20px;
    		-khtml-border-radius: 20px;
    		-o-border-radius:20px;
    		border-radius: 20px;
		}
	</style>
	<body>
		<?php 
		if(IsLogged()){
			echo "<center><div style='margin-top:20px;'>Still WIP here, but you can <a href='ts3server://83.84.142.147'>join our teamspeak 3 server</a>!<br/><br/>\n";
			echo "<div id='issues'></div>\n";
			echo "Go to settings (<a href='login.php'>".$_SESSION['name']."</a>)</div></center>\n";
		}else{
			echo "<center><div style='margin-top:20px;'>Still WIP here, but you can 
			<a href='ts3server://83.84.142.147'>join our teamspeak 3 server</a>!<br/><br/><a href='login.php'>Login</a> - <a href='login.php?doregister=1'>Register</a></div></center>";
		}
		?>
	</body>
</html>

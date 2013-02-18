<!DOCTYPE HTML><?php require_once("db/db.php"); include_once("webfunc.php"); Mysql_Connector($mysql['host'], $mysql['account'], $mysql['password']); ?>
	<head>
		<title>FV_Project Website</title>
		<script src="js/bugtrac.js" langauge="javascript"></script>
		<link REL="StyleSheet" href="style.css" type="text/css" /> <!-- <- waar ben jij? -->
	</head>
	<body>
		<?php 
		if(IsLogged()){
			// code
		}else{
			// not logged
		}
		?>
	</body>
</html>

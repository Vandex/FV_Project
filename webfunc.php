<?php require_once("db/db.php"); session_start();

if(!isset($_SESSION['logged'])){
	$_SESSION['logged'] = false;
}

//bugtrac.js
if(isset($_GET['ajax'])){
	if(isset($_GET['q'])){

	}
}

function IsLogged(){
	if($_SESSION['logged'] == true){
		return true;
	}
	return false;
}

function Mysql_Connector($host, $account, $password)
{
	$con = mysql_connect($host, $account, $password);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("website_user", $con);
}

function GetUser($name, $passw)
{
	$mysec = array();
	$result = mysql_query("SELECT * FROM webuser");
	$mysec['accountname'] = mysql_real_escape_string($name);
	$mysec['accountpass'] = mysql_real_escape_string($passw);
	while($p_row = mysql_fetch_array($result))
	{
		if(($p_row['name'] == $mysec['accountname']) && ($p_row['passw'] == sha1($mysec['accountpass'])))
		{
			return true;
		}
	}
	return false;
}

function NewUser($name, $passw)
{
	$mysec = array();
	$mysec['accountname'] = mysql_real_escape_string($name);
	$mysec['accountpass'] = mysql_real_escape_string($passw);
	if(($mysec['accountname'] != "") && ($mysec['accountpass'] != "")){
		mysql_query("INSERT INTO webuser (name, passw) VALUES ('$name', '$passw')");
	}
}

function InlogForm($namef, $passwf, $passwtext, $formname, $submitname, $target, $method){
	$form = '<form name="'.$formname.'" action="'.$target.'" method="'.$method.'">
			<table width="275" border="0">
			  <tr>
				<td width="110">'.$namef.'</td>
				<td width="150"><input name="namef" type="text" /></td>
			  </tr>
			  <tr>
				<td width="110">'.$passwf.'</td>
				<td width="150"><input name="passwf" type="'.$passwtext.'" /></td>
			  </tr>
			  <tr>
				<td><input name="button" type="submit" value="submit" /><input name="'.$submitname.'" type="hidden" value="1"/></td>
			  </tr>
			</table>
			</form>';
	return $form;
}

/*//login:
<form name="form1" action="login.php" method="post">
	<table width="275" border="0">
	  <tr>
		<td width="110">Name</td>
		<td width="150"><input name="naamv" type="text" /></td>
	  </tr>
	  <tr>
		<td width="110">Password</td>
		<td width="150"><input name="passv" type="password" /></td>
	  </tr>
	  <tr>
		<td><input name="button" type="submit" value="submit" /><input name="dologin" type="hidden" value="1"/></td>
	  </tr>
	</table>
</form>

//register:
<b>Warning: you need to be accepted by the admin for logging in!
<form name="form2" action="login.php" method="post">
	<table width="275" border="0">
	  <tr>
		<td width="110">New name</td>
		<td width="150"><input name="naamv" type="text" /></td>
	  </tr>
	  <tr>
		<td width="110">New password</td>
		<td width="150"><input name="passv" type="text" /></td>
	  </tr>
	  <tr>
		<td><input name="button" type="submit" value="submit" /><input name="doregistering" type="hidden" value="1"/></td>
	  </tr>
	</table>
</form>*/
?>
<?php
session_start();
require('connexion.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{

$login=$_POST['login'];
$password=$_POST['password'];
if(!empty($login)&& !empty($password))
{
	$req="SELECT * FROM comptes WHERE login='$login' AND password='$password'";
	$result=$bd->query($req);
	$lign=$result->fetch(PDO::FETCH_ASSOC);
     if(!empty($lign))
     {
     	$_SESSION['user']=$login;
     	header('location:consulter.php');
     }
     else{
     	echo "Champ erronée";
     }
     
}else
{
if(empty($login)||empty($password))
{

	echo 'Champ Vide ';
	

}
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Authentification</title>
	<style type="text/css">
		nav{
			background: grey;
			width: 100%;
			padding: 0.5%;
		}
		table{
			margin-top: 10%;
		}
		
	</style>
</head>
<body>
<nav>
	<h4 align="left">Authentification</h4>
</nav>
<form method="post">
<table border="2" align="center" width="50%">
	<tr><td>Login:</td><td><input type="text" name="login"></td></tr>
		<tr><td>Password:</td><td><input type="password" name="password"></td></tr>
			<tr><td><button type="submit">OK</button></td><td><button type="reset">Reset</button></td></tr>
</table>
</form>
</body>
</html>
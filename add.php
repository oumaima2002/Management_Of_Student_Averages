
<?php 
	session_start();
if(empty($_SESSION['user']))
{
	header('location:index.php');
}
else{
	require("connexion.php");
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$nom=$_POST['nom'];
		$mail=$_POST['mail'];
		$controle=$_POST['controle'];
		$projet=$_POST['projet'];
		$exam=$_POST['exam'];

	$req="INSERT INTO etudiants(nom,email,controle,projet,examen)VALUES('$nom','$mail','$controle','$projet','$exam')";
	$res=$bd->exec($req);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Consultation</title>
	<style type="text/css">
	nav{
			background: grey;
			width: 100%;
			padding: 0.5%;
		}
	ul{
		list-style-type: none;
	}
	ul li{
        display: inline-block;
	   }
	   h4{
	   	background-color: grey;
	   	width: 100%;
	   	padding: 0.2%;
	   }
	   button{
	   	color: Black;
	   	border: 2px;
	   	border-radius: 4px;
	   	width: 40%;
	   }
		</style>
	
</head>
<body>
<nav>
	<ul>
		<li><a href="consulter.php"> Consultation</a>
		</li>
		<li><a href="add.php">Add</a>
		</li>
		<li><a href="signout.php">Sign OUT [<?php echo $_SESSION['user'] ?>]</a>
		</li>
		
	</ul>
</nav>
<h4> Add New Student:</h4>
<form method="post" action="add.php">
	<table width="100%">
		
		<tr><td>NAME:</td><td><input type="text" name="nom"></td></tr>
		<tr><td>Email:</td><td><input type="email" name="mail"></td></tr>
		<tr><td>Controle:</td><td><input type="text" name="controle"></td></tr>
		<tr><td>Projet:</td><td><input type="text" name="projet"></td></tr>
		<tr><td>Examen:</td><td><input type="text" name="exam"></td></tr>

			<tr><td><button type="submit">OK</button></td><td><button type="reset">Reset</button></td></tr>
		
	</table>
</form>
</body>
</html>
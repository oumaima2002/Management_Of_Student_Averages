<?php

session_start();
require("connexion.php");
if(empty($_SESSION['user'])) 
{
	header("location:index.php");
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
		<li><a href="#"> Consultation</a>
		</li>
		<li><a href="add.php">Add</a>
		</li>
		<li><a href="signout.php">Sign OUT [<?php echo $_SESSION['user'] ?>]</a>
		</li>
		
	</ul>
</nav>
<h4> Search:</h4>
<form method="post" action="consulter.php">
	<table width="100%">
		<tr><td>Search Students</td>
			<td>
				<select name="choice">
					<option value="1">All Students
					</option>
					<option value="2">Graduate Students
					</option>
					<option value="3">Non Graduate Students
					</option>
				</select>
			</td>


			<td><button type="submit">Search</button></td></tr>
		
	</table>
</form>
</body>
</html>
<?php 
if($_SERVER['REQUEST_METHOD']=='POST')
{
$choice=$_POST['choice'];
switch ($choice) {
	case '1':
	echo "<table border='2' width='50%'> <tr><td>Id</td> <td>Nom</td><td>Controle</td><td>Projet</td><td>Examen</td><td>Moyen General</td></tr>";
	$req="SELECT * FROM etudiants";
	$resu=$bd->query($req);
	$ligne=$resu->fetchAll(PDO::FETCH_ASSOC);
	
	foreach ($ligne as $key) {
		echo "<tr><td>".$key['id']."</td>"."<td>"."<a href= mailto:".$key['nom']."@gmail.com /a>".$key['nom']."</td>"."<td>".$key['controle']."</td>"."<td>".$key['projet']."</td>"."<td>".$key['examen']."</td>"."<td>".(25*$key['controle']+15*$key['projet']+60*$key['examen'])/(100) ."</td></tr>" ;
		
	}
	echo"</table>";
		break;
	
	
	case '2':
	echo "<table border='2' width='50%'> <tr><td>Id</td> <td>Nom</td><td>Controle</td><td>Projet</td><td>Examen</td><td>Moyen General</td></tr>";
	$req="SELECT * FROM etudiants WHERE (25*controle+15*projet+60*examen)/(100)>=12 ";
	$resu=$bd->query($req);
	$ligne=$resu->fetchAll(PDO::FETCH_ASSOC);
	
	foreach ($ligne as $key) {
		echo "<tr><td>".$key['id']."</td>"."<td ><a href= mailto:".$key['nom']."@gmail.com /a>".$key['nom']."</td>"."<td>".$key['controle']."</td>"."<td>".$key['projet']."</td>"."<td>".$key['examen']."</td>"."<td>".(25*$key['controle']+15*$key['projet']+60*$key['examen'])/(100) ."</td></tr>" ;
		
	}
	echo"</table>";
		break;
		case '3':
		case '2':
	echo "<table border='2' width='50%'> <tr><td>Id</td> <td>Nom</td><td>Controle</td><td>Projet</td><td>Examen</td><td>Moyen General</td></tr>";
	$req="SELECT * FROM etudiants WHERE (25*controle+15*projet+60*examen)/(100)<12 ";
	$resu=$bd->query($req);
	$ligne=$resu->fetchAll(PDO::FETCH_ASSOC);
	
	foreach ($ligne as $key) {
		echo "<tr><td>".$key['id']."</td>"."<td><a href= mailto:".$key['nom']."@gmail.com /a>".$key['nom']."</td>"."<td>".$key['controle']."</td>"."<td>".$key['projet']."</td>"."<td>".$key['examen']."</td>"."<td>".(25*$key['controle']+15*$key['projet']+60*$key['examen'])/(100) ."</td></tr>" ;
		
	}
	echo"</table>";
		break;
}
}
?>
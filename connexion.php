<?php

try{

$bd=new PDO("mysql:host=localhost;dbname=examen",'root','');

}
catch(PDOEXCEPTION $e)
{
	echo 'erreur de connexion'.$e;
}
?>
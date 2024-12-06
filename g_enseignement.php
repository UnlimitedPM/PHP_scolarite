<h3> Gestion des enseignement </h3>
<?php
if(isset($_SESSION['email']) and $_SESSION['role'] == "admin")
{
	$lesClients = selectAllClients(); 

 	require_once ("vues/vue_insert_enseignement.php");

 	if (isset($_POST['Valider']))
 	{
 		insertVehicule($_POST); 
 	}
}
 	$lesVehicules = selectAllVehicules(); 

 	require_once ("vues/vue_enseignement.php");
 ?>
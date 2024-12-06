<?php
if(isset($_SESSION['email']) and $_SESSION['role'] == "admin")
{
	$lesVehicules = selectAllVehicules(); 
	$classe = selectAllclasse();
	
 	require_once ("vues/vue_insert_intervention.php");

 	if (isset($_POST['Valider']))
 	{
 		insertIntervention($_POST); 
 	}
}
 	$lesInterventions = selectAllInterventions(); 

 	require_once ("vues/vue_les_interventions.php");
 ?>
<h3>Gestion des enseignements</h3>

<?php
   $Classes = selectAllClasses();

   require_once ("vues/enseignements/vue_insert.php");

	if (isset($_POST['Rechercher']))
	{
		$mot = $_POST['mot'];
		$Etudiants = searchClients($mot); 
	}
	else{
		$Etudiants = selectAllEtudiants();
	}

	require_once ("vues/enseignements/vue.php");
?>



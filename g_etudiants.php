 <h3>Gestion des étudiants</h3>

 <?php
	$Classes = selectAllClasses();

	require_once ("vues/etudiants/vue_insert.php");

 	if (isset($_POST['Rechercher']))
 	{
 		$mot = $_POST['mot'];
 		$Etudiants = searchClients($mot); 
 	}
 	else{
 		$Etudiants = selectAllEtudiants();
 	}

 	require_once ("vues/etudiants/vue.php");
 ?>



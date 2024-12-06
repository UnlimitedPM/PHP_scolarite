 <h3> Gestion des étudiants</h3>

 <?php
	require_once ("vues/etudiants/vue_insert.php");

 	if (isset($_POST['Rechercher']))
 	{
 		$mot = $_POST['mot'];
 		$Clients = searchClients($mot); 
 	}
 	else{
 		$Clients = selectAllEtudiants();
 	}

 	require_once ("vues/etudiants/vue.php");
 ?>



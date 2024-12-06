 <h3> Gestion des classes</h3>

 <?php
	// require_once ("vues/classes/vue_insert_classe.php");

 	if (isset($_POST['Rechercher']))
 	{
 		$mot = $_POST['mot'];
 		$classes = searchUser($mot); 
 	}
 	else{
 		$classes = selectAllClasses();
 	}
	
 	require_once ("vues/classes/vue_classe.php");
 ?>
 <h3> Gestion des classes</h3>

 <?php
	$Classes = selectAllClasses();

	require_once ("vues/classes/vue_insert.php");
 	require_once ("vues/classes/vue.php");
 ?>
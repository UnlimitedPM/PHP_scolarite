 <h3>Gestion des étudiants</h3>

 <?php
	$Classes = selectAllClasses();
	$Etudiants = selectAllEtudiants();

	require_once ("vues/etudiants/vue_insert.php");
 	require_once ("vues/etudiants/vue.php");
 ?>



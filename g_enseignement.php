<h3>Gestion des enseignements</h3>

<?php
	$Classes = selectAllClasses();
	$Professeurs = selectAllProfesseurs();
   	$Enseignements = selectAllEnseignements();

   	require_once ("vues/enseignements/vue_insert.php");
	require_once ("vues/enseignements/vue.php");
?>



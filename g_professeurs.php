 <h3>Gestion des professeurs</h3>

 <?php
	$Professeurs = selectAllProfesseurs();

	require_once ("vues/professeurs/vue_insert.php");
 	require_once ("vues/professeurs/vue.php");
 ?>



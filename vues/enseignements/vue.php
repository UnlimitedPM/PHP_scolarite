<?php
// Si on post les modifications.
if (isset($_POST['validation_update'])) {
	updateEtudiant($_POST);

	// Redirection pour éviter la resoumission
	header("Location: " . $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']);
	exit();
}
if (isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == "delete") {
	deleteEtudiant($_GET['id']);

	// // Redirection pour éviter la resoumission
	header("Location: $URL_actuelle");
	exit();
}
?>

<h4>Liste des étudiants</h4>

<form method="post" action="">
	Mot de recherche : 
	<input type="text" name="mot" >
	<input type="submit" name="Rechercher" value="Rechercher">
</form>

<br/>

<table border="1">
	<tr>
		<td>Matière</td>
		<td>Nombre d'heures</td>
		<td>Coeff</td>
		<td>Classe</td>
		<td>Professeur</td>
	</tr>
	<?php

	function afficherLigneEtudiant($Etudiant, $URL_actuelle) {
		echo "<tr>";
		echo "<td>".$Etudiant['nom']."</td>";
		echo "<td>".$Etudiant['prenom']."</td>";
		echo "<td>".$Etudiant['email']."</td>";
		echo "<td>".$Etudiant['nom_classe']."</td>";

		echo 
		"<td>
			<a href='index.php{$URL_actuelle}&action=delete&id={$Etudiant['idetudiant']}'>
				<i class='fa-solid fa-trash' style='font-size:50px;'></i>
			</a>
			<a href='index.php{$URL_actuelle}&action=update&id={$Etudiant['idetudiant']}'>
				<i class='fa-solid fa-pen-to-square' style='font-size:50px;'></i>
			</a>
		</td>";

		echo "</tr>";
	}

	foreach ($Etudiants as $Etudiant) {
		if (isset($_GET['action']) && isset($_GET['id'])) {
			// Si on veut modifier et que l'id est égale à celui de l'objet Etudiant en question.
			if ($_GET['action'] == "update" && $_GET['id'] == $Etudiant['idetudiant']) {
				echo "
					<tr>
					<form action='' method='post'>
					<td style='display:none'><input type='text' name='idetudiant_update' value=".$Etudiant['idetudiant']." required/></td>
					<td><input type='text' name='nom_update' value=".$Etudiant['nom']." required/></td>
					<td><input type='text' name='prenom_update' value=".$Etudiant['prenom']." required/></td>
					<td><input type='email' name='email_update' value=".$Etudiant['email']." required/></td>
					<td><select name='idclasse_update'>
				";
					foreach ($Classes as $Classe) {
						if ($Etudiant['nom_classe'] == $Classe['nom']) {
							echo '<option value="'. $Classe['idclasse'] .'" selected>'. $Classe['nom'] .'</option>';
						}
						else {
							echo '<option value="'. $Classe['idclasse'] .'">'. $Classe['nom'] .'</option>';
						}
					}
                echo "</select></td>";
				?>
					<td>
						<button type="submit" name="validation_update" class="submit-button">
							<i class="fa-solid fa-check" style="font-size:50px;color:green;"></i>
						</button>
						</a>
						<a href="index.php<?php echo $URL_actuelle ?>">
							<i class="fa-solid fa-xmark" style="font-size:50px;color:red;"></i>
						</a>
					</td>
					</form></tr>
				<?php
			}
			// Si on veut modifier et que l'id n'est pas égale à celui de l'objet Etudiant en question.
			else {
				afficherLigneEtudiant($Etudiant, $URL_actuelle);
			}
		}
		// Rendu de base.
		else {
			afficherLigneEtudiant($Etudiant, $URL_actuelle);
		}
	}

	?>
</table>

<style>
	.submit-button {
		background-color: transparent;
		border: none;
		cursor: pointer;
    }
</style>
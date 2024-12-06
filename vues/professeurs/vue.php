<?php
// Si on post les modifications.
if (isset($_POST['validation_update'])) {
	updateProfesseur($_POST);

	// Redirection pour éviter la resoumission
	header("Location: " . $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']);
	exit();
}
if (isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == "delete") {
	deleteProfesseur($_GET['id']);

	// // Redirection pour éviter la resoumission
	header("Location: $URL_actuelle");
	exit();
}
?>

<h4>Liste des professeurs</h4>

<br/>

<table border="1">
	<tr>
		<td>Nom</td>
		<td>Prénom</td>
		<td>Diplome</td>
		<td>Actions</td>
	</tr>
	<?php

	function afficherLigneProfesseur($Professeur, $URL_actuelle) {
		echo "<tr>";
		echo "<td>".$Professeur['nom']."</td>";
		echo "<td>".$Professeur['prenom']."</td>";
		echo "<td>".$Professeur['diplome']."</td>";

		echo 
		"<td>
			<a href='index.php{$URL_actuelle}&action=delete&id={$Professeur['idprofesseur']}'>
				<i class='fa-solid fa-trash' style='font-size:50px;'></i>
			</a>
			<a href='index.php{$URL_actuelle}&action=update&id={$Professeur['idprofesseur']}'>
				<i class='fa-solid fa-pen-to-square' style='font-size:50px;'></i>
			</a>
		</td>";

		echo "</tr>";
	}

	foreach ($Professeurs as $Professeur) {
		if (isset($_GET['action']) && isset($_GET['id'])) {
			// Si on veut modifier et que l'id est égale à celui de l'objet Etudiant en question.
			if ($_GET['action'] == "update" && $_GET['id'] == $Professeur['idprofesseur']) {
				echo "
					<tr>
					<form action='' method='post'>
					<td style='display:none'><input type='text' name='idprofesseur_update' value=".$Professeur['idprofesseur']." required/></td>
					<td><input type='text' name='nom_update' value=".$Professeur['nom']." required/></td>
					<td><input type='text' name='prenom_update' value=".$Professeur['prenom']." required/></td>
					<td><input type='diplome' name='diplome_update' value=".$Professeur['diplome']." required/></td>
				";
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
				afficherLigneProfesseur($Professeur, $URL_actuelle);
			}
		}
		// Rendu de base.
		else {
			afficherLigneProfesseur($Professeur, $URL_actuelle);
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
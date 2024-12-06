<?php
// Si on post les modifications.
if (isset($_POST['validation_update'])) {
	updateClasse($_POST);

	// Redirection pour éviter la resoumission
	header("Location: " . $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']);
	exit();
}
if (isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == "delete") {
	deleteClasse($_GET['id']);

	// // Redirection pour éviter la resoumission
	header("Location: $URL_actuelle");
	exit();
}
?>

<h4>Liste des classes</h4>

<br/>

<table border="1">
	<tr>
		<td>Nom</td>
		<td>Prénom</td>
		<td>Diplome</td>
		<td>Actions</td>
	</tr>
	<?php

	function afficherLigneClasse($Classe, $URL_actuelle) {
		echo "<tr>";
		echo "<td>".$Classe['nom']."</td>";
		echo "<td>".$Classe['salle']."</td>";
		echo "<td>".$Classe['diplome']."</td>";

		echo 
		"<td>
			<a href='index.php{$URL_actuelle}&action=delete&id={$Classe['idclasse']}'>
				<i class='fa-solid fa-trash' style='font-size:50px;'></i>
			</a>
			<a href='index.php{$URL_actuelle}&action=update&id={$Classe['idclasse']}'>
				<i class='fa-solid fa-pen-to-square' style='font-size:50px;'></i>
			</a>
		</td>";

		echo "</tr>";
	}

	foreach ($Classes as $Classe) {
		if (isset($_GET['action']) && isset($_GET['id'])) {
			// Si on veut modifier et que l'id est égale à celui de l'objet Etudiant en question.
			if ($_GET['action'] == "update" && $_GET['id'] == $Classe['idclasse']) {
				echo "
					<tr>
					<form action='' method='post'>
					<td style='display:none'><input type='text' name='idclasse_update' value=".$Classe['idclasse']." required/></td>
					<td><input type='text' name='nom_update' value=".$Classe['nom']." required/></td>
					<td><input type='text' name='salle_update' value=".$Classe['salle']." required/></td>
					<td><input type='diplome' name='diplome_update' value=".$Classe['diplome']." required/></td>
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
				afficherLigneClasse($Classe, $URL_actuelle);
			}
		}
		// Rendu de base.
		else {
			afficherLigneClasse($Classe, $URL_actuelle);
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
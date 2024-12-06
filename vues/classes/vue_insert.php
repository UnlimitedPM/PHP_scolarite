<?php
$errors = []; // Tableau pour stocker les erreurs

// Vérification des champs après soumission
if (isset($_POST['Valider'])) {

	// Vérifier si chaque champ est rempli
	if (empty($_POST['nom'])) {
		$errors['nom'] = "Le nom est obligatoire.";
	}
	if (empty($_POST['salle'])) {
		$errors['salle'] = "Le salle est obligatoire.";
	}
	if (empty($_POST['diplome'])) {
		$errors['diplome'] = "Le diplome est obligatoire.";
	}
	
	try {
		// Si pas d'erreurs, traiter les données
		if (empty($errors)) {
			echo "Formulaire soumis avec succès !";
			insertClasse($_POST);
	
			// Redirection pour éviter la resoumission
			header("Location: $URL_actuelle");
			exit();
		}
	} catch (Exception $e) {
		echo 'Erreur innatendue.' . $e;
	}
}
?>

<form method="post" action="">
    <table border="0">
        <tr>
            <td>Nom :</td>
            <td>
                <input type="text" name="nom" value="<?php echo htmlspecialchars($_POST['nom'] ?? ''); ?>">
                <span style="color:red;"><?php echo $errors['nom'] ?? ''; ?></span>
            </td>
        </tr>
        <tr>
            <td>Salle :</td>
            <td>
                <input type="text" name="salle" value="<?php echo htmlspecialchars($_POST['salle'] ?? ''); ?>">
                <span style="color:red;"><?php echo $errors['salle'] ?? ''; ?></span>
            </td>
        </tr>
        <tr>
            <td>Diplôme :</td>
            <td>
                <input type="text" name="diplome" value="">
                <span style="color:red;"><?php echo $errors['diplome'] ?? ''; ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <input type="reset" name="Annuler" value="Annuler">
            </td>
            <td>
                <input type="submit" name="Valider" value="Valider">
            </td>
        </tr>
    </table>
</form>
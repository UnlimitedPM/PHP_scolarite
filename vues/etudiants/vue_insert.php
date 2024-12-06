<?php
$errors = []; // Tableau pour stocker les erreurs

// Vérification des champs après soumission
if (isset($_POST['Valider'])) {

	// Vérifier si chaque champ est rempli
	if (empty($_POST['nom'])) {
		$errors['nom'] = "Le nom est obligatoire.";
	}
	if (empty($_POST['prenom'])) {
		$errors['prenom'] = "Le prénom est obligatoire.";
	}
	if (empty($_POST['email'])) {
		$errors['email'] = "L'email est obligatoire.";
	}
	if (empty($_POST['idclasse'])) {
		$errors['email'] = "La classe est obligatoire.";
	}
	
	try {
		// Si pas d'erreurs, traiter les données
		if (empty($errors)) {
			echo "Formulaire soumis avec succès !";
			// echo "<pre>";
			// print_r($_POST); // Affiche les données
			// echo "</pre>";
			insertEtudiant($_POST); // Exemple d'appel à une fonction d'insertion
	
			// Redirection pour éviter la resoumission
			header("Location: $parametres_URL");
			exit; // Stopper l'exécution
		}
	} catch (Exception $e) {
		echo 'Erreur innatendue.';
		// echo 'Erreur innatendue : <br>' . $e;
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
            <td>Prénom :</td>
            <td>
                <input type="text" name="prenom" value="<?php echo htmlspecialchars($_POST['prenom'] ?? ''); ?>">
                <span style="color:red;"><?php echo $errors['prenom'] ?? ''; ?></span>
            </td>
        </tr>
        <tr>
            <td>Email :</td>
            <td>
                <input type="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                <span style="color:red;"><?php echo $errors['email'] ?? ''; ?></span>
            </td>
        </tr>
		<tr>
            <td>Classe :</td>
            <td>
                <input type="number" name="idclasse" value="<?php echo htmlspecialchars($_POST['idclasse'] ?? ''); ?>">
                <span style="color:red;"><?php echo $errors['idclasse'] ?? ''; ?></span>
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
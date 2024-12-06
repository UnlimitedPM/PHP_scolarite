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
		$errors['idclasse'] = "La classe est obligatoire.";
	}
	
	try {
		// Si pas d'erreurs, traiter les données
		if (empty($errors)) {
			echo "Formulaire soumis avec succès !";
			insertEtudiant($_POST);
	
			// Redirection pour éviter la resoumission
			header("Location: $URL_actuelle");
			exit();
		}
	} catch (Exception $e) {
		echo 'Erreur innatendue.';
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
                <select name="idclasse">
                    <option value="">-- Choisir une classe --</option>
                    <?php foreach ($Classes as $Classe) {
                        if (isset($_POST['idclasse']) && $_POST['idclasse'] == $Classe['idclasse']) {
                            echo '<option value="'. $Classe['idclasse'] .'" selected>'. $Classe['nom'] .'</option>';
                        }
                        else {
                            echo '<option value="'. $Classe['idclasse'] .'">'. $Classe['nom'] .'</option>';
                        }
                    }
                    ?>
                </select>
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
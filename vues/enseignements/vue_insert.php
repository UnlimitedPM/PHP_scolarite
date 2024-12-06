<?php
$errors = []; // Tableau pour stocker les erreurs

// Vérification des champs après soumission
if (isset($_POST['Valider'])) {

	// Vérifier si chaque champ est rempli
	if (empty($_POST['matiere'])) {
		$errors['matiere'] = "La matiere est obligatoire.";
	}
	if (empty($_POST['nbheures'])) {
		$errors['nbheures'] = "Le nombre d'heures est obligatoire.";
	}
	if (empty($_POST['coeff'])) {
		$errors['coeff'] = "Le coeff est obligatoire.";
	}
	if (empty($_POST['idclasse'])) {
		$errors['idclasse'] = "La classe est obligatoire.";
	}
	if (empty($_POST['idprofesseur'])) {
		$errors['idprofesseur'] = "Le professeur est obligatoire.";
	}
	
	try {
		// Si pas d'erreurs, traiter les données
		if (empty($errors)) {
			echo "Formulaire soumis avec succès !";
			insertEnseignement($_POST);
	
			// Redirection pour éviter la resoumission
			header("Location: $URL_actuelle");
			exit();
		}
	} catch (Exception $e) {
		echo 'Erreur innatendue.'. $e;
	}
}
?>

<form method="post" action="">
    <table border="0">
        <tr>
            <td>Matière :</td>
            <td>
                <input type="text" name="matiere" value="<?php echo htmlspecialchars($_POST['matiere'] ?? ''); ?>">
                <span style="color:red;"><?php echo $errors['matiere'] ?? ''; ?></span>
            </td>
        </tr>
        <tr>
            <td>Nombre d'heures :</td>
            <td>
                <input type="number" name="nbheures" value="<?php echo htmlspecialchars($_POST['nbheures'] ?? ''); ?>">
                <span style="color:red;"><?php echo $errors['nbheures'] ?? ''; ?></span>
            </td>
        </tr>
        <tr>
            <td>Coeff :</td>
            <td>
                <input type="number" name="coeff" value="<?php echo htmlspecialchars($_POST['coeff'] ?? ''); ?>">
                <span style="color:red;"><?php echo $errors['coeff'] ?? ''; ?></span>
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
            <td>Professeur :</td>
            <td>
                <select name="idprofesseur">
                    <option value="">-- Choisir une classe --</option>
                    <?php foreach ($Professeurs as $Professeur) {
                        if (isset($_POST['idprofesseur']) && $_POST['idprofesseur'] == $Professeur['idprofesseur']) {
                            echo '<option value="'. $Professeur['idprofesseur'] .'" selected>'. $Professeur['nom'] .'</option>';
                        }
                        else {
                            echo '<option value="'. $Professeur['idprofesseur'] .'">'. $Professeur['nom'] .'</option>';
                        }
                    }
                    ?>
                </select>
                <span style="color:red;"><?php echo $errors['idprofesseur'] ?? ''; ?></span>
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
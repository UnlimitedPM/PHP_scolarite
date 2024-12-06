<?php
// Si on post les modifications.
if (isset($_POST['validation_update'])) {
	updateEnseignement($_POST);

	// Redirection pour éviter la resoumission
	header("Location: " . $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']);
	exit();
}
if (isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == "delete") {
	deleteEnseignement($_GET['id']);

	// // Redirection pour éviter la resoumission
	header("Location: $URL_actuelle");
	exit();
}
?>

<h4>Liste des étudiants</h4>

<!-- Formulaire de recherche -->
<form method="post" action="">
    Mot de recherche : 
    <input type="text" name="mot" >
    <input type="submit" name="Rechercher" value="Rechercher">
</form>

<br/>

<!-- Tableau des enseignements -->
<table border="1">
    <tr>
        <td>Matière</td>
        <td>Nombre d'heures</td>
        <td>Coeff</td>
        <td>Classe</td>
        <td>Professeur</td>
        <td>Actions</td>
    </tr>
    <?php
    // Fonction pour afficher une ligne d'enseignement.
    function afficherLigneEnseignement($Enseignement, $URL_actuelle) {
        echo "<tr>";
        echo "<td>".$Enseignement['matiere']."</td>";
        echo "<td>".$Enseignement['nbheures']."</td>";
        echo "<td>".$Enseignement['coeff']."</td>";
        echo "<td>".$Enseignement['nom_classe']."</td>";
        echo "<td>".$Enseignement['nom_professeur']."</td>";
        echo "<td>
            <a href='index.php{$URL_actuelle}&action=delete&id={$Enseignement['idenseignement']}'>
                <i class='fa-solid fa-trash' style='font-size:50px;'></i>
            </a>
            <a href='index.php{$URL_actuelle}&action=update&id={$Enseignement['idenseignement']}'>
                <i class='fa-solid fa-pen-to-square' style='font-size:50px;'></i>
            </a>
        </td>";
        echo "</tr>";
    }

    // Parcours et affichage des enseignements.
    foreach ($Enseignements as $Enseignement) {
        if (isset($_GET['action']) && isset($_GET['id']) && $_GET['id'] == $Enseignement['idenseignement']) {
            if ($_GET['action'] === "update") {
                echo "<tr><form action='' method='post'>";
                echo "<td style='display:none'><input type='text' name='idenseignement_update' value='".$Enseignement['idenseignement']."' required/></td>";
                echo "<td><input type='text' name='matiere_update' value='".$Enseignement['matiere']."' required/></td>";
                echo "<td><input type='text' name='nbheures_update' value='".$Enseignement['nbheures']."' required/></td>";
                echo "<td><input type='number' name='coeff_update' value='".$Enseignement['coeff']."' required/></td>";
                echo "<td><select name='idclasse_update'>";
                foreach ($Classes as $Classe) {
                    $selected = ($Enseignement['nom_classe'] === $Classe['nom']) ? "selected" : "";
                    echo "<option value='".$Classe['idclasse']."' $selected>".$Classe['nom']."</option>";
                }
                echo "</select></td>";
                echo "<td><select name='idprofesseur_update'>";
                foreach ($Professeurs as $Professeur) {
                    $selected = ($Enseignement['nom_professeur'] === $Professeur['nom']) ? "selected" : "";
                    echo "<option value='".$Professeur['idprofesseur']."' $selected>".$Professeur['nom']."</option>";
                }
                echo "</select></td>";
                echo "<td>
                    <button type='submit' name='validation_update' class='submit-button'>
                        <i class='fa-solid fa-check' style='font-size:50px;color:green;'></i>
                    </button>
                    <a href='index.php{$URL_actuelle}'>
                        <i class='fa-solid fa-xmark' style='font-size:50px;color:red;'></i>
                    </a>
                </td>";
                echo "</form></tr>";
            } else {
                afficherLigneEnseignement($Enseignement, $URL_actuelle);
            }
        } else {
            afficherLigneEnseignement($Enseignement, $URL_actuelle);
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

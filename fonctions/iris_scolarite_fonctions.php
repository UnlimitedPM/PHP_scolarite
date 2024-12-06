<?php
	
	function connexion () {
	    $con = mysqli_connect("localhost","root","","iris_scolarite_jv_23");
	    if ($con ==null) {
	    	echo "Erreur de connexion à la bdd";
	    }
	    return $con; 
	}

	function deconnexion ($con) {
		mysqli_close($con);
	}

	/************************** Fonctions Etudiants ***************/
	function selectAllEtudiants()
	{
		$requete = "SELECT etudiant.*, classe.nom AS nom_classe FROM `etudiant` JOIN classe ON etudiant.idclasse = classe.idclasse";
		$con = connexion (); 
		if ($con) {
			$lesEtudiants = mysqli_query($con, $requete);
		}
		else {
			return null; 
		}
		deconnexion($con);
		return $lesEtudiants; 
	}

	function insertEtudiant($tab)
	{
        $nom = $tab['nom'];
        $prenom = $tab['prenom'];
        $email = $tab['email'];
        $idclasse = $tab['idclasse'];

        $requete = "INSERT INTO etudiant (idetudiant, nom, prenom, email, idclasse) VALUES (
            NULL,
            '$nom',
            '$prenom',
            '$email',
            $idclasse
        );";

		$con = connexion (); 
		if ($con)
		{
		mysqli_query($con, $requete);
		}
		deconnexion($con);
	}

	function updateEtudiant($tab)
	{
		$nom = $tab['nom_update'];
        $prenom = $tab['prenom_update'];
        $email = $tab['email_update'];
        $idclasse = $tab['idclasse_update'];
		$idetudiant = $tab['idetudiant_update'];

		$requete = "UPDATE etudiant SET nom = '$nom', prenom = '$prenom', email = '$email', idclasse = $idclasse WHERE idetudiant = $idetudiant;";

		$con = connexion (); 
		if ($con)
		{
		mysqli_query($con, $requete);
		}
		deconnexion($con);
	}

	function deleteEtudiant($idclient)
	{
		$requete = "DELETE FROM etudiant WHERE `etudiant`.`idetudiant` = ".$idclient; 
		$con = connexion (); 
		if ($con)
		{
		mysqli_query($con, $requete);
		}
		deconnexion($con);
	}

	/************************** Fonctions Professeurs ***************/
	function selectAllProfesseurs()
	{
		$requete = "SELECT * FROM `professeur`";
		$con = connexion (); 
		if ($con) {
			$professeurs = mysqli_query($con, $requete);
		}
		else {
			return null; 
		}
		deconnexion($con);
		return $professeurs; 
	}

	function insertProfesseur($tab)
	{
        $nom = $tab['nom'];
        $prenom = $tab['prenom'];
        $diplome = $tab['diplome'];

        $requete = "INSERT INTO professeur (idprofesseur, nom, prenom, diplome) VALUES (
            NULL,
            '$nom',
            '$prenom',
            '$diplome'
        );";

		$con = connexion (); 
		if ($con)
		{
		mysqli_query($con, $requete);
		}
		deconnexion($con);
	}

	function updateProfesseur($tab)
	{
		$nom = $tab['nom_update'];
        $prenom = $tab['prenom_update'];
        $diplome = $tab['diplome_update'];
		$idprofesseur= $tab['idprofesseur_update'];

		$requete = "UPDATE professeur SET nom = '$nom', prenom = '$prenom', diplome = '$diplome' WHERE idprofesseur = $idprofesseur;";

		$con = connexion (); 
		if ($con)
		{
		mysqli_query($con, $requete);
		}
		deconnexion($con);
	}

	function deleteProfesseur($id)
	{
		$requete = "DELETE FROM professeur WHERE idprofesseur = ".$id; 
		$con = connexion (); 
		if ($con)
		{
		mysqli_query($con, $requete);
		}
		deconnexion($con);
	}

	/**************** Fonctions Users *****************/
	function selectUser ($email, $mdp)
	{
		$requete = " select * from user where email ='".$email
		."' and mdp ='".$mdp."';" ; 
		$con = connexion (); 
		if ($con)
		{
		$resultat = mysqli_query($con, $requete);
		$unUser = mysqli_fetch_assoc($resultat);
		}
		else {
			return null; 
		}
		deconnexion($con);
		return $unUser;
	}

	/************************ Fonctions Classes ***************/
	function selectAllClasses()
	{
		$requete = "select * from classe;"; 
		$con = connexion (); 
		if ($con)
		{
		$classes = mysqli_query($con, $requete);
		}
		else {
			return null; 
		}
		deconnexion($con);
		return $classes; 
	}

	function insertClasse($tab)
	{
        $nom = $tab['nom'];
        $salle = $tab['salle'];
        $diplome = $tab['diplome'];

        $requete = "INSERT INTO classe (idclasse, nom, salle, diplome) VALUES (
            NULL,
            '$nom',
            '$salle',
            '$diplome'
        );";

		$con = connexion (); 
		if ($con)
		{
		mysqli_query($con, $requete);
		}
		deconnexion($con);
	}

	function updateClasse($tab)
	{
		$nom = $tab['nom_update'];
        $salle = $tab['salle_update'];
        $diplome = $tab['diplome_update'];
		$idclasse = $tab['idclasse_update'];

		$requete = "UPDATE classe SET nom = '$nom', salle = '$salle', diplome = '$diplome' WHERE idclasse = $idclasse;";

		$con = connexion (); 
		if ($con)
		{
		mysqli_query($con, $requete);
		}
		deconnexion($con);
	}

	function deleteClasse($id)
	{
		$requete = "DELETE FROM classe WHERE idclasse = ".$id; 
		$con = connexion (); 
		if ($con)
		{
		mysqli_query($con, $requete);
		}
		deconnexion($con);
	}

	/************************** Fonctions Enseignements ***************/
	function selectAllEnseignements()
	{
		$requete = "SELECT enseignement.*, classe.nom AS nom_classe, professeur.nom AS nom_professeur FROM `enseignement` JOIN classe ON enseignement.idclasse = classe.idclasse JOIN professeur ON enseignement.idprofesseur = professeur.idprofesseur";
		$con = connexion (); 
		if ($con) {
			$enseignements = mysqli_query($con, $requete);
		}
		else {
			return null; 
		}
		deconnexion($con);
		return $enseignements; 
	}

	function insertEnseignement($tab)
	{
        $matiere = $tab['matiere'];
        $nbheures = $tab['nbheures'];
        $coeff = $tab['coeff'];
		$idclasse = $tab['idclasse'];
		$idprofesseur = $tab['idprofesseur'];

        $requete = "INSERT INTO enseignement (idenseignement, matiere, nbheures, coeff, idclasse, idprofesseur) VALUES (
            NULL,
            '$matiere',
            $nbheures,
            $coeff,
			$idclasse,
			$idprofesseur
        );";

		$con = connexion (); 
		if ($con)
		{
		mysqli_query($con, $requete);
		}
		deconnexion($con);
	}

	function updateEnseignement($tab)
	{
		$con = connexion();
		if ($con) {
			$idenseignement = (int)$tab['idenseignement_update'];
			$matiere = mysqli_real_escape_string($con, $tab['matiere_update']);
			$nbheures = (int)$tab['nbheures_update'];
			$coeff = (int)$tab['coeff_update'];
			$idclasse = (int)$tab['idclasse_update'];
			$idprofesseur = (int)$tab['idprofesseur_update'];

			$requete = "
				UPDATE enseignement 
				SET 
					matiere = '$matiere', 
					nbheures = $nbheures, 
					coeff = $coeff, 
					idclasse = $idclasse, 
					idprofesseur = $idprofesseur 
				WHERE 
					idenseignement = $idenseignement;
			";

			mysqli_query($con, $requete) or die(mysqli_error($con)); // Affiche l'erreur SQL en cas de problème
			deconnexion($con);
		}
	}

	function deleteEnseignement($id)
	{
		$requete = "DELETE FROM enseignement WHERE idenseignement = ".$id; 
		$con = connexion (); 
		if ($con)
		{
		mysqli_query($con, $requete);
		}
		deconnexion($con);
	}

?>
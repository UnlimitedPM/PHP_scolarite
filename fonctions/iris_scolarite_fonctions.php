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

?>
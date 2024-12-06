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
		$requete = "select * from etudiant ; "; 
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
		$requete = "select * from classe ; "; 
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
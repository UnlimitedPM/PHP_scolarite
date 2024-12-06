<?php
	
	function connexion ()
	{
	    $con = mysqli_connect("localhost","root","","garage_250");
	    if ($con ==null){
	    	echo "Erreur de connexion à la  bdd";
	    }
	    return $con; 
	}
	function deconnexion ($con)
	{
		mysqli_close($con); 
	}
	/************************** Fonctions Client ***************/
	function selectAllClients()
	{
		$requete = "select * from client ; "; 
		$con = connexion (); 
		if ($con)
		{
		$lesClients = mysqli_query($con, $requete);
		
		}
		else {
			return null; 
		}
		deconnexion($con);
		return $lesClients; 
	}
	function insertClient($tab)
	{
		$requete = "insert into client values(null,'".$tab['nom']
		."','".$tab['prenom']."','".$tab['adresse']."','"
		.$tab['email']."','".$tab['mdp']."','".$tab['tel']."');" ; 

		$con = connexion (); 
		if ($con)
		{
		mysqli_query($con, $requete);
		}
		deconnexion($con);
	}

	function deleteClient($idclient)
	{
		$requete = "delete from client where idclient = ".$idclient ; 
		$con = connexion (); 
		if ($con)
		{
		mysqli_query($con, $requete);
		}
		deconnexion($con);
	}

	function selectWhereClient($idclient)
	{
		$requete = "select * from client where idclient = ".$idclient ; 
		$con = connexion (); 
		if ($con)
		{
		$lesClients = mysqli_query($con, $requete);
		$unClient = mysqli_fetch_assoc($lesClients); //recuperer un client sous forme de tableau associatif.
		}
		else {
			return null; 
		}
		deconnexion($con);
		return $unClient; 
	}

	function updateClient($tab)
	{
		$requete = "update client set nom = '".$tab['nom']
		."', prenom = '".$tab['prenom']."', adresse ='"
		.$tab['adresse']."', email = '"
		.$tab['email']."',mdp = '".$tab['mdp']."', tel = '"
		.$tab['tel']."'  where idclient = ".$tab['idclient'] ; 

		$con = connexion (); 
		if ($con)
		{
		mysqli_query($con, $requete);
		}
		deconnexion($con);
	}

	function searchClients($mot)
	{
		$requete = "select * from client where nom like '%".$mot
		."%' or prenom like '%".$mot."%' or adresse like '%".$mot."%' or email like '%".$mot."%' or tel like '%".$mot."%' ; "; 

		$con = connexion (); 
		if ($con)
		{
		$lesClients = mysqli_query($con, $requete);
		}
		else {
			return null; 
		}
		deconnexion($con);
		return $lesClients; 
	}

	function countClients ()
	{
		$requete = " select count(*) as nb from client ; "; 
		$con = connexion (); 
		if ($con)
		{
		$resultat = mysqli_query($con, $requete);
		$nb = mysqli_fetch_assoc($resultat);
		}
		else {
			return null; 
		}
		deconnexion($con);
		return $nb["nb"];
	}
	/************************ Fonctions Technicien ***************/
	function selectAllTechniciens()
	{
		$requete = "select * from technicien ; "; 
		$con = connexion (); 
		if ($con)
		{
		$lesTechniciens = mysqli_query($con, $requete);
		}
		else {
			return null; 
		}
		deconnexion($con);
		return $lesTechniciens; 
	}

	function insertTechnicien($tab)
	{
		$requete = "insert into technicien values(null,'".$tab['nom']
		."','".$tab['prenom']."','".$tab['qualification']."','"
		.$tab['email']."','".$tab['mdp']."','".$tab['tel']."');" ; 

		$con = connexion (); 
		if ($con)
		{
		mysqli_query($con, $requete);
		}
		deconnexion($con);
	}

	function deleteTechnicien($idtechnicien)
	{
		$requete = "delete from technicien where idtechnicien = ".$idtechnicien ; 
		$con = connexion (); 
		if ($con)
		{
		mysqli_query($con, $requete);
		}
		deconnexion($con);
	}

	function selectWhereTechnicien($idtechnicien)
	{
		$requete = "select * from technicien where idtechnicien = ".$idtechnicien ; 
		$con = connexion (); 
		if ($con)
		{
		$lesTechniciens = mysqli_query($con, $requete);
		$unTechnicien = mysqli_fetch_assoc($lesTechniciens); 
		}
		else {
			return null; 
		}
		deconnexion($con);
		return $unTechnicien; 
	}

	function updateTechnicien($tab)
	{
		$requete = "update technicien set nom = '".$tab['nom']
		."', prenom = '".$tab['prenom']."', qualification ='"
		.$tab['qualification']."', email = '"
		.$tab['email']."',mdp = '".$tab['mdp']."', tel = '"
		.$tab['tel']."'  where idtechnicien = ".$tab['idtechnicien'] ; 

		$con = connexion (); 
		if ($con)
		{
		mysqli_query($con, $requete);
		}
		deconnexion($con);
	}

	function searchTechniciens($mot)
	{
		$requete = "select * from technicien where nom like '%".$mot
		."%' or prenom like '%".$mot."%' or qualification like '%".$mot."%' or email like '%".$mot."%' or tel like '%".$mot."%' ; "; 

		$con = connexion (); 
		if ($con)
		{
		$lesClients = mysqli_query($con, $requete);
		}
		else {
			return null; 
		}
		deconnexion($con);
		return $lesClients; 
	}

	function countTechniciens ()
	{
		$requete = " select count(*) as nb from technicien ; "; 
		$con = connexion (); 
		if ($con)
		{
		$resultat = mysqli_query($con, $requete);
		$nb = mysqli_fetch_assoc($resultat);
		}
		else {
			return null; 
		}
		deconnexion($con);
		return $nb["nb"];
	}

	/********************** Fonctions Véhicule ***************/
	function selectAllVehicules()
	{
		$requete = "select * from vehicule ; "; 
		$con = connexion (); 
		if ($con)
		{
		$lesVehicules = mysqli_query($con, $requete);
		}
		else {
			return null; 
		}
		deconnexion($con);
		return $lesVehicules; 
	}

	function selectVehiculesClients($idclient)
	{
		$requete = "select * from vehicule where idclient=".$idclient; 
		$con = connexion (); 
		if ($con)
		{
		$lesVehicules = mysqli_query($con, $requete);
		}
		else {
			return null; 
		}
		deconnexion($con);
		return $lesVehicules; 
	}

	function insertVehicule($tab)
	{
		$requete = "insert into vehicule values(null,'".$tab['matricule']
		."','".$tab['marque']."','".$tab['datecirculation']."','"
		.$tab['nbkm']."','".$tab['idclient']."');" ; 

		$con = connexion (); 
		if ($con)
		{
		mysqli_query($con, $requete);
		}
		deconnexion($con);
	}

	function countVehicules ()
	{
		$requete = " select count(*) as nb from vehicule ; "; 
		$con = connexion (); 
		if ($con)
		{
		$resultat = mysqli_query($con, $requete);
		$nb = mysqli_fetch_assoc($resultat);
		}
		else {
			return null; 
		}
		deconnexion($con);
		return $nb["nb"];
	}
	/********************** Fonctions Intervention ***************/
	function selectAllInterventions()
	{
		$requete = "select * from intervention ; "; 
		$con = connexion (); 
		if ($con)
		{
		$lesInterventions = mysqli_query($con, $requete);
		}
		else {
			return null; 
		}
		deconnexion($con);
		return $lesInterventions; 
	}
	function insertIntervention($tab)
	{
		$requete = "insert into intervention values(null,'".$tab['description']
		."','".$tab['dateinter']."','".$tab['prix']."','"
		.$tab['idvehicule']."','".$tab['idtechnicien']."');" ; 

		$con = connexion (); 
		if ($con)
		{
		mysqli_query($con, $requete);
		}
		deconnexion($con);
	}
	function countInterventions ()
	{
		$requete = " select count(*) as nb from intervention ; "; 
		$con = connexion (); 
		if ($con)
		{
		$resultat = mysqli_query($con, $requete);
		$nb = mysqli_fetch_assoc($resultat);
		}
		else {
			return null; 
		}
		deconnexion($con);
		return $nb["nb"];
	}

	/**************** Fonctions User *****************/
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
?>
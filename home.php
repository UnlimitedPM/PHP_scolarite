<h3> Accueil du site </h3>
<h4> 
	<?php echo "Bienvenue ". $_SESSION['nom']."  ".$_SESSION['prenom']; 
	echo " <br/> Vous avez le rôle : " . $_SESSION['role']; ?> 
</h4>

</br>
<img src="images/ecole.png" height="180" width="320">

</br> 
<p>
Site de gestion de la base de donnée de la Scolarité. 
<br/>
Gestion des Professeurs,des classes et des enseignements.
</p>

<!-- <?php
	$nbClients = countClients (); 
	$nbVehicules = countVehicules(); 
	$nbTechniciens = countTechniciens (); 
	$nbInterventions = countInterventions ();  
?> -->
<br/>
	<h2> Statistiques de la Base de données </h2>
	<table border="1" style="text-align: center">
		<tr> 
			<td> Nombre de clients </td>
			<td> Nombre de Techniciens </td>
			<td> Nombre de Véhicules </td>
			<td> Nombre d'interventions </td>
		</tr>
		<?php
			echo "<tr>";
			echo "<td>".$nbClients."</td>"; 
			echo "<td>".$nbTechniciens."</td>";
			echo "<td>".$nbVehicules."</td>";
			echo "<td>".$nbInterventions."</td>";
			echo "</tr>";
		?>
	</table>
<h4> Liste des Classes</h4>

<form method="post" action="">
Mot de recherche : 
<input type="text" name="mot" >
<input type="submit" name="Rechercher" value="Rechercher">
</form>
<br/>

<table border="1">
	<tr>
		<td> Id Classe : </td>
		<td> Nom de la Classe : </td>
		<td> Salle : </td>
		<td> Diplôme : </td>
		<?php 
		if(isset($_SESSION['email']) and $_SESSION['role'] == "admin")
		{
		echo "<td> Sup / Mod </td>"; 
		}
		?>	
	</tr>
	<?php
	foreach ($lesTechniciens as $unTechnicien) {
		echo "<tr>";
		echo "<td>".$unTechnicien['idclasse']."</td>";
		echo "<td>".$unTechnicien['nom']."</td>";
		echo "<td>".$unTechnicien['salle']."</td>";
		echo "<td>".$unTechnicien['diplome']."</td>";
		echo "<td>";
		if(isset($_SESSION['email']) and $_SESSION['role'] == "admin")
		{
		echo "<a href='index.php?page=2&action=sup&idtechnicien=".$unTechnicien['idtechnicien']."'>"; 
		echo "<img src = 'images/sup.jpg' heigth='40' width='40'>"; 
		echo "</a>"; 

		echo "<a href='index.php?page=2&action=edit&idtechnicien=".$unTechnicien['idtechnicien']."'>"; 
		echo "<img src = 'images/edit.png' heigth='40' width='40'>"; 
		echo "</a>";
		}

		echo "</td>";

		echo "</tr>";
	}

	?>
</table>











<h4> Liste des Professeurs</h4>

<form method="post" action="">
Mot de recherche : 
<input type="text" name="mot" >
<input type="submit" name="Rechercher" value="Rechercher">
</form>
<br/>

<table border="1">
	<tr>
		<td> Id Client</td>
		<td> Nom Client</td>
		<td> Prénom Client</td>
		<td> Email </td>
		<td> Opérations </td>
	</tr>
	<?php
	foreach ($lesClients as $unClient) {
		echo "<tr>";
		echo "<td>".$unClient['idclient']."</td>";
		echo "<td>".$unClient['nom']."</td>";
		echo "<td>".$unClient['prenom']."</td>";
		echo "<td>".$unClient['email']."</td>";
		echo "<td>";

		if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
		{
		echo "<a href='index.php?page=1&action=sup&idclient=".$unClient['idclient']."'>"; 
		echo "<img src = 'images/sup.jpg' heigth='50' width='50'>"; 
		echo "</a>"; 

		echo "<a href='index.php?page=1&action=edit&idclient=".$unClient['idclient']."'>"; 
		echo "<img src = 'images/edit.png' heigth='50' width='50'>"; 
		echo "</a>";
		}
		echo "<a href='index.php?page=1&action=vehicule&idclient=".$unClient['idclient']."'>"; 
		echo "<img src = 'images/v.png' heigth='60' width='60'>"; 
		echo "</a>";

		echo "</td>";
		echo "</tr>";
	}

	?>
</table>
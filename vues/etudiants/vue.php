<h4> Liste des étudiants</h4>

<form method="post" action="">
Mot de recherche : 
<input type="text" name="mot" >
<input type="submit" name="Rechercher" value="Rechercher">
</form>

<br/>

<table border="1">
	<tr>
		<td>Nom</td>
		<td>Prénom</td>
		<td>Email</td>
		<td>Classe</td>
		<td>Actions</td>
	</tr>
	<?php

	echo $parametres_URL;

	foreach ($Clients as $Client) {
		echo "<tr>";
		echo "<td>".$Client['nom']."</td>";
		echo "<td>".$Client['prenom']."</td>";
		echo "<td>".$Client['email']."</td>";
		echo "<td>".$Client['idclasse']."</td>";
		echo "<td>";

		// if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
		// {
		// echo "<a href='index.php?page=1&action=sup&idclient=".$unClient['idclient']."'>";
		?>
			<a href='index.php?page=1&action=sup&idclient="<?php echo $parametres_URL ?>"'>
				<img src='images/sup.jpg' heigth='50' width='50'>
			</a>
		<?php
		// echo "</a>"; 

		// echo "<a href='index.php?page=1&action=edit&idclient=".$unClient['idclient']."'>"; 
		// echo "<img src = 'images/edit.png' heigth='50' width='50'>"; 
		// echo "</a>";
		// }
		// echo "<a href='index.php?page=1&action=vehicule&idclient=".$unClient['idclient']."'>";
		?>
			<a href='index.php?page=1&action=vehicule&idclient="<?php echo $parametres_URL ?>"'>
				<img src='images/v.png' heigth='60' width='60'>
			</a>
		<?php
		// echo "</a>";

		// echo "</td>";
		// echo "</tr>";
	}

	?>
</table>
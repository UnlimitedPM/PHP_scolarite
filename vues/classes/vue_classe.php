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
	</tr>
	<?php
	foreach ($classes as $classe) {
		echo "<tr>";
		echo "<td>".$classe['idclasse']."</td>";
		echo "<td>".$classe['nom']."</td>";
		echo "<td>".$classe['salle']."</td>";
		echo "<td>".$classe['diplome']."</td>";
		echo "<td>";

		// echo "<a href='index.php?page=2&action=sup&idtechnicien=".$classe['idtechnicien']."'>"; 
		echo "<img src = 'images/sup.jpg' heigth='40' width='40'>"; 
		// echo "</a>"; 

		// echo "<a href='index.php?page=2&action=edit&idtechnicien=".$classes['idtechnicien']."'>"; 
		echo "<img src = 'images/edit.png' heigth='40' width='40'>"; 
		// echo "</a>";
		// }

		// echo "</td>";

		// echo "</tr>";
	}

	?>
</table>











<h4> Liste des Matières</h4>

<table border="1">
	<tr>
		<td> Nom du professeur</td>
		<td> Nom de la matière</td>
		<td> La classe</td>
	</tr>
	<?php
	foreach ($lesVehicules as $unVehicule) {
		echo "<tr>";
		echo "<td>".$unVehicule['matricule']."</td>";
		echo "<td>".$unVehicule['marque']."</td>";
		echo "<td>".$unVehicule['datecirculation']."</td>";
		echo "</tr>";
	}

	?>
</table>
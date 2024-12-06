<h4> Liste des Interventions</h4>

<table border="1">
	<tr>
		<td> Id Intervention</td>
		<td> description</td>
		<td> Date intervention</td>
		<td> Prix de l'intervention </td>
		<td> Id Véhicule</td>
		<td> Id Technicien </td>
	</tr>
	<?php
	foreach ($lesInterventions as $uneIntervention) {
		echo "<tr>";
		echo "<td>".$uneIntervention['idintervention']."</td>";
		echo "<td>".$uneIntervention['description']."</td>";
		echo "<td>".$uneIntervention['dateinter']."</td>";
		echo "<td>".$uneIntervention['prix']."</td>";
		echo "<td>".$uneIntervention['idvehicule']."</td>";
		echo "<td>".$uneIntervention['idtechnicien']."</td>";
		echo "</tr>";
	}

	?>
</table>











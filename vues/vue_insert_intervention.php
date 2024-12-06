<h4> Insertion d'une Intervention </h4>
<form method="post" action="">
	<table border="0">
		<tr>
			<td> Description :</td>
			<td>
				<textarea name="description" rows="5" cols="40"></textarea>   
			</td>
		</tr>
		<tr>
			<td> Date Intervention :</td>
			<td>
				<input type="text" name="dateinter">
			</td>
		</tr>
		<tr>
			<td> Prix Intervention :</td>
			<td>
				<input type="text" name="prix"> Euros
			</td>
		</tr>
		<tr>
			<td> ID véhicule:</td>
			<td>
			<select name="idvehicule">
					<?php
					foreach ($lesVehicules as $unVehicule) {
					echo "<option value='".$unVehicule['idvehicule']."'>"; 
					echo $unVehicule['matricule']; 
					echo "</option>";	 
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td> ID Technicien :</td>
			<td>
			<select name="idtechnicien">
					<?php
					foreach ($lesTechniciens as $unTechnicien) {
					echo "<option value='".$unTechnicien['idtechnicien']."'>"; 
					echo $unTechnicien['nom']."  ".$unTechnicien['prenom']; 
					echo "</option>";	 
					}
					?>
				</select>
			</td>
		</tr>
		
		<tr>
			<td> 
<input type="reset" name="Annuler" value="Annuler">
			</td>
			<td>
<input type="submit" name="Valider" value="Valider">
			</td>
		</tr>
	</table>
</form>








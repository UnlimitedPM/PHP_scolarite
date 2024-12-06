<h4> La Classe</h4>
<form method="post" action="">
	<table border="0">
		<tr>
			<td> ID Classe :</td>
			<td>
				<input type="text" name="id" 
			</td>
		</tr>
		<tr>
			<td> Nom de la Classe :</td>
			<td>
				<input type="text" name="nom" 
				value="<?php if($leTechnicien != null) echo $leTechnicien['nom']; ?>" >
			</td>
		</tr>
		<tr>
			<td> Salle :</td>
			<td>
				<input type="text" name="salle"
	value="<?php if($leTechnicien != null) echo $leTechnicien['salle']; ?>">
			</td>
		</tr>
		<tr>
			<td> Diplôme :</td>
			<td>
				<input type="text" name="Diplôme"
	value="<?php if($leTechnicien != null) echo $leTechnicien['Diplôme']; ?>">
			</td>
		</tr>
			<td>
<input type="reset" name="Annuler" value="Annuler">
			</td>
			<td> 
<input type="submit" <?php 
			if($leTechnicien != null) echo 'name="Modifier" value="Modifier"' ; 
			else echo 'name="Valider" value="Valider"'; 
			?>    >
			</td>
		</tr>
	</table>
</form>








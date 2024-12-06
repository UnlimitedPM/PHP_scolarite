<h4> La Classe</h4>
<form method="post" action="">
	<table border="0">
		<?php
		?>
		<tr>
			<td> ID Classe :</td>
			<td>
				<input type="text" name="id" 
				value="<?php if($classe != null) echo $classe['idclasse']; ?>" >
			</td>
		</tr>
		<tr>
			<td> Nom de la Classe :</td>
			<td>
				<input type="text" name="nom" 
				value="<?php if($classe != null) echo $classe['nom']; ?>" >
			</td>
		</tr>
		<tr>
			<td> Salle :</td>
			<td>
				<input type="text" name="salle"
	value="<?php if($classe != null) echo $classe['salle']; ?>">
			</td>
		</tr>
		<tr>
			<td> Diplôme :</td>
			<td>
				<input type="text" name="Diplome"
	value="<?php if($classe != null) echo $classes['Diplome']; ?>">
			</td>
		</tr>
			<td>
<input type="reset" name="Annuler" value="Annuler">
			</td>
			<td> 
<input type="submit" <?php 
			if($classe != null) echo 'name="Modifier" value="Modifier"' ; 
			else echo 'name="Valider" value="Valider"'; 
			?>    >
			</td>
		</tr>
	</table>
</form>
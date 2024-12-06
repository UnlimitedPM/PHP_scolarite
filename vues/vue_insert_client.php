<form method="post" action="">
	<table border="0">
		<tr>
			<td> Nom du Professeur :</td>
			<td>
				<input type="text" name="nom" 
	value="<?php if($leClient != null) echo $leClient['nom']; ?>" >
			</td>
		</tr>
		<tr>
			<td> Prénom du Professeur :</td>
			<td>
				<input type="text" name="prenom"
	value="<?php if($leClient != null) echo $leClient['prenom']; ?>">
			</td>
		</tr>
		<tr>
			<td> Email :</td>
			<td>
				<input type="text" name="email"
	value="<?php if($leClient != null) echo $leClient['email']; ?>" >
			</td>
		</tr>
		<tr>
			<td> Mot de passe :</td>
			<td>
				<input type="password" name="mdp"
	value="<?php if($leClient != null) echo $leClient['mdp']; ?>" >
			</td>
		</tr>
<?php
if($leClient != null) echo "<input type='hidden' name='idclient' 
				value ='".$leClient['idclient']."'>"; 
?>
		<tr>
			<td>
<input type="reset" name="Annuler" value="Annuler">
			</td>
			<td>
<input type="submit" <?php 
			if($leClient != null) echo 'name="Modifier" value="Modifier"' ; 
			else echo 'name="Valider" value="Valider"'; 
			?>    >
			</td>
		</tr>
	</table>
</form>
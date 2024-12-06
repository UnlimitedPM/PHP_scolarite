<?php
	session_start(); // démarrage de la session 
	require_once("fonctions/iris_scolarite_fonctions.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Gestion Scolarité</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Intégration de Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
	<center>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Gestion Scolarité</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<?php
					if (isset($_SESSION['email'])) {
						echo '
							<li class="nav-item"><a class="nav-link" href="index.php?page=0">Index</a></li>
							<li class="nav-item"><a class="nav-link" href="index.php?page=1">Prof</a></li>
							<li class="nav-item"><a class="nav-link" href="index.php?page=5">Étudiant</a></li>
							<li class="nav-item"><a class="nav-link" href="index.php?page=2">Classe</a></li>
							<li class="nav-item"><a class="nav-link" href="index.php?page=3">Enseignement</a></li>
							<li class="nav-item"><a class="nav-link" href="index.php?page=4">Déconnexion</a></li>
						';
					}
					?>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container py-5">
		<h1 class="text-center text-primary mb-4">Bienvenue sur le site de Gestion de la Scolarité</h1>

		<?php
		if (!isset($_SESSION['email'])) {
			require_once("vues/vue_connexion.php");
		}

		if (isset($_POST['SeConnecter'])) {
			$email = $_POST['email']; 
			$mdp = $_POST['mdp']; 
			$unUser = selectUser($email, $mdp); 
			if ($unUser == null) {
				echo '<div class="alert alert-danger text-center">Veuillez vérifier vos identifiants !</div>';
			} else {
				echo '<div class="alert alert-success text-center">Bienvenue '.$unUser['nom'].' '.$unUser['prenom'].'</div>'; 
				$_SESSION['email'] = $unUser['email']; 
				$_SESSION['nom'] = $unUser['nom']; 
				$_SESSION['prenom'] = $unUser['prenom']; 
				$_SESSION['role'] = $unUser['role']; 
				header("Location: index.php?page=0");
			}
		}

		if (isset($_SESSION['email'])) {

			$URL_actuelle = "";
			if (!empty($_SERVER['QUERY_STRING'])) {
				parse_str($_SERVER['QUERY_STRING'], $params);
				// Conserver uniquement le paramètre "page"
				$params = array_intersect_key($params, array_flip(['page']));
				$URL_actuelle = '?' . http_build_query($params);
			}

			if (isset($_GET["page"])) {
				$page = $_GET["page"];
			} else {
				$page = 0; 
			}
			switch ($page) {
				case 0 : require_once("home.php"); break;
				case 1 : require_once("g_clients.php"); break;
				case 2 : require_once("g_classes.php"); break;
				case 3 : require_once("g_enseignement.php"); break;
				case 4 : session_destroy(); header("Location: index.php"); break;
				case 5 : require_once("g_etudiants.php"); break;
			}
		}
		?>
	</div>
	</center>

	<!-- Bootstrap Bundle JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

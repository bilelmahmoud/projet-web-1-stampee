<?php
	$connexion = connexionDB();
		
	/**
	 * Connection avec la base de données
	 */
	function connexionDB() {
		define('DB_HOST', 'localhost');
		define('DB_USER', 'root');
		//define('DB_PASSWORD', 'root');			// MAC
		define('DB_PASSWORD', '');			// Windows

		$laConnexion = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
				
		if (!$laConnexion) {
			// La connexion n'a pas fonctionné
			die('Erreur de connexion à la base de données. ' . mysqli_connect_error());
		}
		
		$db = mysqli_select_db($laConnexion, 'projet-stampee');

		if (!$db) {
			die ('La base de données n\'existe pas.');
		}
		
		mysqli_query($laConnexion, 'SET NAMES "utf8"');
		return $laConnexion;
	}


	/**
	 * Exécute la requête SQL
	 * Si le paramètre $insert est true, retourne l'id de la ressource ajoutée à la db
	 */
	function executeRequete($requete, $insert = false) {
		global $connexion;
		if ($insert) {
			mysqli_query($connexion, $requete);
			return $connexion->insert_id;
		} else {
			$resultats = mysqli_query($connexion, $requete);
			return $resultats;
		}
	}

	function filtrerEncheresParCondition($condition) {
		global $connexion;
	
		try {
			$sql = "SELECT nom, condition FROM encheres WHERE condition = ?";
			$resultats = executeRequete($sql, false, true, [$condition]);
	
			$encheres = mysqli_fetch_all($resultats, MYSQLI_ASSOC);
	
			return $encheres;
		} catch (Exception $e) {
			// Gérer les erreurs de connexion à la base de données
			die("Erreur lors de la récupération des enchères: " . $e->getMessage());
		}
	}

	/**
	 * Retourne la liste des équipes
	 */
	// function getAllEquipes() {
	// 	return executeRequete("SELECT * FROM equipes");		
	// }


	// /**
	//  * Ajoute la nouvelle équipe
	//  */
	// function ajouteEquipe($nom_equipe, $quartier) {
	// 	$query = "INSERT INTO equipes (`nom`, `quartier`) 
	// 			  VALUES ('" . $nom_equipe . "','" . $quartier . "')";
	// 	return executeRequete($query, true);
	// }




	
?>
<?php
session_start() ;
error_reporting(E_ALL);

include ('config.php');
$req = DB::get()->prepare("insert into jeu (jeu_id, nom, genre) values (:jeu_id, :nom, :genre)");

// Utilisation d'un try... catch pour captuer et gérer proprement les erreurs potentielles.
try {
	$req->execute(array(
		'jeu_id' => $_POST['jeu_id'],
		'nom' => $_POST['nom'],
		'genre' => $_POST['genre']
		));
		// redirection
		header('location: ./courses.php');
} catch(PDOException $erreur) {
echo "Erreur ".$erreur->getMessage();
}

?>
</html>


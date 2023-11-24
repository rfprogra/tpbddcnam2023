<?php
session_start() ;
error_reporting(E_ALL);

include ('config.php');
$req = DB::get()->prepare("insert into version_jeu (id_vjeu, jeu, console, langue, version, etat, stock, prix) values (:id_vjeu, :jeu, :console, :langue, :version, :etat, :stock, :prix)");

// Utilisation d'un try... catch pour captuer et gérer proprement les erreurs potentielles.
try {
	$req->execute(array(
		'id_vjeu' => $_POST['id_vjeu'],
		'jeu' => $_POST['jeu'],
		'console' => $_POST['console'],
        'langue' => $_POST['langue'],
        'version' => $_POST['version'],
        'etat' => $_POST['etat'],
        'stock' => $_POST['stock'],
        'prix' => $_POST['prix']
		));
		// redirection
		header('location: ./courses.php');
} catch(PDOException $erreur) {
echo "Erreur ".$erreur->getMessage();
}

?>
</html>


<?php
session_start() ;
error_reporting(E_ALL);

include ('config.php');
$req = DB::get()->prepare("insert into console (console_id, plateforme, version, etat,  stock) values (:console_id, :plateforme, :version ,:etat, :stock)");

// Utilisation d'un try... catch pour captuer et gérer proprement les erreurs potentielles.
try {
	$req->execute(array(
		'console_id' => $_POST['console_id'],
		'plateforme' => $_POST['plateforme'],
		'version' => $_POST['version'],
        
        'stock' => $_POST['stock'],
        'etat' => $_POST['etat']
		));
		// redirection
		header('location: ./courses.php');
} catch(PDOException $erreur) {
echo "Erreur ".$erreur->getMessage();
}

?>
</html>


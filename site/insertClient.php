<?php
session_start() ;
error_reporting(E_ALL);

include ('config.php');
$req = DB::get()->prepare("insert into client ( nom, prenom, adresse, tel) values ( :nom, :prenom, :adresse, :tel)");

// Utilisation d'un try... catch pour captuer et gérer proprement les erreurs potentielles.
try {
	$req->execute(array(
		
		'nom' => $_POST['nom'],
		'prenom' => $_POST['prenom'],
        
        'adresse' => $_POST['adresse'],
        'tel' => $_POST['tel']
		));
		// redirection
		header('location: ./courses.php');
} catch(PDOException $erreur) {
echo "Erreur ".$erreur->getMessage();
}

?>
</html>


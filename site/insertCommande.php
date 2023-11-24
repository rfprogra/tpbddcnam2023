<?php
session_start() ;
error_reporting(E_ALL);

include ('config.php');

$request=DB::get()->prepare("SELECT client_id FROM client Where nom = :nom and prenom = :prenom and adresse = :adresse and tel = :tel");
try {
		$request->execute(array(
		'nom' => $_POST['nom'],
		'prenom' => $_POST['prenom'],
        
        'adresse' => $_POST['adresse'],
        'tel' => $_POST['tel']
		
		));	
        $data=$request->fetch(PDO::FETCH_ASSOC);

			
	} catch(PDOException $erreur) {
		echo "Erreur ".$erreur->getMessage();
	}		
		

$req = DB::get()->prepare("insert into commande 
( client,console,jeu,date_commande,nombre_produit) 
values (:client,:console,:jeu,:date_commande,:nombre )");

// Utilisation d'un try... catch pour captuer et gérer proprement les erreurs potentielles.
try {
	
	if(!isset($data['client_id'])){
		$req->execute(array(
			'console' => $_POST['console'],
			'jeu' => $_POST['jeu'],
			'client'=>NULL,
			'date_commande' => $_POST['date_commande'],
			'nombre' => $_POST['nombre']
		));
	}
	else{
		$req->execute(array(
	'console' => $_POST['console'],
	'jeu' => $_POST['jeu'],
	'client'=>$data['client_id'],
	'date_commande' => $_POST['date_commande'],		
	'nombre' => $_POST['nombre']
	));
	}
	
	
// redirection

} catch(PDOException $erreur) {
	echo "Erreur ".$erreur->getMessage();
}
if(!isset($data['client_id'])){
	$query=DB::get()->prepare(
					"update client 
					set nom =:nom, prenom =:prenom, adresse=:adresse, tel=:tel
					where client_id = (select max(client_id) from client) "
				);
	try {
			$query->execute(array(
				'nom' => $_POST['nom'],	
				'prenom' => $_POST['prenom'],
				
				'adresse' => $_POST['adresse'],
				'tel' => $_POST['tel']
				
				));
				// redirection
		} catch(PDOException $erreur) {
		echo "Erreur ".$erreur->getMessage();
		}
}
		// redirection


header('location: ./courses.php');

?>
</html>


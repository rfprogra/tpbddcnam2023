<?php
// Vérifiez si l'identifiant du cours a été passé via POST.
if(isset($_POST['client_id'])) {
    // Inclure votre fichier de configuration de base de données.
    include('config.php');

    // Récupérer l'identifiant du cours à supprimer depuis le formulaire.
    $client_id = $_POST['client_id'];

    try {
        
        $stmt = DB::get()->prepare('DELETE FROM commande WHERE client = :client_id');
        $stmt->bindParam(':client_id', $client_id);
        $stmt->execute();

        // Préparez et exécutez la requête de suppression.
        $stmt = DB::get()->prepare('DELETE FROM client WHERE client_id = :client_id');
        $stmt->bindParam(':client_id', $client_id);
        $stmt->execute();

        // Redirigez l'utilisateur vers la page principale après la suppression.
        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        // En cas d'erreur, vous pouvez la gérer ici.
        echo 'Erreur lors de la suppression du cours : ' . $e->getMessage();
    }
} else {
    // Si l'identifiant du cours n'a pas été passé via POST, redirigez l'utilisateur vers la page principale.
    header('Location: index.php');
    exit();
}
?>

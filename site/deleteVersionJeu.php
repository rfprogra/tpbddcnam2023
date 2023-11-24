<?php
// Vérifiez si l'identifiant du cours a été passé via POST.
if(isset($_POST['id_vjeu'])) {
    // Inclure votre fichier de configuration de base de données.
    include('config.php');

    // Récupérer l'identifiant du cours à supprimer depuis le formulaire.
    $id_vjeu = $_POST['id_vjeu'];

    try {
        $stmt = DB::get()->prepare('DELETE FROM commande WHERE id_vjeu = :id_vjeu');
        $stmt->bindParam(':id_vjeu', $id_vjeu);
        $stmt->execute();


        // Préparez et exécutez la requête de suppression.
        $stmt = DB::get()->prepare('DELETE FROM version_jeu WHERE id_vjeu = :id_vjeu');
        $stmt->bindParam(':id_vjeu', $id_vjeu);
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

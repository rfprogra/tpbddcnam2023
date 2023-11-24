<?php
// Vérifiez si l'identifiant du cours a été passé via POST.
if(isset($_POST['console_id'])) {
    // Inclure votre fichier de configuration de base de données.
    include('config.php');

    // Récupérer l'identifiant du cours à supprimer depuis le formulaire.
    $console_id = $_POST['console_id'];

    try {
        // D'abord, supprimez les références dans la table COURSE_TEACHER
        $stmt = DB::get()->prepare('DELETE FROM version_jeu WHERE console = :console_id');
        $stmt->bindParam(':console_id', $console_id);
        $stmt->execute();

        // Préparez et exécutez la requête de suppression.
        $stmt = DB::get()->prepare('DELETE FROM console WHERE console_id = :console_id');
        $stmt->bindParam(':console_id', $console_id);
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

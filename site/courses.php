<?php
// initialisation de la session
// INDISPENSABLE À CETTE POSITION SI UTILISATION DES VARIABLES DE SESSION.
session_start();
error_reporting(E_ALL);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours disponibles</title>
    
    <!-- Inclure le fichier CSS de Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <!-- Inclure le fichier JavaScript de Bootstrap (et jQuery, qui est requis) -->
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <?php
    include('config.php');
    // On appelle la méthode statique get() de la classe DB qui renvoie une instance du PDO.
   // $request = DB::get()->query('select * from jeu');
    ?>


<h1 class="mb-4">Liste des jeux disponibles</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Genre</th>
            <th>Version</th>
            <th>Plateforme</th> <!-- Ajout de la colonne Enseignant -->
        </tr>
    </thead>
    <tbody>
        <?php
        // On récupère les données en utilisant une jointure entre COURSE et COURSE_TEACHER
        $query = 'SELECT vj.id_vjeu, vj.version, vj.prix, j.nom , j.genre , c.plateforme
                  FROM version_jeu vj
                  LEFT JOIN jeu j ON vj.jeu = j.jeu_id
                  LEFT JOIN console c ON vj.console = c.console_id'
                  ;
                  
        $request = DB::get()->query($query);

        while ($data = $request->fetch()) {
            ?>
            <tr>
                <td><?php echo $data['id_vjeu']; ?></td>
                <td><?php echo $data['nom']; ?></td>
                <td><?php echo $data['genre']; ?></td>
                <td><?php echo $data['version']; ?></td>
                <td><?php echo $data['plateforme']; ?></td>   
                <td>
                    <form method="post" action="deleteVersionJeu.php" style="display: inline;">
                        <input type="hidden" name="id_vjeu" value="<?php echo $data['id_vjeu']; ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php
        }
        $request->closeCursor();
        ?>
    </tbody>
</table>

<h1 class="mb-4">Liste des clients</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Télephone</th> <!-- Ajout de la colonne Enseignant -->
        </tr>
    </thead>
    <tbody>
        <?php
        // On récupère les données en utilisant une jointure entre COURSE et COURSE_TEACHER
        $query = 'SELECT c.client_id, c.nom, c.prenom, c.adresse, c.tel
                  FROM client c'          
                  ;
                  
        $request = DB::get()->query($query);

        while ($data = $request->fetch()) {
            ?>
            <tr>
                <td><?php echo $data['client_id']; ?></td>
                <td><?php echo $data['nom']; ?></td>
                <td><?php echo $data['prenom']; ?></td>
                <td><?php echo $data['adresse']; ?></td>
                <td><?php echo $data['tel']; ?></td>   
                <td>
                    <form method="post" action="deleteClient.php" style="display: inline;">
                        <input type="hidden" name="client_id" value="<?php echo $data['client_id']; ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php
        }
        $request->closeCursor();
        ?>
    </tbody>
</table>

<h1 class="mb-4">Liste des jeux </h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Genre</th>

        </tr>
    </thead>
    <tbody>
        <?php
        // On récupère les données en utilisant une jointure entre COURSE et COURSE_TEACHER
        $query = 'SELECT  j.jeu_id, j.nom , j.genre 
                  FROM jeu j'
                  ;
                  
        $request = DB::get()->query($query);

        while ($data = $request->fetch()) {
            ?>
            <tr>
                <td><?php echo $data['jeu_id']; ?></td>
                <td><?php echo $data['nom']; ?></td>
                <td><?php echo $data['genre']; ?></td>   
                <td>
                    <form method="post" action="deleteJeu.php" style="display: inline;">
                        <input type="hidden" name="jeu_id" value="<?php echo $data['jeu_id']; ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer le jeu</button>
                    </form>
                </td>
            </tr>
            <?php
        }
        $request->closeCursor();
        ?>
    </tbody>

</table>

<h1 class="mb-4">Liste des consoles </h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Version</th>
            <th>Plateforme</th>
            <th>Etat</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // On récupère les données en utilisant une jointure entre COURSE et COURSE_TEACHER
        $query = 'SELECT  c.console_id, c.version , c.plateforme, c.etat 
                  FROM console c'
                  ;
                  
        $request = DB::get()->query($query);

        while ($data = $request->fetch()) {
            ?>
            <tr>
                <td><?php echo $data['console_id']; ?></td>
                <td><?php echo $data['version']; ?></td>
                <td><?php echo $data['plateforme']; ?></td>   
                <td><?php echo $data['etat']; ?></td> 
                <td>
                    <form method="post" action="deleteConsole.php" style="display: inline;">
                        <input type="hidden" name="console_id" value="<?php echo $data['console_id']; ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer la console</button>
                    </form>
                </td>
            </tr>
            <?php
        }
        $request->closeCursor();
        ?>
    </tbody>
</table>

<h1 class="mb-4">Liste des jeux disponibles</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Genre</th>
            <th>Version</th>
            <th>Plateforme</th> <!-- Ajout de la colonne Enseignant -->
        </tr>
    </thead>
    <tbody>
        <?php
        // On récupère les données en utilisant une jointure entre COURSE et COURSE_TEACHER
        $query = 'SELECT vj.id_vjeu, vj.version, vj.prix, j.nom , j.genre , c.plateforme
                  FROM version_jeu vj
                  LEFT JOIN jeu j ON vj.jeu = j.jeu_id
                  LEFT JOIN console c ON vj.console = c.console_id'
                  ;
                  
        $request = DB::get()->query($query);

        while ($data = $request->fetch()) {
            ?>
            <tr>
                <td><?php echo $data['id_vjeu']; ?></td>
                <td><?php echo $data['nom']; ?></td>
                <td><?php echo $data['genre']; ?></td>
                <td><?php echo $data['version']; ?></td>
                <td><?php echo $data['plateforme']; ?></td>   
                <td>
                    <form method="post" action="deleteVersionJeu.php" style="display: inline;">
                        <input type="hidden" name="id_vjeu" value="<?php echo $data['id_vjeu']; ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php
        }
        $request->closeCursor();
        ?>
    </tbody>
</table>
<h1 class="mb-4">Liste des commandes</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>client</th>
            <th>client nom</th>
            <th>jeu</th>
            <th>console</th>
            <th>nombre produit</th>
            <th>date commande</th>
            <th>date livraison</th> <!-- Ajout de la colonne Enseignant -->
        </tr>
    </thead>
    <tbody>
        <?php
        // On récupère les données en utilisant une jointure entre COURSE et COURSE_TEACHER
        $query = 'SELECT cm.commande_id, cm.client, j.nom as jnom, co.plateforme, cl.nom as cnom, cm.date_livraison,cm.nombre_produit, cm.date_commande
                  FROM commande cm
                  LEFT JOIN version_jeu vj ON vj.id_vjeu= cm.jeu 
                  LEFT JOIN  jeu j ON  j.jeu_id=vj.jeu
                  LEFT JOIN client cl ON cm.client=cl.client_id
                  LEFT JOIN console co ON cm.console= co.console_id'
                  ;
                  
        $request = DB::get()->query($query);

        while ($data = $request->fetch()) {
            ?>
            <tr>
                <td><?php echo $data['commande_id']; ?></td>
                <td><?php echo $data['client']; ?></td>
                <td><?php echo $data['cnom']; ?></td>
                <td><?php echo $data['jnom']; ?></td>
                <td><?php echo $data['plateforme']; ?></td>   
                <td><?php echo $data['nombre_produit']; ?></td>  
                <td><?php echo $data['date_commande']; ?></td>  
                <td><?php echo $data['date_livraison']; ?></td>  
                <td>
                    <form method="post" action="deleteCommande.php" style="display: inline;">
                        <input type="hidden" name="commande_id" value="<?php echo $data['commande_id']; ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php
        }
        $request->closeCursor();
        ?>
    </tbody>
</table>


    <!-- Formulaire Bootstrap -->
    <form method="post" action="insertJeu.php" class="mt-4">
        <h2>Ajout d'un jeu</h2>
        <div class="mb-3">
            <label for="jeu_id" class="form-label">Id :</label>
            <input type="text" class="form-control" id="jeu_id" name="jeu_id">
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom">
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre :</label>
            <input class="form-control" id="genre" name="genre"></input>
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>

     <!-- Formulaire Bootstrap -->
     <form method="post" action="insertVersionJeu.php" class="mt-4">
        <h2>Ajout version d'un jeu</h2>
        <div class="mb-3">
            <label for="id_vjeu" class="form-label">Id :</label>
            <input type="text" class="form-control" id="id_vjeu" name="id_vjeu">
        </div>
        <div class="mb-3">
            <label for="jeu" class="form-label">Jeu :</label>
            <input type="text" class="form-control" id="jeu" name="jeu">
        </div>
        <div class="mb-3">
            <label for="console" class="form-label">Console :</label>
            <input type="text" class="form-control" id="console" name="console">
        </div>
        <div class="mb-3">
            <label for="langue" class="form-label">Langue :</label>
            <input class="form-control" id="langue" name="langue"></input>
        </div>
        <div class="mb-3">
            <label for="version" class="form-label">Version :</label>
            <input class="form-control" id="version" name="version"></input>
        </div>
        <div class="mb-3">
            <label for="etat" class="form-label">Etat :</label>
            <input class="form-control" id="etat" name="etat"></input>
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix :</label>
            <input class="form-control" id="prix" name="prix" value=0></input>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock :</label>
            <input class="form-control" id="stock" name="stock" value=0></input>
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>

    <!-- Formulaire Bootstrap -->
    <form method="post" action="insertConsole.php" class="mt-4">
        <h2>Ajout d'une console</h2>
        <div class="mb-3">
            <label for="console_id" class="form-label">Id :</label>
            <input type="text" class="form-control" id="console_id" name="console_id">
        </div>
        <div class="mb-3">
            <label for="plateforme" class="form-label">Plateforme :</label>
            <input class="form-control" id="plateforme" name="plateforme"></input>
        </div>
        <div class="mb-3">
            <label for="version" class="form-label">Version :</label>
            <input class="form-control" id="version" name="version"></input>
        </div>
        <div class="mb-3">
            <label for="etat" class="form-label">Etat :</label>
            <input class="form-control" id="etat" name="etat"></input>
        </div>
        
        <div class="mb-3">
            <label for="stock" class="form-label">Stock :</label>
            <input class="form-control" id="stock" name="stock" value=0 type="number"></input>
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>

    <!-- Formulaire Bootstrap -->
    <form method="post" action="insertClient.php" class="mt-4">
        <h2>Ajout d'un client</h2>
        
        <div class="mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input class="form-control" id="nom" name="nom"></input>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prenom :</label>
            <input class="form-control" id="prenom" name="prenom"></input>
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse :</label>
            <input class="form-control" id="adresse" name="adresse"></input>
        </div>
        
        <div class="mb-3">
            <label for="tel" class="form-label">Tel :</label>
            <input class="form-control" id="tel" name="tel" value=0 type="number"></input>
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>

    <!-- Formulaire Bootstrap -->
    <form method="post" action="insertCommande.php" class="mt-4">
        <h2>Ajout d'une commande</h2>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom client:</label>
            <input class="form-control" id="nom" name="nom"></input>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prenom client :</label>
            <input class="form-control" id="prenom" name="prenom"></input>
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse client:</label>
            <input class="form-control" id="adresse" name="adresse"></input>
        </div>
        
        <div class="mb-3">
            <label for="tel" class="form-label">Tel client:</label>
            <input class="form-control" id="tel" name="tel" value=0 type="number"></input>
        </div>
        <div class="mb-3">
            <label for="console" class="form-label">Console:</label>
            <input class="form-control" id="console" name="console" ></input>
        </div>
        <div class="mb-3">
            <label for="jeu" class="form-label">Jeu:</label>
            <input class="form-control" id="jeu" name="jeu" required ></input>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre produits:</label>
            <input class="form-control" id="nombre" name="nombre" type="number"></input>
        </div>
        <div class="mb-3">
            <label for="date_commande" class="form-label">Date commande:</label>
            <input class="form-control" id="date_commande" name="date_commande"  type="date"></input>
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
</div>

</body>
</html>

<script>
    document.getElementById('date_commande').valueAsDate = new Date();
</script>
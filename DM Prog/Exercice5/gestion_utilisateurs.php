<?php
// Ce travail est individuel. Toute forme de plagiat sera sanctionnée.

$data_file = 'utilisateurs.json';

/**
 * Fonction pour lire les utilisateurs depuis le fichier JSON.
 * @return array - Liste des utilisateurs
 */
function lireUtilisateurs() {
    global $data_file;
    return json_decode(file_get_contents($data_file), true);
}

// Affichage des utilisateurs en tableau HTML
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $utilisateurs = lireUtilisateurs();
    echo "<table border='1'><tr><th>Nom</th><th>Prénom</th><th>Email</th></tr>";
    foreach ($utilisateurs as $utilisateur) {
        echo "<tr><td>{$utilisateur['nom']}</td><td>{$utilisateur['prenom']}</td><td>{$utilisateur['email']}</td></tr>";
    }
    echo "</table>";
}

// Ajout d'un utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nouvel_utilisateur = [
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email']
    ];
    $utilisateurs = lireUtilisateurs();
    $utilisateurs[] = $nouvel_utilisateur;
    file_put_contents($data_file, json_encode($utilisateurs));
    header("Location: gestion_utilisateurs.php");
}
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Ajouter un utilisateur</h2>
    <form method="POST">
        <label>Nom :</label><input type="text" name="nom" required><br>
        <label>Prénom :</label><input type="text" name="prenom" required><br>
        <label>Email :</label
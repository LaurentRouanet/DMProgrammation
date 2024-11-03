<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Contact</title>
</head>
<body>


    <h2>Formulaire de Contact</h2>

    <?php
    // Initialisation des variables pour stocker les messages d'erreur et les données du formulaire
    $erreur = '';
    $nom = '';
    $email = '';
    $message = '';

    // Traitement du formulaire lorsqu'il est soumis via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération et validation des champs du formulaire
        $nom = trim($_POST["nom"]);
        $email = trim($_POST["email"]);
        $message = trim($_POST["message"]);

        // Vérification de chaque champ pour s'assurer qu'il est rempli
        if (empty($nom) || empty($email) || empty($message)) {
            $erreur = "Tous les champs sont obligatoires.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erreur = "Adresse email non valide.";
        } else {
            // Affichage des données si tous les champs sont correctement remplis
            echo "<h3>Merci pour votre message !</h3>";
            echo "<p><strong>Nom : </strong>" . htmlspecialchars($nom) . "</p>";
            echo "<p><strong>Email : </strong>" . htmlspecialchars($email) . "</p>";
            echo "<p><strong>Message : </strong><br>" . nl2br(htmlspecialchars($message)) . "</p>";
            exit();
        }
    }
    ?>

    <!-- Affichage du message d'erreur si présent -->
    <?php if ($erreur): ?>
        <p style="color: red;"><?php echo $erreur; ?></p>
    <?php endif; ?>

    <!-- Formulaire de contact -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($nom); ?>" required><br><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required><br><br>

        <label for="message">Message :</label><br>
        <textarea id="message" name="message" required><?php echo htmlspecialchars($message); ?></textarea><br><br>

        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
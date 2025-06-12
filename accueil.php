<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    // Rediriger vers la page de connexion si non connecté
    header("Location: PageConnexion.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
    
    <p>ceci est un test : <?php echo $_SESSION['id']; ?><br>
mon nom est : <?php echo $_SESSION['nom']?>

</p>
</body>
</html>

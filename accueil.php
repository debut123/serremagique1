<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    // Rediriger vers la page de connexion si non connecté
    header("Location: PageConnexion.html");
    exit;
}



try {
    // Paramètres de connexion à la base distante
    $host = 'herogu.garageisep.com';           // Exemple : 'sql8.freemysqlhosting.net'
    $dbname = '8tQjb0ov2H_serre_auto';
    $username = 'CpZoJWSnPV_serre_auto';    // Exemple : '8tQjb0ov2H'
    $password = 'XqUTQ7FjLH2yql3X';   // Mot de passe réel

    // Connexion PDO
    $pdo_dist = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo_dist->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Test simple (à supprimer après validation)
    echo "<p style='color:green;'>Connexion à la base distante réussie </p>";
} catch (PDOException $e) {
    die("<p style='color:red;'>Erreur de connexion à la base distante  : " . $e->getMessage() . "</p>");
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

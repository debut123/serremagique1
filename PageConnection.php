<?php
session_start(); // Démarrer la session
$host = 'db.lhhdtpwficaykinzrlaq.supabase.co';
$port = 5432;
$dbname = 'postgres';
$user = 'postgres';
$password = 'afehz:resliuhbhbmqauh:ghb?';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie !";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';

    // Requête pour récupérer l'utilisateur
    $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE email = ?");
    $stmt->execute([$email]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($utilisateur) {
        // Vérification du mot de passe (en clair — à sécuriser avec password_verify en prod)
        if ($mot_de_passe === $utilisateur['mot_de_passe']) {
            // Stocker les infos dans la session
            $_SESSION['id'] = $utilisateur['id'];
            $_SESSION['nom'] = $utilisateur['nom'];
            $_SESSION['prenom'] = $utilisateur['prenom'];
            $_SESSION['email'] = $utilisateur['email'];
            $_SESSION['role'] = $utilisateur['role'];

            echo "<p style='color:green;'>Connexion réussie. Bienvenue " . htmlspecialchars($_SESSION['prenom']) . " " . htmlspecialchars($_SESSION['nom']) . " !</p>";

            // Redirection possible vers une page d'accueil protégée :
            // header("Location: accueil.php");
            header("Location: Accueil.php");
exit;

            // exit;
        } else {
            echo "<p style='color:red;'>Mot de passe incorrect.</p>";
        }
    } else {
        echo "<p style='color:red;'>Utilisateur introuvable.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="PageConnection.css">

</head>
<body>
    <div class="form-container">
        <h2>Connexion</h2>
        <form method="post" action="PageConnection.php">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required>

            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>

<?php
session_start();

$host = 'aws-0-eu-west-2.pooler.supabase.com'; // IPv4 compatible
$port = 5432;
$dbname = 'postgres';
$user = 'postgres.lhhdtpwficaykinzrlaq'; // bien noter le sous-identifiant ici
$password = 'afehz:resliuhbhbmqauh:ghb?';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à PostgreSQL !";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';

    // Requête pour récupérer l'utilisateur par email
    $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE email = ?");
    $stmt->execute([$email]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($utilisateur) {
        // ⚠️ En production, utilise password_verify au lieu de comparaison en clair
        if ($mot_de_passe === $utilisateur['mot_de_passe']) {
            $_SESSION['id'] = $utilisateur['id'];
            $_SESSION['nom'] = $utilisateur['nom'];
            $_SESSION['prenom'] = $utilisateur['prenom'];
            $_SESSION['email'] = $utilisateur['email'];
            $_SESSION['role'] = $utilisateur['role'];

            header("Location: Accueil.php");
            exit;
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

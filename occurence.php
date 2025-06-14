<?php
try {
    // Informations de connexion adaptées au pooler Supabase (IPv4)
    $host = 'aws-0-eu-west-2.pooler.supabase.com';
    $port = 5432;
    $dbname = 'postgres';
    $user = 'postgres.lhhdtpwficaykinzrlaq'; // Important : inclure le suffixe
    $password = 'afehz:resliuhbhbmqauh:ghb?'; // Ton mot de passe réel

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à PostgreSQL !";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>

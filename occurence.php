<?php
try {
    $pdo = new PDO("pgsql:host=db.lhhdtpwficaykinzrlaq.supabase.co;port=5432;dbname=postgres;sslmode=require", "postgres", "afehz:resliuhbhbmqauh:ghb?");
    echo "Connexion réussie à PostgreSQL !";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

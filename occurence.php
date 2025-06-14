<?php
try {
    $host = 'aws-0-eu-west-2.pooler.supabase.com';
    $port = 5432;
    $dbname = 'postgres';
    $user = 'postgres.lhhdtpwficaykinzrlaq';
    $password = 'afehz:resliuhbhbmqauh:ghb?';

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Connexion réussie à PostgreSQL via Supabase Pooler !";
} catch (PDOException $e) {
    echo "❌ Erreur de connexion : " . $e->getMessage();
}

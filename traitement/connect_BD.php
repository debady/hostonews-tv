<?php 

    // pour les fichiers ou les requet utilie la var $varConnectBD
    $varConnectBD = NEW PDO ('mysql:host=localhost;dbname=bd_hostonews_tv','root','');

    $servername = "localhost";
    $username = "root"; 

    $password = ""; 
    $dbname = "bd_hostonews_tv"; 

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    try {
        $connect = new PDO("mysql:host=localhost;dbname=bd_hostonews_tv;charset=utf8mb4", "root", ""); 
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }


    // pour le fichiers process
    $host = 'localhost';
    $dbname = 'bd_hostonews_tv';

    $username = 'root'; 
    $password = ''; 

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }


?> 

<?php

// Supabase PostgreSQL – IPv4 Compatible (Session Pooler recommandé)
// $host = 'aws-0-eu-west-2.pooler.supabase.com';
// $port = '5432';
// $dbname = 'postgres';
// $user = 'postgres.itxsnurnnvkcqlbpessm';
// $password = 'Deb@dy4470#'; // remplace ici

// try {
//     // Connexion PDO (ex. : pour $pdo ou $varConnectBD)
//     $varConnectBD = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
//     $varConnectBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     $connect = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
//     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     // Connexion mysqli si nécessaire (pas obligatoire si tout est en PDO)
//     $conn = new mysqli($host, $user, $password, $dbname, $port);
//     if ($conn->connect_error) {
//         die("Échec de la connexion : " . $conn->connect_error);
//     }

// } catch (PDOException $e) {
//     die("Erreur de connexion à la base de données : " . $e->getMessage());
// }
?>

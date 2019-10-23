<?php
require_once 'vendor/autoload.php';
session_start();

use App\Config;
use App\Utils;

try {
    $dbConfig = new Config('config/db.ini');

    $dsn = 'mysql:host=' . $dbConfig->host .
            ';dbname=' . $dbConfig->dbname .
            ';charset=' . $dbConfig->charset;

    $pdo = new PDO($dsn, $dbConfig->user, $dbConfig->password);
} catch (Exception $ex) {
    // TODO: générer nouvelle notification d'erreur avant de rediriger vers la page d'accueil
    Utils::redirect('index.php');
}

if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    // TODO: générer une notification d'erreur sur le format de l'adresse email
    Utils::redirect('index.php');
}

$stmt = $pdo->prepare("INSERT INTO newsletter (email) VALUES (:email)");

$res = $stmt->execute([
    'email' => $_POST['email']
]);

var_dump($res);

// TODO: générer notification selon réussite ou échec de la requête

// Enregistrer un message dans la session
// TODO: Vérifier que la clé notifications est bien vide
// Sinon, on va écraser toutes les notifications précédentes
// Donc globalement, on voudra ajouter une notification au tableau
// Mais vérifier qu'il est défini, et s'il ne l'est pas, le créer
// $_SESSION['notifications'] = [
//     'success' => [
//         'Merci, votre email a bien été enregistré',
//         'T bo'
//     ],
//     'info' => [
//         'RGPD : Votre email ne sera pas divulgué pour de la publicité'
//     ]
// ];

// rediriger vers la page d'accueil
//Utils::redirect('index.php');

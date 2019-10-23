<?php
require_once 'vendor/autoload.php';
session_start();

use App\dataBaseConnexion;
use App\Utils;


$pdo = dataBaseConnexion::getInstance($dbConfig);

if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    // TODO: générer une notification d'erreur sur le format de l'adresse email
    console.log('Le format de l\'adresse email n`\'est pas correct.');
    Utils::redirect('index.php');
}

$stmt = $pdo->prepare("INSERT INTO newsletter (email, subscribed) VALUES (:email, :subscribed)");

$res = $stmt->execute([
    'email' => $_POST['email'],
    'subscribed' => true
]);


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
Utils::redirect('index.php');

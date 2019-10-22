<?php
require_once 'vendor/autoload.php';
use App\Utils;

session_start();

// TODO: insérer l'email en db
$dbData = parse_ini_file('.ini', true);

$dbname = $dbData['dbname'];
$login = $dbData['login'];
$pwd = $dbData['pwd'];

$email = $_POST['email'];

try
{
    $db = new PDO('mysql:host=localhost;dbname=' . $dbname . ';charset=utf8', $login, $pwd);
    
    $req = $db->prepare('INSERT INTO newsletter(email, subscribed) VALUES(:email, :subscribed)');

    var_dump($req);

    $req->execute(array(
        'email' => $email,
        'subscribed' => true
    ));

} catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


// Enregistrer un message dans la session
// TODO: Vérifier que la clé notifications est bien vide
// Sinon, on va écraser toutes les notifications précédentes
// Donc globalement, on voudra ajouter une notification au tableau
// Mais vérifier qu'il est défini, et s'il ne l'est pas, le créer

if(empty($_SESSION['notifications'])) {
    $_SESSION['notifications'] = [
        'success' => [
            'Merci, votre email a bien été enregistré',
        ],
        'info' => [
            'RGPD : Votre email ne sera pas divulgué pour de la publicité'
        ]
    ];
}


// rediriger vers la page d'accueil
// TODO: factoriser cette méthode dans une classe utilitaire
Utils::redirect('index.php');

<?php
session_start();

require_once 'data/produits.php';

require_once 'templates/header.php';

foreach ($produits as $produit) {
    if ($produit["homepage"]) {
        require_once 'templates/produit/item-jumbotron.php';
    }
}

require_once 'templates/newsletter/subcription_section.php';

require_once 'templates/footer.php';

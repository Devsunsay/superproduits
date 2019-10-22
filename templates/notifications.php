<?php if (!empty($_SESSION['notifications'])) {
    foreach ($_SESSION['notifications'] as $type => $messages) {
        foreach ($messages as $msg) {
            require __DIR__ . '/notification/item-alert.php';
        }
    }
    $_SESSION['notifications'] = [];
}

<?php
include("./src/controller.php"); // Σκέτη / σε path είναι το root path του σέρβερ 

$action = htmlspecialchars($_GET['action']); // htmlspecialchars μετατρέπει ό,τι βάλει ο χρήστης ως String για να μην εκτελλεί κακόβουλο input
$action = str_replace('auth-button-', '', $action);
$controller = new Controller();

$controller->$action();


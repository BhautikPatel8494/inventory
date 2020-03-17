<?php require_once 'php_action/db_connect.php';
require_once 'vendor/autoload.php';

try {
    $CrispClient = new Crisp();
    $CrispClient->authenticate("53993c8e-9777-4ade-9556-bb5098c1c9b6", "e5060326bd61f1acddc0581424cdc9cccaca63c8f64f60fa0d05a5fb504b1774");

    $profile = $CrispClient->userProfile->get();
    $firstName = $profile["first_name"];
    echo "Hello $firstName";
} catch (\Throwable $th) {
    echo $th;
    throw $th;
}

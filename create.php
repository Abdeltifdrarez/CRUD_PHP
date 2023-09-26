<?php
include 'partials/header.php';
require __DIR__ . '/offres/offres.php';


$offre = [
    'id' => '',
    'sponsor' => '',
    'offre' => '',
    'category' => '',
    'description' => '',
    'website' => '',
    'status' => '',
];

$errors = [
    'sponsor' => "",
    'offre' => "",
    'category' => "",
    'website' => "",
    'status' => '',
];
$isValid = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $offre = array_merge($offre, $_POST);

    $isValid = validateoffre($offre, $errors);

    if ($isValid) {
        $offre = createoffre($_POST);

        uploadImage($_FILES['picture'], $offre);

        header("Location: index.php");
    }
}

?>

<?php include '_form.php' ?>


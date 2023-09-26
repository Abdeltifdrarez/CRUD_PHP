<?php
include 'partials/header.php';
require __DIR__ . '/offres/offres.php';

if (!isset($_GET['id'])) {
    include "partials/not_found.php";
    exit;
}
$offreId = $_GET['id'];

$offre = getOffreById($offreId);
if (!$offre) {
    include "partials/not_found.php";
    exit;
}

$errors = [
    'sponsor' => "",
    'offre' => "",
    'category' => "",
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $offre = array_merge($offre, $_POST);

    $isValid = validateoffre($offre, $errors);

    if ($isValid) {
        $offre = updateOffre($_POST, $offreId);
        uploadImage($_FILES['picture'], $offre);
        header("Location: index.php");
    }
}

?>

<?php include '_form.php' ?>

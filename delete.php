<?php
include 'partials/header.php';
require __DIR__ . '/offres/offres.php';


if (!isset($_POST['id'])) {
    include "partials/not_found.php";
    exit;
}
$offreId = $_POST['id'];
deleteOffre($offreId);

header("Location: index.php");

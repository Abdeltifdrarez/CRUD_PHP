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

?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="p-2 mt-2 d-flex justify-content-center algin-items-center">View offre: <b><?php echo $offre['sponsor'] ?></b></h3>
        </div>
        <div class="card-body d-flex justify-content-center algin-items-center">
            <a class="btn btn-secondary" href="update.php?id=<?php echo $offre['id'] ?>">Update</a>
            <form style="display: inline-block" method="POST" action="delete.php">
                <input type="hidden" name="id" value="<?php echo $offre['id'] ?>">
                <button class="btn btn-danger ml-3">Delete</button>
            </form>
        </div>
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th>Sponsor:</th>
                    <td><?php echo $offre['sponsor'] ?></td>
                </tr>
                <tr>
                    <th>Offre:</th>
                    <td><?php echo $offre['offre'] ?></td>
                </tr>
                <tr>
                    <th>Description:</th>
                    <td><?php echo $offre['description'] ?></td>
                </tr>
                <tr>
                    <th>Status:</th>
                    <td><?php echo $offre['status'] ?></td>
                </tr>
                <tr>
                    <th>Category:</th>
                    <td><?php echo $offre['category'] ?></td>
                </tr>
                <tr>
                    <th>link redirect:</th>
                    <td>
                        <a target="_blank" href="http://<?php echo $offre['website'] ?>">
                            <?php echo $offre['website'] ?>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<?php include 'partials/footer.php' ?>
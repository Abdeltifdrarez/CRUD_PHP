<?php
require 'offres/offres.php';

$offres = getOffres();

include 'partials/header.php';
?>


<div class="container">
    <p>
        <a class="btn btn-success p-2 mt-2" href="create.php">Create new Offre</a>
    </p>

    <table class="table table-hover">
        <thead>
            <tr class="table-primary">
                <th>Image</th>
                <th>Sponsor</th>
                <th>Offre</th>
                <th>category</th>
                <th>Status</th>
                <th>link redirect</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($offres as $offre) : ?>
                <tr>
                    <td>
                        <?php if (isset($offre['extension'])) : ?>
                            <img style="width: 60px" src="<?php echo "offres/images/${offre['id']}.${offre['extension']}" ?>" alt="">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $offre['sponsor'] ?></td>
                    <td><?php echo $offre['offre'] ?></td>
                    <td><?php echo $offre['category'] ?></td>
                    <td><?php echo $offre['status'] ?></td>

                    <td>
                        <a target="_blank" href="http://<?php echo $offre['website'] ?>">
                            <?php echo $offre['website'] ?>
                        </a>
                    </td>
                    <td>
                        <a href="view.php?id=<?php echo $offre['id'] ?>" class="btn btn-sm btn-outline-info">View</a>
                        <a href="update.php?id=<?php echo $offre['id'] ?>" class="btn btn-sm btn-outline-secondary">Update</a>
                        <form method="POST" action="delete.php">
                            <input type="hidden" name="id" value="<?php echo $offre['id'] ?>">
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach;; ?>
        </tbody>
    </table>
</div>

<?php include 'partials/footer.php' ?>
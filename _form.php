<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>
                <?php if ($offre['id']) : ?>
                    Update Offre <b><?php echo $offre['sponsor'] ?></b>
                <?php else : ?>
                    Create new Offre
                <?php endif ?>
            </h3>
        </div>
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data" action="">
                <div class="form-group">
                    <label>Sponsor</label>
                    <input name="sponsor" value="<?php echo $offre['sponsor'] ?>" class="form-control">
                    <div class="invalid-feedback">
                        <?php echo  $errors['sponsor'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Offre</label>
                    <input name="offre" value="<?php echo $offre['offre'] ?>" class="form-control">
                    <div class="invalid-feedback">
                        <?php echo  $errors['offre'] ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <input name="category" value="<?php echo $offre['category'] ?>" class="form-control">
                    <div class="invalid-feedback">
                        <?php echo  $errors['category'] ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="Active">Active</option>
                        <option value="Desactive">Desactive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" value="<?php echo $offre['description'] ?>" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input name="website" value="<?php echo $offre['website'] ?>" class="form-control">
                    <div class="invalid-feedback">
                        <?php echo  $errors['website'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input name="picture" type="file" class="form-control-file">
                </div>

                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>




<!-- 
<div class="form-group">
    <label>Offre</label>
    <input name="offre" value="<?php echo $offre['offre'] ?>" class="form-control <?php echo $errors['offre'] ? 'is-invalid' : '' ?>">
    <div class="invalid-feedback">
        <?php echo  $errors['offre'] ?>
    </div>
</div> -->
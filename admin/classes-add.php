<?php
include('../config/include.php');
require(asset('/config/redirect.php'));

include(asset('controller/controller.php'));

if (isset($_POST['add'])) {
    storeClass($_POST);
}
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $_ENV['APP_NAME'] ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container py-3">
        <header>

            <?php include(asset('/inc/navbar.php')) ?>

            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                <h1 class="display-4 fw-normal">Add Class</h1>
            </div>
        </header>

        <main>
            <form method="post" class="border p-3">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="" value="" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Year</label>
                        <select name="year" class="form-select" aria-label="Default select example" required>
                            <option value="">Please select a year (standard)</option>
                            <?php for ($i=1; $i < 7; $i++) { ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" name="add" class="btn btn-primary">Add</button>
                        <a href="<?= route('admin/classes.php') ?>" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </form>
        </main>

        <?php include(asset('/inc/footer.php')) ?>
    </div>
</body>

</html>
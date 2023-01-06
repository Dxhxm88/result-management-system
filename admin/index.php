<?php
include('../config/include.php');
require(asset('/config/redirect.php'));


include(asset('controller/controller.php'));
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
                <h1 class="display-4 fw-normal">Admin Dashboard, Welcome <?= $_SESSION['name'] ?>!</h1>
            </div>
        </header>

        <main>
            <div class="d-flex justify-content-between">
                <div class="card m-2 flex-fill bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Total Students <span class="badge text-bg-light"><?= getTotalStudents() ?></span></h5>
                    </div>
                </div>
                <div class="card m-2 flex-fill bg-warning">
                    <div class="card-body ">
                        <h5 class="card-title">Total Classes <span class="badge text-bg-light"><?= getTotalClasses() ?></span></h5>
                    </div>
                </div>
                <div class="card m-2 flex-fill bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Total Subjects <span class="badge text-bg-light"><?= getTotalSubject() ?></span></h5>
                    </div>
                </div>
            </div>
        </main>

        <?php include(asset('/inc/footer.php')) ?>
    </div>
</body>

</html>
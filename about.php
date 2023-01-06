<?php
include('config/include.php');
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
                <h1 class="display-4 fw-normal">About Us</h1>
            </div>
        </header>

        <main>
            <p>This Software Application unbelievably unravels and quickens the result management system with unique templates by providing the administration a secure database system for storing, evaluating and publishing the test scores and grades of candidates online. The database likewise allows the student to observe and gander at the exam results on the web at whatever point necessary.
                <br /><br />
                Student Result Management System is a technological opportunity for the school, college university and coaching centre institutions searching for a secure, simple and alternative solution to the conventional paper-based exam results evaluation, reporting and distribution.
            </p>
        </main>

        <?php include(asset('/inc/footer.php')) ?>
    </div>
</body>

</html>
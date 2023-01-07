<?php
include('config/include.php');

include(asset('/controller/controller.php'));

if (isset($_POST['submit'])) {
    storeMessage($_POST);
}
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $_ENV['APP_NAME'] ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container py-3">
        <header>
            <?php include(asset('/inc/navbar.php')) ?>
        </header>

        <main class="mx-auto">
            <h2>How can we help?</h2>
            <p>Feel free to contact, send us a message</p>
            <form class="card p-2" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Full name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Contact No</label>
                    <input type="tel" class="form-control" name="phone" placeholder="Enter you contact number">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Message</label>
                    <textarea name="message" class="form-control" rows="3" placeholder="Enter your message"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
            </form>
        </main>

        <?php include(asset('/inc/footer.php')) ?>
    </div>
</body>

</html>
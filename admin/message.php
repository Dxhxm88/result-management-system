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
                <h1 class="display-4 fw-normal">Messages</h1>
            </div>
        </header>

        <main>
            <table class="table border table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = getMessages();
                    foreach ($data as $message) { ?>
                        <tr>
                            <th scope="row"><?= $message['id']; ?></th>
                            <td><?= $message['name']; ?></td>
                            <td><?= $message['email']; ?></td>
                            <td><?= $message['phone']; ?></td>
                            <td><?= $message['message']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>

        <?php include(asset('/inc/footer.php')) ?>
    </div>
</body>

</html>
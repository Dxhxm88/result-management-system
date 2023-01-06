<?php
include('config/include.php');

include(asset('/controller/controller.php'));

if (isset($_POST['check'])) {
    $results = getResult($_POST['ic']);
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
                <h1 class="display-4 fw-normal">Check your result here</h1>
                <!-- <p class="fs-5 text-muted">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It’s built with default Bootstrap components and utilities with little customization.</p> -->
            </div>
        </header>

        <main>
            <form class="w-50 mx-auto" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">IC Number</label>
                    <input type="text" class="form-control" name="ic" placeholder="E.g 040112145711" value="<?= isset($_POST['ic']) ? $_POST['ic'] : '' ?>">
                </div>
                <button type="submit" name="check" class="btn btn-primary">Check</button>
            </form>

            <?php if (isset($results) && count($results) > 0) { ?>
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card shadow-lg">
                                <div class="card-header bg-primary text-white text-center font-weight-bold">
                                    Result Slip
                                </div>
                                <div class="card-body">
                                    <h3 class="mb-3">Student Information</h3>
                                    <table class="table table-borderless mb-3">
                                        <tr>
                                            <th>Name:</th>
                                            <td><?= $results['student']['name'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>IC No:</th>
                                            <td><?= $results['student']['ic'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Class:</th>
                                            <td><?= $results['class']['year'] . ' ' . $results['class']['name'] ?></td>
                                        </tr>
                                    </table>
                                    <hr>
                                    <h3 class="mb-3">Exam Results</h3>
                                    <?php if (isset($results['results'])) { ?>
                                        <table class="table table-striped">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Subject</th>
                                                    <th>Marks</th>
                                                    <th>Grade</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($results['results'] as $result) { ?>
                                                    <tr>
                                                        <td><?= $result['name'] ?></td>
                                                        <td><?= $result['percentage'] ?></td>
                                                        <td><?= $result['grade'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } else { ?>
                                        <h4>No records</h4>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </main>

        <?php include(asset('/inc/footer.php')) ?>
    </div>
</body>

</html>
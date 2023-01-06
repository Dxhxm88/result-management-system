<?php
include('../config/include.php');
require(asset('/config/redirect.php'));

include(asset('controller/controller.php'));

if (isset($_GET['class_id'])) {
    $students = getAllStudentByClass($_GET['class_id']);
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
                <h1 class="display-4 fw-normal">View Class Results</h1>
            </div>
        </header>

        <main>
            <div>
                <a href="<?= route('admin/result-class.php') ?>" class="btn btn-secondary mb-3">Back</a>
            </div>
            <table class="table border table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Total of Subjects</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($students as $student) { ?>
                        <tr>
                            <th scope="row"><?= $student['id']; ?></th>
                            <td><?= $student['name']; ?></td>
                            <td><?= $student['total_subject']; ?></td>
                            <td>
                                <a href="<?= route("admin/result.php?student_id=" . $student['ic']) . "&class_id=" . $_GET['class_id'] ?>" class="btn btn-primary">View Result</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>

        <?php include(asset('/inc/footer.php')) ?>
    </div>
</body>

</html>
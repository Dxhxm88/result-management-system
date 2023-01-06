<?php
include('../config/include.php');
require(asset('/config/redirect.php'));

include(asset('controller/controller.php'));

if (isset($_GET['delete'])) {
    deleteSubject($_GET['delete']);
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
                <h1 class="display-4 fw-normal">Manage Subjects</h1>
            </div>
        </header>

        <main>
        <div>
                <a href="<?= route('admin/subject-add.php') ?>" class="btn btn-primary mb-3">Add New Subject</a>
            </div>
            <table class="table border table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Code</th>
                        <th scope="col">Description</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $subjects = getAllSubjects();
                    foreach ($subjects as $subject) { ?>
                        <tr>
                            <th scope="row"><?= $subject['id']; ?></th>
                            <td><?= $subject['name']; ?></td>
                            <td><?= $subject['code']; ?></td>
                            <td><?= $subject['description']; ?></td>
                            <td>
                                <a href="<?= route("admin/subject-edit.php?id=" . $subject['id']) ?>" class="btn btn-primary">Edit</a>
                                <a href="<?= route("admin/subject.php?delete=" . $subject['id']) ?>" class="btn btn-danger">Delete</a>
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
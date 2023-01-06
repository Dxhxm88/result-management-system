<?php
include('../config/include.php');
require(asset('/config/redirect.php'));

include(asset('controller/controller.php'));

if (isset($_GET['id'])) {
    $student = getStudent($_GET['id']);
}

$classes = getAllClasses();

if (isset($_POST['update'])) {
    updateStudent($_POST, $_GET['id']);
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
                <h1 class="display-4 fw-normal">Edit Student</h1>
            </div>
        </header>

        <main>
            <form method="post" class="border p-3">
                <div class="row g-3">
                    <div class="col-sm-12">
                        <label for="firstName" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="" value="<?= $student['name'] ?>" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">IC Number</label>
                        <input type="text" name="ic" class="form-control" placeholder="" value="<?= $student['ic'] ?>" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Gender</label>
                        <select name="gender" class="form-select" aria-label="Default select example" required>
                            <option value="Male" <?php echo $student['gender'] === "Male" ? 'selected' : ''?> >Male</option>
                            <option value="Female" <?php echo $student['gender'] === "Female" ? 'selected' : ''?>>Female</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" cols="30" rows="3" class="form-control"><?= $student['address'] ?></textarea>
                    </div>

                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Phone (Parent)</label>
                        <input type="text" name="phone" class="form-control" placeholder="" value="<?= $student['phone'] ?>" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Class</label>
                        <select name="class" class="form-select" aria-label="Default select example" required>
                            <?php foreach ($classes as $class) { ?>
                                <option value="<?= $class['id'] ?>" <?= $student['class_id']==$class['id'] ? 'selected' : ''?> ><?= $class['year'] . ' ' .$class['name'] ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                        <a href="<?= route('admin/student.php') ?>" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </form>
        </main>

        <?php include(asset('/inc/footer.php')) ?>
    </div>
</body>

</html>
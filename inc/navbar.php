<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
    <img src="img/logo.png" width="80px" alt="">
    <a href="<?= route('') ?>" class="d-flex align-items-center text-dark text-decoration-none">
        <span class="fs-4"><?= $_ENV['APP_NAME'] ?></span>
    </a>

    <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
        <?php if (isset($_SESSION['email'])) { ?>
            <a class="me-3 py-2 text-dark text-decoration-none" href="<?= route('admin/') ?>">Dashboard</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="<?= route('admin/student.php') ?>">Student</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="<?= route('admin/classes.php') ?>">Classes</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="<?= route('admin/subject.php') ?>">Subject</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="<?= route('admin/result-class.php') ?>">Results</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="<?= route('admin/message.php') ?>">Message</a>
            <a class="py-2 text-dark text-decoration-none" href="<?= route('admin-login.php?logout=true') ?>">Logout</a>
        <?php } else { ?>
            <a class="me-3 py-2 text-dark text-decoration-none" href="<?= route('') ?>">Home</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="<?= route('about.php') ?>">About</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="<?= route('contact.php') ?>">Contact</a>
            <a class="py-2 text-dark text-decoration-none" href="<?= route('admin-login.php') ?>">Admin</a>
        <?php } ?>
    </nav>
</div>
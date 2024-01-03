<?php
session_start();
ob_start();
if (isset($_SESSION['role']) && ($_SESSION['role']) == 1) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link rel="stylesheet" href="../admin/css/style.css?ver=<?= rand() ?>">
        <link rel="stylesheet" href="../admin/css/custom.css?ver=<?= rand() ?>">
        <link rel="stylesheet" href="../assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
            </script>

    </head>

    <body>
        <div class="grid">
            <?php
            include('config/config.php');
            include("module/header.php");
            include("module/menu.php");
            include("module/main.php");
            include("module/footer.php");
            ?>
        </div>
    </body>

    </html>
    <?php
} else {
    header('location:login.php');
}
if (isset($_GET['logout'])) {
    unset($_SESSION['role']);
    unset($_SESSION['fullname']);
    header('location:login.php');
}
?>
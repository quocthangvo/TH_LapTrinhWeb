<?php
include('config/config.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="../assets/css/register.css">
    <link rel="stylesheet" href="../admin/css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>

</head>

<body>

    <div class="wrapper-container">
        <h2>Đăng Ký Tài Khoản</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">

                <button type="submit" name="register">Đăng ký</button>


            </div>
            <div class="form-group-link">
                <p>Bạn đã có tài khoản <a href="../admin/login.php" class="text-decoration-none">Đăng nhập</a> ngay</p>
            </div>
        </form>
        <a href="../index.php" class="text-decoration-none">
            Trở về trang chủ
        </a>
    </div>

</body>

</html>

<?php
if (isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql_register = "INSERT INTO tbl_admin(fullname,email,username,password)
                VALUE('" . $fullname . "','" . $email . "','" . $username . "','" . $passwordHash . "')";
    mysqli_query($mysqli, $sql_register);
    // echo '<script>alert("Đăng nhập thành công");</script>';

    header('location: index.php?admin/login.php');
}
?>
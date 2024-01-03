<?php
include('config/config.php');
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM tbl_admin WHERE username = '$username'";
    $query = mysqli_query($mysqli, $sql);
    $row_user = mysqli_fetch_array($query);


    $passwordHash = $row_user['password'];
    if (password_verify($password, $passwordHash)) {
        echo "Mật khẩu đúng. Đăng nhập thành công";
        // echo '<script>alert("Đăng nhập thành công");</script>';
        $_SESSION['role'] = $row_user['role'];
        $_SESSION['username'] = $row_user['fullname'];

        if ($_SESSION['role'] == 1) {
            header('Location:index.php');
            exit;
        } elseif ($_SESSION['role'] == 0) {
            header('Location:../index.php');
            exit;
        } else {
            header('Location:index.php');
            exit;
        }

    } else {
        echo 'Sai mật khẩu. Đăng nhập không thành công';
    }

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../assets/css/register.css">
    <link rel="stylesheet" href="../admin/css/style.css">
    <link rel="stylesheet" href="../admin/css/custom.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>

</head>

<body>

    <div class="wrapper-container">
        <h2>Đăng Nhập</h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="" name="password" required>
            </div>
            <div class="form-group btn btn--primary">
                <button type="submit" name="login">Đăng nhập</button>
            </div>
            <div class="form-group-link">
                <p>Bạn chưa có tài khoản ?<br>
                    <a href="../admin/register.php" class="text-decoration-none"> Đăng ký</a>
                </p>
                <p> Bạn gặp vấn đề ?<a href="#" class="text-decoration-none"> Quên mật khẩu</a></p>
            </div>
        </form>

        <a href="../index.php" class="text-decoration-none ">
            Trở về trang chủ
        </a>
    </div>
</body>

</html>
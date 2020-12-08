<?php
session_start();
include_once 'include/class.user.php';
$user = new User();

if (isset($_POST['submit'])) {
    extract($_POST);
    $login = $user->check_login($username, $password);
    if ($login) {
        // Registration Success
        header("location:data_mobil.php");
    } else {
        // Registration Failed
        echo 'Wrong username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <!------ Include the above in your HEAD tag ---------->
</head>

<body>
    <div class="container">
        <div class="login-container">
            <div id="output"></div>
            <div class="avatar"></div>
            <div class="form-box">
                <form action="" method="POST">
                    <input name="username" type="text" placeholder="username">
                    <input type="password" name="password" placeholder="password">
                    <button class="btn btn-info btn-block login" name="submit" type="submit">Login</button>
                </form>
            </div>
        </div>

    </div>

</body>

</html>
<?php
include("config/database.php");

## Login form submit
if (isset($_POST['submit'])) {
    extract($_POST);

    # Sql query to login
    $pass = md5($password);
    $sql = "SELECT * FROM users where username = '$username' AND password = '$pass'";
    $result = $conn->query($sql);
    if ($result->num_rows) {
        $_SESSION['is_user_loggedin'] = true;
        $_SESSION['user_data'] = mysqli_fetch_assoc(($result));
        header("LOCATION: users.php");
    } else {
        $_SESSION['error'] = "Invalid login info";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/style.css" rel="stylesheet">
    <title>PHP CRUD Application</title>
</head>

<body>

    <section class="section">
        <?php include("include/alert.php") ?>
        <h2>Login Form</h2>

        <form action="index.php" method="post">
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button type="submit" name="submit">Login</button>

            </div>
        </form>
    </section>

</body>

</html>
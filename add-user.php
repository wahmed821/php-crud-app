<?php
include("config/database.php");
include("middleware.php");

//$_SESSION['name'] = "hello world";

//Form submit working
if (isset($_POST['submit'])) {
    extract($_POST);

    $date = date("Y-m-d H:i:s");
    $pass = md5($password);
    $sql = "INSERT INTO users (username, password, created_at) VALUES ('$username', '$pass', '$date')";

    $result = $conn->query($sql);
    if ($result) {
        $_SESSION['success'] = "User has been created";
    } else {
        $_SESSION['error'] = "Something went wrong, please try again";
    }
    header("LOCATION: users.php");
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
        <h2>Register Form</h2>

        <form action="add-user.php" method="post">
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button type="submit" name="submit">Signup</button>
            </div>
        </form>

        <div class="container" style="background-color:#f1f1f1">
            <a href="users.php" class="footerbtn">All Users</a>

            <a href="logout.php" class="footerbtn">Logout</a>

        </div>
    </section>

</body>

</html>
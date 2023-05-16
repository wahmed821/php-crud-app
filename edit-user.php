<?php
include("config/database.php");
include("middleware.php");

## Step 1 - Get user's data, by user id
if (isset($_GET['id'])) {
    $sql = "select * from users where id = " . $_GET['id'];
    $result = $conn->query($sql);
    $user = mysqli_fetch_assoc($result);
} else {
    echo "<h1>Invalid request</h1>";
    exit;
}

## Step 2 - Update user data, by form submit
if (isset($_POST['submit'])) {
    extract($_POST);

    //$sql = "UPDATE users SET username = '$username', password = '$password' where id = " . $_GET['id'];
    $sql = "UPDATE users SET username = '$username' where id = " . $_GET['id'];

    $result = $conn->query($sql);
    if ($result) {
        $_SESSION['success'] = "User has been updated";
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
        <h2>Edit User</h2>

        <form action="edit-user.php?id=<?php echo $user['id'] ?>" method="post">
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required value="<?php echo $user['username'] ?>">

                <?php
                /* <label for="psw"><b>Password</b></label>
                    <input type="text" placeholder="Enter Password" name="password" required value="<?php echo $user['password'] ?>">
                */ ?>

                <button type="submit" name="submit">Update</button>
            </div>
        </form>

        <div class="container" style="background-color:#f1f1f1">
            <a href="users.php" class="footerbtn">All Users</a>
        </div>
    </section>

</body>

</html>
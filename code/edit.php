<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./edit.css">
</head>


<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

$host = "localhost";
$user = "root";
$pasword = "";
$db = "cabinet";

$connect = mysqli_connect($host, $user, $pasword, $db);
if (isset($_GET['id'])) {
    $info = $_GET['id'];
} else {
    $info = $_SESSION['email'];
}

$sql = " select * from users where email ='$info'";

$result = mysqli_query($connect, $sql);
$data = mysqli_fetch_assoc($result);

$email = $data['email'];
$username = $data['username'];
$password = $data['password'];
$age = $data['age'];
$phone = $data['phone'];
$role = $data['role'];


?>

<body id="bd">
    <header>

        <div class="logo">
            <a href="HomeAdmin.php">
                <img src="../img/logo.png" alt="Home" style="cursor: pointer;">
            </a>
        </div>

        <span>
            Cabinet Denatal Manegment System
        </span>
        <div class="out">
            <a href="logout.php"> <button> <i class="fa-solid fa-right-to-bracket"></i> Logout </button> </a>
        </div>



    </header>


    <div class="box">
        <div class="image">
            <img src="../img/profile.gif" alt="">
        </div>

        <form method="post" action="<?php $_SERVER['PHP_SELF']  ?>">
            <div class="info">
                <div class="one">
                    <label for=""> Your Email </label><br>
                    <input type="email" value="<?php echo $email; ?>" readonly>
                </div>

                <div class="one">
                    <label for=""> Your Username </label><br>
                    <input id="input" type="username" value="<?php echo $username; ?>" name="Password">
                </div>

                <div class=" one">
                    <label for=""> Your Password </label><br>
                    <input id="input" type="text" value="<?php echo $password; ?>" name="Password">
                </div>

                <div class="one">
                    <label for=""> Your Phone Number </label><br>
                    <input type="number" id="input" value="<?php echo $phone; ?>" name="phone">
                </div>

                <div class="one">
                    <label for=""> Your Age </label><br>
                    <input type="number" value="<?php echo $age; ?>" id="input" name="age">
                </div>

                <div class="one">
                    <label for=""> Position </label><br>
                    <input type="text" value="<?php echo $role; ?>" readonly id="input">
                </div>
                <div class="buttons">
                    <input id="Update" type="submit" value="Update Profile">
                    <br>
                    <button id="bt"> <a href="Profile.php"> Back </a> </button>
                </div>
            </div>
        </form>




    </div>
    <script src="./edit.js"></script>
</body>

</html>
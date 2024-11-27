<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="login.js" defer> </script>
</head>


<?php



session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cabinet";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validate user
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

        $req = mysqli_query($conn, $sql);


        // $stmt = $conn->prepare($sql);
        // $stmt->bind_param("ss", $email, $password);
        // $stmt->execute();
        // $result = $stmt->get_result();


        if (mysqli_num_rows($req) > 0) {

            $row = $req->fetch_assoc();


            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];


            header("Location: HomeAdmin.php");
        } else {
            $error = "invalid username or password";
        }
    }
}
?>


<body>

    <div class="loginbox">

        <div class="logo">
            <img src="../img/logo.png" alt="">
        </div>
        <div class="text">
            <p class="name"> Your Porn Website </p>
            <p class="desp"> Welcome To Our WebApp Fill The Form to Get in </p>
        </div>
        <div class="login">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                <input type="email" name="email" required placeholder="Please Enter Your email">
                <i class="fa-solid fa-envelope"></i>
                <br>
                <input id="pass" type="password" name="password" required placeholder="Please Enter Your password">
                <i class="fa-solid fa-lock"></i>
                <i id="eye" class="fa-regular fa-eye"></i>
                <br>
                <a href="Signup.html"> Join us </a>
                <label for="role" id="rl"> Role </label>
                <select name="Role" id="role">
                    <option value="admin"> Admin </option>
                    <option value="doctor" selected> Doctor </option>
                    <option value="patient"> Patient </option>
                </select>
                <input type="submit" value="Sign in">

                <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    echo ' <p class="error">
                     ' . $error . '
                    </p>';
                }                ?>


            </form>

        </div>

    </div>



</body>

</html>
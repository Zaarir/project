<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./new.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

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

    if (!isset($_SESSION['username']) || !isset($_SESSION['email'])) {
        header("Location: login.php");
        exit;
    }

    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    ?>





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

    <div class="content">


        <nav>
            <i class="fa-solid fa-bars" id="bars"></i>
            <i class="fa-solid fa-xmark" id="cancel"></i>
            <ul>

                <li id="move">
                    <a href="Profile.php">
                        <i class="fa-solid fa-user"></i>
                        <?php echo htmlspecialchars($username); ?>
                    </a>
                </li>


                <li>
                    <a href="Listofadmins.php">
                        <i class="fa-solid fa-user"></i>
                        Admins
                    </a>
                </li>

                <li>
                    <a href="">
                        <i class="fa-regular fa-user"></i>
                        Patient
                    </a>
                </li>

                <li>
                    <a href="">
                        <i class="fa-regular fa-user"></i>
                        Doctors
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa-solid fa-bars-progress"></i>
                        Stock
                    </a>
                </li>


            </ul>
        </nav>


        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cabinet";

        $conn = new mysqli($servername, $username, $password, $dbname);


        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (!isset($_SESSION['username']) || !isset($_SESSION['email'])) {
            header("Location: login.php");
            exit;
        }

        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $admin_username = $_POST['username'];
            $admin_email = $_POST['email'];
            $admin_password = $_POST['password'];
            $admin_phone = $_POST['phone'];
            $admin_age = $_POST['age'];
            $role = "Admin";



            $sql = "INSERT INTO users (username, email, password, phone, age, role) 
            VALUES ('$admin_username', '$admin_email', '$admin_password', '$admin_phone', '$admin_age', '$role')";


            if (mysqli_query($conn, $sql)) {
                echo "Admin added successfully!";
                header("Location:listofadmins.php");
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }

        // 
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

            <div class="infor">


                <div class="one">
                    <label for="email">Your Email</label><br>
                    <input type="email" name="email" required>
                </div>

                <div class="one">
                    <label for="username">Your Username</label><br>
                    <input type="text" name="username" required>
                </div>

                <div class="one">
                    <label for="password">Your Password</label><br>
                    <input type="password" name="password" required>
                </div>

                <div class="one">
                    <label for="phone">Your Phone Number</label><br>
                    <input type="number" name="phone" required>
                </div>

                <div class="one">
                    <label for="age">Your Age</label><br>
                    <input type="number" name="age" required>
                </div>

                <div class="one">
                    <label for="role">Position</label><br>
                    <input type="text" value="Admin" readonly>
                </div>

                <div class="buttons">
                    <input id="Update" type="submit" value="Add Admin">
                    <br>
                    <a href="Listofadmins.php"><button id="back" type="button">Back</button></a>
                </div>

            </div>

        </form>
    </div>



    </div>



    <script src="./new.js"></script>
</body>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Listofadmins.css">
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

        <div class="souscontent">
            <div class="chnageimage">
                <img src="../img/homeadmin1.jpg" alt="">
            </div>
            <div id="information" class="info">

                <p>List of Admins</p>
                <form action="">
                    <input type="search " placeholder="Search for Admin By email">
                </form>
                <a href=" new.php"><button id="new"> New Admins </button></a>

                <table cellspacing="10">



                    <tr class="first">
                        <td id="head">Email</td>
                        <td id="head">Username</td>
                        <td id="head">Password</td>
                        <td id="head">Phone</td>
                        <td id="head">Age</td>
                        <td id="head">Role</td>
                        <td id="head">Action</td>
                    </tr>

                    <?php
                    $admin = "admin";
                    $sql = " select * from users where role='$admin'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                                <tr>
                                     <td>' . $row['email'] . '</td>
                                     <td>' . $row['username'] . '</td>
                             <td>' . $row['password'] . '</td>
                                     <td>' . $row['phone'] . '</td>
                                     <td>' . $row['age'] . '</td>
                                    <td>' . $row['role'] . '</td>
                                     <td>
                                         <form action="edit.php" method="get">
                                             <input type="hidden" value="' . $row['id'] . '" name="id">
                                            <input type="submit" name="" id="edit" value="Edit">
                                         </form>
                                         
                                         <form action="delete.php" method="get">
                                             <input type="hidden" value="' . $row['id'] . '" name="id">
                                            <input type="submit" name="" id="dl" value="Delete">
                                         </form>
                                    </td>
                                </tr>



                         ';
                    }




                    ?>

                </table>


            </div>
        </div>
    </div>






    <script src="./Listofadmins.js"></script>




</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Pornhub</title>
    <link rel="stylesheet" href="./HomeAdmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

    <?php
    session_start(); // Start the session

    // Check if user is logged in
    if (!isset($_SESSION['username']) || !isset($_SESSION['email'])) {
        header("Location: login.html"); // Redirect to login if not logged in
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




                <li>
                    <a href="Profile.php" id="move">
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



        <div class="info">

            <div class="ad">
                <p> Admin </p>

            </div>

            <div class="doc">
                <p>Doctor </p>
            </div>
            <div class="pt">
                <p>Patient </p>
            </div>
            <div class="md">
                <p> Medcine </p>
            </div>


        </div>

    </div>

    <script src="HomeAdmin.js"></script>
</body>

</html>
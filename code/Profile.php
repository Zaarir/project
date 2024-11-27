<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="./profile.css">
</head>

<body>
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


    <?php
    session_start();


    if (!isset($_SESSION['username']) || !isset($_SESSION['email'])) {
        header("Location: login2.php");
        exit;
    }

    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    ?>

    <div class="profilebox">

        <div class="username">
            <div class="pic">
                <img src="../img/profile.gif" alt="">
            </div>
            <p><?php echo htmlspecialchars($username); ?></p>

        </div>
        <div class="buttons">
            <a href="Edit.php"> <button id="ed"> Edit Profile </button></a>
            <a href="HomeAdmin.php"> <button id="out"> Back </button></a>
        </div>



    </div>



</body>

</html>
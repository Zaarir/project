<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$dbname = "cabinet";

$connect = mysqli_connect($host, $username, $password, $dbname);

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die("No ID provided for deletion.");
}

$sql = "DELETE FROM users WHERE id = $id";
if ($connect->query($sql) === TRUE) {
    echo "Record deleted successfully!";

    $result = $connect->query("SELECT MAX(id) AS max_id FROM users");
    $row = $result->fetch_assoc();
    $max_id = $row['max_id'] ?? 0;

    $connect->query("ALTER TABLE users AUTO_INCREMENT = " . ($max_id + 1));

    header("Location: Listofadmins.php");
    exit();
} else {
    echo "Error deleting record: " . $connect->error;
}

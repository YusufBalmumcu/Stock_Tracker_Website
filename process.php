<?php

$username = $_POST["username"];
$password = $_POST["password"];

$mysqli = new mysqli("localhost", "root", "", "stock_tracker");


$stmt = $mysqli->prepare("SELECT Password FROM users WHERE User_Name = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['Password'])) {
        session_start();

        $_SESSION["username"] = $username;
        header('LOCATION:index.php');
    } else {
        header('LOCATION:index.php');
    }
} else {
    header('LOCATION:index.php');
}

$mysqli->close();

?>
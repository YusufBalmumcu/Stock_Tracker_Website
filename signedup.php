<?php

$username = $_POST["username"];
$email = $_POST["email"];
$name = $_POST["name"];
$lastname = $_POST["lastname"];
$gsm = $_POST["gsm"];
$birthdate = $_POST["birthdate"];
$password = password_hash($_POST["password"], PASSWORD_BCRYPT);

$mysqli = new mysqli("localhost", "root", "", "stock_tracker");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "INSERT INTO users (`User_Name`,
                        `E_Mail`,
                        `First_Name`,
                        `Last_Name`,
                        `GSM_No`,
                        `Birth_Date`,
                        `Password`)
        VALUES 
        ('$username', 
        '$email',
        '$name',
        '$lastname',
        '$gsm',
        '$birthdate',
        '$password')";

if ($mysqli->query($sql) === TRUE) {
    header('LOCATION:index.php');
  } else {
    echo "Hata: " . $sql . "<br>" . $mysqli->error;
  }

$mysqli->close();

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Tracker</title>
    <style>
        a.button {
    padding: 1px 6px;
    border: 1px outset buttonborder;
    border-radius: 3px;
    color: buttontext;
    background-color: buttonface;
    text-decoration: none;
}
    </style>
</head>
<body>
    <a href="login.php" class=button>Giriş Yapın</a>
</body>
</html>
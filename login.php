<?php
$mysqli = new mysqli("localhost", "root", "", "lab11");
session_start();
if(isset($_SESSION["username"])) {
    header('LOCATION:index.php');
} else {
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    <style>
                body {
            background-color: #f5f5f5;
        }
        .hero-body {
                display: flex;
                align-items: center;
                justify-content: space-between;
        }
        .container-flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }
        .right-container {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }
        .form-container {
            background-color: #fff; 
            border-radius: 5px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            padding: 20px; 
            max-width: 400px; 
            margin: 0 auto; 
            margin-top: 20px; 
        }
        input[type="text"],
        input[type="date"],
        input[type="password"],
        input[type="submit"] {
            width: 100%; 
            margin-bottom: 10px; 
            padding: 10px; 
            border-radius: 5px; 
            border: 1px solid #ccc; 
            box-sizing: border-box; 
        }
        input[type="submit"] {
            background-color: #ffdd57;
            color: #fff; 
            border: none; 
            cursor: pointer; 
        }
        input[type="submit"]:hover {
            background-color: #2769c4;
        }
        .center {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 50vh; 
        }
    </style>
</head>
<body>
<section class="hero is-warning">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
            Stock Tracker
        </h1>
        <h2 class="subtitle">
          Güvenilir hisse senedi takip sitesi
        </h2>
        <div class="right-container">
            <div class="buttons">
                <a href="index.php" class="button is-light is-warning">
                    Ana Sayfa
                </a>
            </div>
        </div>
      </div>
    </div>
</section>


<div class="form-container">
    
<form action="process.php" method="POST">
    User Name: <input type="text" name="username"><br>
    Password: <input type="text" name="password"><br>
    <input type="submit" value="Gönder">
</form>
    </div>
    <div class="center">
        <a href="https://github.com/YusufBalmumcu/Stock_Tracker_Website">Projenin Github Linki</a>
    </div>
</body>
</html>
    </div>
<?php
}
?>
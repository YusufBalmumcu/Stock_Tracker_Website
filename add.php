<?php
session_start();
if (isset($_SESSION["username"])) {
    $mysqli = new mysqli("localhost", "root", "", "stock_tracker");


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $stock = $_POST["stock"];
        $username = $_SESSION["username"];

        // Kullanıcının favorilerini sütununu seç
        $sql = "SELECT Favourites FROM users WHERE User_Name='$username'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $favourites = $row['Favourites'];

            // Yeni kodu kullanıcının favorilerine ekle
            if (!empty($favourites)) {
                $favouritesArray = explode(',', $favourites);
                if (!in_array($stock, $favouritesArray)) {
                    $favouritesArray[] = $stock;
                    $favourites = implode(',', $favouritesArray);
                }
            } else {
                $favourites = $stock;
            }

            // Veri tabanını güncelle
            $updateSql = "UPDATE users SET Favourites='$favourites' WHERE User_Name='$username'";
            if ($mysqli->query($updateSql) === TRUE) {
                // Güncelleme başarılı olduktan sonra listeye geri dön
                header('LOCATION:list.php');
            } else {
                echo "Ekleme başarısız oldu" . $mysqli->error;
            }
        }
    }
    $mysqli->close();
} else {
    header('LOCATION:login.php');
}
?>
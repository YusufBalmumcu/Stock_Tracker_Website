<?php
session_start();
if(isset($_SESSION["username"])) {
    $mysqli = new mysqli("localhost", "root", "", "stock_tracker");
    $username = $_SESSION["username"];
    // API Key i buraya girin
    $apiKey = 'LSXDZ3DHHR13Q9U1';

    // Kullanıcının favori hisselerini bir diziye al
    $sql = "SELECT Favourites FROM users WHERE User_Name='$username'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $favourites = $row['Favourites'];
        $favouritesArray = explode(',', $favourites);
    } else {
        $favouritesArray = [];
    }
    $mysqli->close();

    ?>
    <!DOCTYPE html>
    <html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stock Tracker</title>
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
            form {
                display: flex;
                align-items: center;
            }

            label {
                flex: 1;
                margin-right: 10px;
            }

            input[type="text"] {
                flex: 3;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                font-size: 16px;
                outline: none;
            }

            button[type="submit"] {
                background-color: #4CAF50;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                outline: none;
            }

            button[type="submit"]:hover {
                background-color: #45a049;
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
            <div class="container container-flex">
                <div>
                    <h1 class="title">
                        Stock Tracker
                    </h1>
                    <h2 class="subtitle">
                        Güvenilir hisse senedi takip sitesi
                    </h2>
                </div>
                <div class="right-container">
                        <h1 class="subtitle">
                            Kişisel Listeniz
                        </h1>
                        <div class="buttons">
                            <a href="index.php" class="button is-light is-warning">
                                Ana sayfa
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </section>
        <div style="margin:10%">
            <form action="add.php" method="POST">
                <label for="stock">Hisse Kodu:</label>
                <input type="text" name="stock" id="stock" required>
                <button type="submit">Ekle</button>
            </form>
        </div>
        <div class="container">
        <h2 class="title">Favori Hisselerim</h2>
        <ul>
            <?php
            if (!empty($favouritesArray)) {
                foreach ($favouritesArray as $favourite) {
                    // Hisse fiyatını alır
                    $endpoint = 'https://www.alphavantage.co/query';
                    $params = array(
                        'function' => 'GLOBAL_QUOTE',
                        'symbol' => $favourite,
                        'apikey' => $apiKey
                    );

                    $url = $endpoint . '?' . http_build_query($params);
                    $response = file_get_contents($url);
                    $data = json_decode($response, true);

                    if ($data && isset($data['Global Quote']['05. price'])) {
                        $price = $data['Global Quote']['05. price'];
                    } else {
                        $price = "API kullanım hakkı doldu veya geçersiz.";
                    }

                    echo "<li>" . htmlspecialchars($favourite) . " - $" . htmlspecialchars($price) . "</li>";
                }
            } else {
                echo "<p>Favori hisse bulunmamaktadır.</p>";
            }
            ?>
        </ul>
    </div>
    <div class="center">
        <a href="https://github.com/YusufBalmumcu/Stock_Tracker_Website">Projenin Github Linki</a>
    </div>
    </body>
    </html>

<?php 
} else {
    header('LOCATION:index.php');
}
?>
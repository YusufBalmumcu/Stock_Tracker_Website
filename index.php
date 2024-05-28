<?php
session_start();
if(isset($_SESSION["username"])) {
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
            .result {
            margin: 10%;
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
                            Hoşgeldiniz, <?php echo $_SESSION["username"]; ?>!
                        </h1>
                        <div class="buttons">
                            <a href="list.php" class="button is-light is-warning">
                                Listem
                            </a>
                            <a href="exit.php" class="button is-light is-warning">
                                Çıkış Yap
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </section>

    <div style="margin: 10%">
    <form method="post">
        <label for="symbol">Fiyatını Öğrenmek İstediğiniz Hisseyi Giriniz:</label>
        <input type="text" id="symbol" name="symbol">
        <button type="submit">Fiyatı Öğren</button>
    </form>
    </div>
    <div class="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $symbol = htmlspecialchars($_POST["symbol"]); 

                $apiKey = '042AM3BVG41NZJQ8';

                $endpoint = 'https://www.alphavantage.co/query';
                $params = array(
                    'function' => 'GLOBAL_QUOTE',
                    'symbol' => $symbol, // Kullanıcının girdiği hisse senedi sembolü
                    'apikey' => $apiKey
                );

                $url = $endpoint . '?' . http_build_query($params);

                $response = file_get_contents($url);

                $data = json_decode($response, true);

                if ($data && isset($data['Global Quote'])) {
                    $globalQuote = $data['Global Quote'];

                    // Fiyatı al
                    $price = $globalQuote['05. price'];

                    echo "<h2>$symbol Güncel Fiyatı: $price </h2>";

                } else {
                    echo "API kullanım hakkı doldu veya geçersiz.";
                }
            }
            ?>
        <div class="center">
            <a href="https://github.com/YusufBalmumcu/Stock_Tracker_Website">Projenin Github Linki</a>
        </div>
        </div>
</body>
    </html>

<?php 
} else {
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
            .result {
                margin: 10%;
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
                            Liste oluşturabilmek için kayıt olun!
                        </h1>
                        <div class="buttons is-right">
                            <a href="signup.php" class="button is-light is-warning">
                                Kayıt Ol
                            </a>
                            <a href="login.php" class="button is-light is-warning">
                                Giriş Yap
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <div style="margin: 10%">
    <form method="post">
        <label for="symbol">Fiyatını Öğrenmek İstediğiniz Hisseyi Giriniz:</label>
        <input type="text" id="symbol" name="symbol">
        <button type="submit">Fiyatı Öğren</button>
    </form>
    </div>
    <div class="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $symbol = htmlspecialchars($_POST["symbol"]); 

                $apiKey = '042AM3BVG41NZJQ8';

                $endpoint = 'https://www.alphavantage.co/query';
                $params = array(
                    'function' => 'GLOBAL_QUOTE',
                    'symbol' => $symbol, // Kullanıcının girdiği hisse senedi sembolü
                    'apikey' => $apiKey
                );

                $url = $endpoint . '?' . http_build_query($params);

                $response = file_get_contents($url);

                $data = json_decode($response, true);

                if ($data && isset($data['Global Quote'])) {
                    $globalQuote = $data['Global Quote'];

                    // Fiyatı al
                    $price = $globalQuote['05. price'];

                    echo "<h2>$symbol Güncel Fiyatı: $price </h2>";

                } else {
                    echo "API kullanım hakkı doldu veya geçersiz.";
                }
            }
            ?>
            <div class="center">
            <a href="https://github.com/YusufBalmumcu/Stock_Tracker_Website">Projenin Github Linki</a>
            </div>
        </div>
</body>
    </html>

    <?php
}
?>
# Stock Tracker Website

Stock Tracker, kullanıcıların favori hisse senetlerini takip etmelerini sağlayan bir web sitesidir. Kullanıcılar sisteme kayıt olabilir, giriş yapabilir ve favori hisse senetlerini ekleyerek bu hisselerin güncel fiyatlarını takip edebilirler.

## Özellikler

- Kullanıcı kayıt ve giriş sistemi
- Favori hisse senetlerini ekleme ve listeleme
- Hisse senedi fiyatlarını API aracılığıyla güncel olarak alma

### Gereksinimler

- PHP 7.x veya üzeri
- MySQL 5.x veya üzeri
- Web sunucusu (Apache, Nginx vb.)

### Kurulum Adımları

1. Bu repoyu klonlayın veya indirin.
    ```sh
    git clone https://github.com/YusufBalmumcu/Stock_Tracker_Website.git
    ```

2. MySQL veritabanınızı oluşturun ve `users` tablosunu oluşturmak için aşağıdaki SQL komutunu çalıştırın:
    ```sql
    CREATE DATABASE `stock_tracker` 
    
    CREATE TABLE `stock_tracker`.`users` 
    (
        `User_ID` INT NOT NULL AUTO_INCREMENT,
        `User_Name` VARCHAR(255) NOT NULL,
        `E_Mail` VARCHAR(255) NOT NULL,
        `First_Name` VARCHAR(255) NOT NULL,
        `Last_Name` VARCHAR(255) NOT NULL,
        `GSM_No` VARCHAR(255) NOT NULL,
        `Birth_Date` DATE NOT NULL,
        `Password` VARCHAR(255) NOT NULL,
        `Favourites` VARCHAR(255) NOT NULL DEFAULT '',
        PRIMARY KEY (`User_ID`)
    ) AUTO_INCREMENT=0;
    ```

3. Veritabanı bağlantı bilgilerinizi gerekli kısımlara doldurunuz(Projenin indirdiğiniz halinde aşağıdaki gibidir ve üstteki adımda oluşturduğunuz veri tabanı ile çalışabilir durumdadır):
    ```php
    $mysqli = new mysqli("localhost", "root", "", "stock_tracker");
    ```

4. Alpha Vantage API anahtarınızı `api_key.php` dosyasına ekleyin:
- Yüklediğiniz kodda API key mevcut olacaktır ama bedava sürüm olduğundan kullanımı sayılı olacaktır eğer hata alırsanız kodaki API key i aşağıdaki alternatiflerle değiştirebilirsiniz
- LSXDZ3DHHR13Q9U1
- HXQJN8FLSFBLMEA7
- 042AM3BVG41NZJQ8
- YY44U9U9MXQHZBW2

   ```php
    <?php
    $apiKey = 'YOUR_API_KEY_HERE';
    ?>
    ```

6. Web sunucunuzda projenin bulunduğu dizini kök dizin olarak ayarlayın ve sunucunuzu başlatın.

## Kullanım

### Kayıt Olma ve Giriş Yapma

1. Ana sayfada (index.php) "Kayıt Ol" butonuna tıklayarak kayıt sayfasına gidin ve bilgilerinizi girerek kayıt olun.
2. Kayıt olduktan sonra giriş yapın.

### Favori Hisse Ekleme ve Listeleme

1. Giriş yaptıktan sonra ana sayfada favori hisse senetlerinizi eklemek için hisse kodunu girin ve "Ekle" butonuna tıklayın.
2. Eklendiğinde, favori hisse senetleriniz ve güncel fiyatları listelenecektir.

## Proje Yapısı

- `index.php`: Ana sayfa, kullanıcı kayıt ve giriş linklerini barındıran sayfadır
- `signup.php`: Kullanıcı kayıt sayfasıdır
- `signedup.php`: Kullanıcının kaydını işleyen sayfadır
- `login.php`: Kullanıcı giriş sayfasıdır
- `add.php`: Favori hisse ekleme işlemlerini barındıran sayfadır
- `list.php`: Kullanıcının favori hisselerini listeleyen sayfadır
- `exit.php`: Kullanıcının çıkış yapmasını sağlayan sayfadır
- `process.php`: Kullanıcının kayıt olma verilerini işleyen sayfadır
- `users.sql`: Veri tabanını kurmak için kullanacağınız sql komutlarını barındırır


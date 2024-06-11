<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K'Cars Home</title>
    <link rel="stylesheet" href="kuda.css">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>

<?php include "nav.php";?>

    <!-------home start------->
    <section class="home" id="home">
        <div class="home-text">
            <h1>Welcome!</h1>
            <h2>Temukan mobil impian anda,<br> Dan dapatkan sekarang!</h2>
        </div>

        <div class="home-img">
            <img src="../pict/pajeropth.png">
        </div>
    </section>

    <!-------About Start------->
    <section class="about" id="about">
        <div class="about-img">
            <img src="../pict/harga.png">
        </div>

        <div class="about-text">
            <span>Tentang kami</span>
            <h2>Kami menyediakan mobil <br> dengan kualitas yang terbaik!</h2>
            <p>Dapatkan diskon untuk beberapa mobil tertentu, saat adanya hari hari penting!</p>
            <a href="abtus.php" class="btn">Pelajari lebih lanjut!</a>
        </div>
    </section>

    <!-------Menu Start------->
    <section class="menu" id="menu">
        <div class="heading">
            <span>Penjualan Terbaik!</span>
            <h2>Harga pas, anda puas.</h2>
        </div>

        <div class="menu-container">
            <div class="box">
                <div class="box-img">
                    <img src="../pict/pajeropth.png">
                </div>
                <h2>Mitsubishi Pajero Sport</h2>
                <h3>Pajero Sport 2.4 Dakar 4x2 Solar-AT 2019 Putih</h3>
                <span>Rp429.000.000</span>
            </div>

            <div class="box">
                <div class="box-img">
                    <img src="../pict/innova2022.png">
                </div>
                <h2>Toyota Kijang Innova</h2>
                <h3>Toyota Kijang Innova 2.0 Venturer Bensin-AT 2022 Silver</h3>
                <span>Rp380.000.000</span>
            </div>

            <div class="box">
                <div class="box-img">
                    <img src="../pict/fortuner2014.png">
                </div>
                <h2>Toyota Fortuner</h2>
                <h3>Toyota Fortuner 2.5 G TRD Solar-AT 2014 Putih</h3>
                <span>Rp280.000.000</span>
            </div>
        </div>
    </section>

    <!-------Service Start------->
    <section class="services" id="services">
        <div class="heading">
            <span>Services</span>
            <h2>Kami menyediakan mobil dengan harga yang pas!</h2>
        </div>

        <div class="Service-container">
            <div class="s-box">
                <img src="../pict/contact.png">
                <h3>Kontak</h3>
                <p>Anda dapat kontak penjual untuk melakukan konsultasi untuk mendapatkan mobil yang sesuai
                    dengan apa yang anda inginkan.
                </p>
            </div>

            <div class="s-box">
                <img src="../pict/order.png">
                <h3>Order</h3>
                <p>Order, jika anda sudah mendapatkan mobil yang cocok dengan selra anda.</p>
            </div>

            <div class="s-box">
                <img src="../pict/transaksi.png">
                <h3>Transaksi</h3>
                <p>Segera lakukan transaksi, isi dengan teliti,
                    dan pastikan form transaksi yang anda isi sudah benar.</p>
            </div>

        </div>
    </section>

    <!-------call to action------->
    <section class="cta">
        <h2>Dapatkan mobil<br> yang anda inginkan!</h2>
        <a href="konsultasi.php" class="btn">Konsultasi sekarang!</a>
    </section>

    <!-------footer start------->
    <section id="contact">
        <div class="footer">
            <div class="main">
                <div class="col">
                    <h4>Menu Links</h4>
                    <ul>
                        <li><a href="#">Beranda</a></li>
                        <li><a href="katalog.php">Katalog</a></li>
                        <li><a href="transaksi.php">Transaksi</a></li>
                    </ul>
                </div>

                <div class="col">
                    <h4>Our Service</h4>
                    <ul>
                        <li><a href="profile.php">Web Design</a></li>
                        <li><a href="profile.php">Web Development</a></li>
                        <li><a href="profile.php">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col">
                    <h4>Information</h4>
                    <ul>
                        <li><a href="abtus.php">About Us</a></li>
                        <li><a href="howtobuy.php">How to Buy</a></li>
                    </ul>
                </div>

                <div class="col">
                    <h4>Menu Links</h4>
                    <div class="social">
                        <a href="#"><i class='bx bxl-facebook'></i></a>
                        <a href="#"><i class='bx bxl-instagram'></i></a>
                        <a href="#"><i class='bx bxl-twitter'></i></a>
                        <a href="#"><i class='bx bxl-youtube'></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>

</body>

</html>
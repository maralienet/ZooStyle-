<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,700;0,800;1,300;1,400;1,500;1,600&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">

    <title>ZooStyle</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="headAddr">
                <div class="address">
                    <img src='../pics/main/pin.png' alt="pin" />
                    <span>г. Минск, пр. Дзержинского, д. 15, пом. 858</span>
                </div>
                <div class="phones">
                    <img src='../pics/main/phone.png' alt="phone" />
                    <span>+375 (29) 151-00-75<br />+375 (33) 151-11-75</span>
                </div>
            </div>

            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand logo" href="main.php"><img src="../pics/logo.png">
                    ЗооСтиль</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse navcolp" id="navbarSupportedContent">
                    <ul class="navbar-nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" href="main.php">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.php">Услуги</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="gallery.php">Фотогалерея</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="about.php">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contacts.php">Контакты</a>
                        </li>
                    </ul>
                </div>
                <div class='account'>
                    <button onclick="checkRegCookie()">
                        <img class="user-icon" src='../pics/main/user.png' alt="User menu" />
                    </button>
                </div>
            </nav>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row tocenter">
            <div class="about1">
                <div>
                    <div class='blobsA2'>
                        <svg viewBox="0 0 620 647" width="620" height="647" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path fill="#C2E7DA" fillOpacity="0.85">
                                    <animate attributeName='d' dur='10s' repeatCount='indefinite' values='M619.018 146C621.418 44.8 533.351 6.5 489.018 0C415.518 16 411.018 89.5 340.518 187.5C270.018 285.5 46.0178 298.5 6.01777 359.5C-33.9822 420.5 137.018 557 177.518 598.5C218.018 640 291.518 656.5 381.018 640.5C470.518 624.5 479.018 513.5 489.018 470.5C497.018 436.1 541.351 356.167 562.518 320.5C580.351 304.5 616.618 247.2 619.018 146Z;
                            M598.5 142C600.9 40.8 533.351 6.5 489.018 0C415.518 16 411.018 89.5 340.518 187.5C270.018 285.5 46.0178 298.5 6.01784 359.5C-33.9822 420.5 164.5 502.5 205 544C245.5 585.5 281.5 621 371 605C460.5 589 479.018 513.5 489.018 470.5C497.018 436.1 577.333 369.167 598.5 333.5C616.333 317.5 596.1 243.2 598.5 142Z;
                            M619.018 146C621.418 44.8 533.351 6.5 489.018 0C415.518 16 411.018 89.5 340.518 187.5C270.018 285.5 46.0178 298.5 6.01777 359.5C-33.9822 420.5 137.018 557 177.518 598.5C218.018 640 291.518 656.5 381.018 640.5C470.518 624.5 479.018 513.5 489.018 470.5C497.018 436.1 541.351 356.167 562.518 320.5C580.351 304.5 616.618 247.2 619.018 146Z'>
                                    </animate>
                                </path>
                            </g>
                        </svg>
                    </div>

                    <div class='blobsA1'>
                        <svg viewBox="0 0 1059 618" width="1059" height="618" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path fill='#A899F2'>
                                    <animate attributeName='d' dur='10s' repeatCount='indefinite' values='M632.5 3.99999C489.7 -6.80001 361 3.99999 207 84C196 88.0755 104 143.5 47.5002 212.5C-8.99984 281.5 -12.9998 391 28.5002 514C70.0002 637 251 637 314 584C377 531 747.5 473.5 846 462C944.5 450.5 1053.5 333.5 1058 263.5C1062.5 193.5 1043.5 128 967.5 69C891.5 9.99999 811 17.5 632.5 3.99999Z;
                            M620.5 1.99998C477.7 -8.80002 419.5 54.5 255.5 82C153.5 110 131.5 170 75.0004 239C18.5004 308 -24.9998 389 16.5002 512C58.0002 635 239 635 302 582C365 529 735.5 471.5 834 460C932.5 448.5 1032.5 327.645 1032.5 257.5C1032.5 162 1001 141 925 82C849 23 799 15.5 620.5 1.99998Z;
                            M632.5 3.99999C489.7 -6.80001 361 3.99999 207 84C196 88.0755 104 143.5 47.5002 212.5C-8.99984 281.5 -12.9998 391 28.5002 514C70.0002 637 251 637 314 584C377 531 747.5 473.5 846 462C944.5 450.5 1053.5 333.5 1058 263.5C1062.5 193.5 1043.5 128 967.5 69C891.5 9.99999 811 17.5 632.5 3.99999Z'>
                                    </animate>
                                </path>
                            </g>
                        </svg>
                    </div>

                    <img src='../pics/about/woaman.jpg'></img>

                    <div class='DieAbout'>
                        <h3>Мы дарим любовь и заботу своим хвостатым посетителям.</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid about2 greenBcgd">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="blobs2-1 toright">
                    <img src='../pics/about/woman2.jpg' alt='Nataliya' class='dog2'></img>

                    <div class='blobs2'>
                        <svg viewBox="0 0 498 516" width="498" height="416" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path fill='#FFF'>
                                    <animate attributeName='d' dur='10s' repeatCount='indefinite' values='M16.9999 170.5C-18.2001 215.3 9.66659 266.333 26.4999 285.5C56.9998 321 104 323.5 156.5 298.5C209 273.5 289.5 150 296.5 100.5C303.5 50.9999 250.5 -13.5001 185 2.99993C119.5 19.4999 125 74.9999 95.5 108C66 141 60.9999 114.5 16.9999 170.5Z;
                            M15.4997 173C-19.7003 217.8 17.1667 246.333 34 265.5C64.4999 301 92.9999 314.5 145.5 289.5C198 264.5 278.5 141 285.5 91.4996C292.5 41.9996 274.5 0.499957 201.5 0.5C133.954 0.500039 86.5 31.5 57 64.5C27.5 97.5 59.4997 117 15.4997 173Z;
                            M16.9999 170.5C-18.2001 215.3 9.66659 266.333 26.4999 285.5C56.9998 321 104 323.5 156.5 298.5C209 273.5 289.5 150 296.5 100.5C303.5 50.9999 250.5 -13.5001 185 2.99993C119.5 19.4999 125 74.9999 95.5 108C66 141 60.9999 114.5 16.9999 170.5Z'>
                                    </animate>
                                </path>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class='DieAbout'>
                    <h3>О нас</h3>
                    <p>Мы молодая компания, которая занимается бьюти-услугами для животных. Наша миссия - сделать вашего питомца счастливым и красивым. Мы предлагаем разнообразные услуги, такие как стрижка, маникюр, мытьё, выгул и даже составление диеты. Мы работаем с профессиональными грумерами, ветеринарами и диетологами, которые любят животных и умеют учитывать их индивидуальные потребности. Мы гарантируем вам высокое качество, безопасность и удовлетворение от наших услуг. Мы ждем вас и вашего пушистого друга в нашем салоне!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container about3">
        <div class="row">
            <center>
                <h1><b>Наши мастера</b></h1>
            </center>
        </div>
        <div class="row tocenter">
        <?php
        require('code/showMasters.php');
        ?>
    </div>


    <footer>
        <div class="container">
            <div class="row unvislogo">
                <a href='main.php'><img src="../pics/logo.png" /></a>
            </div>
            <div class="row coltorows">
                <div class="col">
                    <p><a href='services.php'>Услуги</a></p>
                </div>
                <div class="col">
                    <p><a href='gallery.php'>Фотогалерея</a></p>
                </div>
                <div class="col vislogo">
                    <a href='main.php'><img src="../pics/logo.png" /></a>
                </div>
                <div class="col">
                    <p><a href='about.php'>О компании</a></p>
                </div>
                <div class="col">
                    <p><a href='contacts.php'>Контакты</a></p>
                </div>
            </div>
            <hr class="horLine" />
            <div class="row">
                <div class="col">
                    <div class="socials">
                        <div class="s-item">
                            <div class="fb"></div>
                        </div>
                        <div class="s-item">
                            <div class="inst"></div>
                        </div>
                        <div class="s-item">
                            <div class="tt"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row end">
                <div class="col">
                    <p>© ЗооСтиль 2023.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="../js/jquery-3.6.4.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <script src="../js/checkRegister.js"></script>
</body>

</html>
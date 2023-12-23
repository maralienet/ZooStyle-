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
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contacts.php">Контакты</a>
                        </li>
                    </ul>
                </div>
                <div class='account'>
                    <button><a href='registration.php'>
                            <img class="user-icon" src='../pics/main/user.png' alt="User menu" />
                        </a></button>
                </div>
            </nav>
        </div>
    </header>


    <div class="container">
        <div class="row">
            <center>
                <h1><b>Личный кабинет</b></h1>
            </center>
        </div>
        <div class="row me" style="margin-top: 20px">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="blobs2-1 toright">
                    <img src='../pics/services/dog.jpg' alt='dog' class='img-fluid dog2 mePhoto' />

                    <div class='blobs2'>
                        <svg viewBox="0 0 498 516" width="498" height="416" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path fill='#C2E7DA'>
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

            <div class="col-lg-4 col-md-6 col-sm-6 col-9">
            <?php
            require('code/showMe.php');
            ?>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-3">
                <div class="nede edits">
                    <button><span>Редактировать</span><img src='../pics/me/pencil.png' /></button>
                    <button><span>Удалить</span><img src='../pics/me/trash.png' /></button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-0 col-sm-0"></div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <h2>Мои записи</h2>
                <div class="myRecordsDIV">
                    <table class="myRecords">
                        <tr>
                            <th>Услуга</th>
                            <th>Адрес</th>
                            <th>Дата</th>
                        </tr>
                        <tr>
                            <td>Услуга</td>
                            <td>Адрес</td>
                            <td>Дата</td>
                        </tr>
                        <tr>
                            <td>Услуга</td>
                            <td>Адрес</td>
                            <td>Дата</td>
                        </tr>
                        <tr>
                            <td>Услуга</td>
                            <td>Адрес</td>
                            <td>Дата</td>
                        </tr>
                        <tr>
                            <td>Услуга</td>
                            <td>Адрес</td>
                            <td>Дата</td>
                        </tr>
                        <tr>
                            <td>Услуга</td>
                            <td>Адрес</td>
                            <td>Дата</td>
                        </tr>
                        <tr>
                            <td>Услуга</td>
                            <td>Адрес</td>
                            <td>Дата</td>
                        </tr>
                        <tr>
                            <td>Услуга</td>
                            <td>Адрес</td>
                            <td>Дата</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
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
                            <img src='../pics/main/facebook.png'></img>
                        </div>
                        <div class="s-item">
                            <img src='../pics/main/instagram.png'></img>
                        </div>
                        <div class="s-item">
                            <img src='../pics/main/tiktok.png'></img>
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
</body>

</html>
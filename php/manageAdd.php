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
                    <button onclick="checkRegCookie()">
                        <img class="user-icon" src='../pics/main/user.png' alt="User menu" />
                    </button>
                </div>
            </nav>
        </div>
    </header>


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
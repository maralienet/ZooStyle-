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


    <div class="container">
        <div class="row">
            <div class="col">
                <div class="auth1">
                    <div class='blobsC1'>
                        <svg viewBox="0 0 420 501" width="420" height="481" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path fill="#A899F2" fillOpacity="0.85">
                                    <animate attributeName='d' dur='10s' repeatCount='indefinite' values='M21.6986 453C-14.8384 421.889 4.12645 320.316 17.1151 284.985C24.8348 235.943 10.5855 159.48 21.6986 114.28C32.8116 69.0799 84.5 19.5 153.654 4.49828C214.808 -8.7678 252.961 15.1003 284.891 53.0178C316.822 90.9353 375.373 83.2793 418.55 137.097C461.728 190.915 426.653 224.356 390.045 250.785C358.355 273.207 315.116 285.337 268.835 316.878C222.553 348.419 230.701 433.755 188.5 473C146.299 512.245 67.5002 492 21.6986 453Z;
                            M24 424C2.69838 378.5 11.0113 308.331 24 273C31.7197 223.958 -8.41471 146.48 2.69838 101.28C13.8115 56.0799 65.8456 36.0017 135 21C196.153 7.73389 237.57 -16.9175 269.5 21C301.43 58.9175 356.373 70.2794 399.55 124.097C442.728 177.915 407.653 211.356 371.045 237.785C339.354 260.207 296.116 272.337 249.834 303.878C203.553 335.419 211.701 420.755 169.5 460C127.299 499.245 49.5064 478.481 24 424Z;
                            M21.6986 453C-14.8384 421.889 4.12645 320.316 17.1151 284.985C24.8348 235.943 10.5855 159.48 21.6986 114.28C32.8116 69.0799 84.5 19.5 153.654 4.49828C214.808 -8.7678 252.961 15.1003 284.891 53.0178C316.822 90.9353 375.373 83.2793 418.55 137.097C461.728 190.915 426.653 224.356 390.045 250.785C358.355 273.207 315.116 285.337 268.835 316.878C222.553 348.419 230.701 433.755 188.5 473C146.299 512.245 67.5002 492 21.6986 453Z'>
                                    </animate>
                                </path>
                            </g>
                        </svg>
                    </div>

                    <form id='adding'>
                        <h3><b>Авторизация</b></h3>
                        <div class="form-group input-container">
                            <input class="form-input" id="phonenum" name='phonenum' type="text" required />
                            <label for="phonenum">Номер телефона</label>
                        </div>

                        <div class="form-group input-container">
                            <input class="form-input" id="pass" name='pass' type="password" required />
                            <label for="name">Пароль</label>
                        </div>
                        <span id="sayError"></span>

                        <div class="already">
                            <p>
                                Ещё не зарегистрированы? <a href="registration.php">Регистрация</a>
                            </p>
                        </div>

                        <button class="btnSimp" type="submit">
                            Авторизация
                        </button>
                    </form>

                    <div class='blobsC2'>
                        <svg viewBox="0 0 400 329" width="397" height="329" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path fill="#C2E7DA" fill-opacity="0.85">
                                    <animate attributeName='d' dur='10s' repeatCount='indefinite' values='M381.888 296.309C411.618 253.885 392.569 141.432 364 106C330.653 64.8916 342.485 52.6043 311.5 16.2927C280.515 -20.0189 261.14 18.5153 222.477 16.2927C183.815 14.0701 157.95 35.9962 145.14 49.0818C132.386 62.1114 111.708 109.666 100.236 123.198C86.5166 139.379 73.1921 141.658 24.3597 189.842C-14.7063 228.39 3.80458 269.193 17.9433 284.776C35.5813 302.914 82.0652 334.172 126.897 314.101C182.938 289.012 262.598 317.641 264.764 319.074C266.93 320.507 344.726 349.34 381.888 296.309Z;
                            M393.5 266C423.23 223.575 378.069 158.629 349.5 123.198C316.153 82.0892 349.486 52.6047 318.5 16.2931C287.515 -20.0185 268.14 18.5157 229.478 16.2931C190.816 14.0705 164.95 35.9967 152.141 49.0822C139.386 62.1118 118.709 109.666 107.236 123.198C93.5171 139.38 80.1926 141.659 31.3601 189.843C-7.70583 228.39 -4.13878 241.417 9.99991 257C27.6379 275.138 76.1678 315.571 121 295.5C177.04 270.411 217.563 299.966 255 310C303.5 323 356.338 319.031 393.5 266Z;
                            M381.888 296.309C411.618 253.885 392.569 141.432 364 106C330.653 64.8916 342.485 52.6043 311.5 16.2927C280.515 -20.0189 261.14 18.5153 222.477 16.2927C183.815 14.0701 157.95 35.9962 145.14 49.0818C132.386 62.1114 111.708 109.666 100.236 123.198C86.5166 139.379 73.1921 141.658 24.3597 189.842C-14.7063 228.39 3.80458 269.193 17.9433 284.776C35.5813 302.914 82.0652 334.172 126.897 314.101C182.938 289.012 262.598 317.641 264.764 319.074C266.93 320.507 344.726 349.34 381.888 296.309Z'>
                                    </animate>
                                </path>
                            </g>
                        </svg>
                    </div>
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
    <script src="../js/authoriz.js"></script>
</body>

</html>
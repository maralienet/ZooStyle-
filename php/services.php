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
                        <li class="nav-item active">
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


    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="service1">
                <div>
                    <div class='blobsS2'>
                        <svg viewBox="0 0 707 595" width="707" height="595" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path fill='#C2E7DA'>
                                    <animate attributeName='d' dur='10s' repeatCount='indefinite' values='M674 323.5C585.512 513.93 385.5 596 264.5 594.5C89.0005 594.5 -11 488.5 1.99996 341C9.37944 257.271 203 8.99999 438 0.499988C673 -8.00001 759.5 139.5 674 323.5Z;
                            M638.5 284.5C563.438 480.61 372.001 565 251.001 563.5C75.5008 563.5 -10.9995 488.5 2.00043 341C9.37991 257.271 203 9 438 0.499998C673 -8 694 139.5 638.5 284.5Z;
                            M674 323.5C585.512 513.93 385.5 596 264.5 594.5C89.0005 594.5 -11 488.5 1.99996 341C9.37944 257.271 203 8.99999 438 0.499988C673 -8.00001 759.5 139.5 674 323.5Z'>
                                    </animate>
                                </path>
                            </g>
                        </svg>
                    </div>

                    <div class='blobsS1'>
                        <svg viewBox="0 0 784 677" width="784" height="677" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path fill='#A899F2'>
                                    <animate attributeName='d' dur='10s' repeatCount='indefinite' values='M207.5 83C58.2997 98.6 9.33304 219.167 3.49971 277.5C-17.5003 375 59.4997 460 146.5 487.5C233.5 515 403 627.5 487.5 660C572 692.5 682 675.5 730 627.5C778 579.5 782 448.5 763.5 422.5C745 396.5 736.5 277.5 763.5 220C790.5 162.5 793.5 83 747 38.5C700.5 -6.00001 622.5 -18.5 456.5 38.5C290.5 95.5 394 63.5 207.5 83Z;
                            M147 108.5C3.49962 155 -10.5007 225 5.99968 297.5C31.9451 411.5 44.4993 465 131.499 492.5C218.499 520 387.999 632.5 472.499 665C556.999 697.5 666.999 680.5 714.999 632.5C762.999 584.5 725.295 460.203 714.999 430C700 386 721.499 282.5 748.499 225C775.499 167.5 778.499 88 731.999 43.5C685.499 -1.00001 610.5 -11.5 432.5 16C259.044 42.7979 325.385 50.6958 147 108.5Z;
                            M207.5 83C58.2997 98.6 9.33304 219.167 3.49971 277.5C-17.5003 375 59.4997 460 146.5 487.5C233.5 515 403 627.5 487.5 660C572 692.5 682 675.5 730 627.5C778 579.5 782 448.5 763.5 422.5C745 396.5 736.5 277.5 763.5 220C790.5 162.5 793.5 83 747 38.5C700.5 -6.00001 622.5 -18.5 456.5 38.5C290.5 95.5 394 63.5 207.5 83Z'>
                                    </animate>
                                </path>
                            </g>
                        </svg>
                    </div>

                    <img src='../pics/services/dog.jpg' />

                    <div class='DieAbout'>
                        <h3>Мы предоставляем различные услуги высшего качества</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid main2 greenBcgd">
        <div class="row">
            <center>
                <h1><b>Наши услуги</b></h1>
                <p>У нас работают самые опытные мастера, предоставляя только качественные услуги, чтобы наши клиенты всегда оставались довольны</p>
            </center>
        </div>
        <div class="container cont">
            <div class="row box">
                <div class="col">
                    <div class='ServiceCard'>
                        <img src='../pics/main/claws.png' alt='Обрезание когтей' />
                        <h3><b>Обрезание когтей</b></h3>
                    </div>
                </div>
                <div class="col">
                    <div class='ServiceCard'>
                        <img src='../pics/main/wash.png' alt='Мытьё' />
                        <h3><b>Мытьё</b></h3>
                    </div>
                </div>
                <div class="col">
                    <div class='ServiceCard'>
                        <img src='../pics/main/groom.png' alt='Груминг' />
                        <h3><b>Груминг</b></h3>
                    </div>
                </div>
                <div class="col toright">
                    <div class='ServiceCard'>
                        <img src='../pics/main/walk.png' alt='Выгул' />
                        <h3><b>Выгул</b></h3>
                    </div>
                </div>
                <div class="col toleft">
                    <div class='ServiceCard'>
                        <img src='../pics/main/diet.png' alt='Диетолог' />
                        <h3><b>Диетолог</b></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="notifyWindow accepted align-items-center" style="display: none;">
        <h2>Заявка отправлена!</h2>
        <button onclick="closeWindow('accepted')">OK</button>
    </div>
    <div class="notifyWindow canceled align-items-center" style="display: none;">
        <h2>Вы не вошли в аккаунт!</h2>
        <button onclick="closeWindow('canceled')">Войти</button>
    </div>

    <div class="container main5">
        <div class="row">
            <div class="col">
                <div class="formBlobs">
                    <div class='blobsF1'>
                        <svg viewBox="0 0 366 458" width="366" height="458" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path fill='#A899F2'>
                                    <animate attributeName='d' dur='10s' repeatCount='indefinite' values='M357 218C397.172 130.428 288.364 31.1047 234.5 5.49995C180.635 -20.1048 137.969 49.1683 123.5 129.5C109.031 209.831 43.4111 200.258 5.95608 297.799C-31.4989 395.339 144.5 562.5 276.258 368.207C351.667 257.007 306.785 327.464 357 218Z;
                            M331 206C371.172 118.428 282.5 0.499936 212 0.499993C141.5 0.50005 91.969 34.1686 77.5 114.5C63.0309 194.832 -24.3435 243.328 7.00001 343C32 422.5 149.5 462 250.258 356.207C342.92 258.915 280.785 315.464 331 206Z;
                            M357 218C397.172 130.428 288.364 31.1047 234.5 5.49995C180.635 -20.1048 137.969 49.1683 123.5 129.5C109.031 209.831 43.4111 200.258 5.95608 297.799C-31.4989 395.339 144.5 562.5 276.258 368.207C351.667 257.007 306.785 327.464 357 218Z'>
                                    </animate>
                                </path>
                            </g>
                        </svg>
                    </div>

                    <form method='post' id='adding'>
                        <h4><b>Вы хотите записаться к нам?<br />Оставьте заявку!</b></h4>
                        <div class="form-group mb-3 input-container">
                            <input class="form-control form-input" id="name" type="text" required />
                            <label for='name'>Имя</label>
                        </div>

                        <span>Тип животного</span>
                        <div class="form-group input-container">
                            <select class="formSelect Select__control" id='petType'>
                                <?php
                                require("code/conn.php");
                                $sql = "SELECT petType FROM Services GROUP BY petType";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0)
                                    while ($row = $result->fetch_assoc())
                                        echo "<option id='servNames' value='" . $row["petType"] . "'>" . $row["petType"] . "</option>";
                                $conn->close();
                                ?>
                            </select>
                        </div>

                        <span>Услуга</span>
                        <div class="form-group input-container servDIV">
                            <select class="formSelect Select__control" id='services'></select>
                        </div>

                        <button class="btnSimp" type="submit">
                            Отправить
                        </button class="btnSimp" type="submit">
                    </form>
                    <div class='blobsF2'>
                        <svg viewBox="0 0 248 480" width="248" height="380" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path fill='#C2E7DA'>
                                    <animate attributeName='d' dur='10s' repeatCount='indefinite' values='M243.883 70.8056C228.662 -24.8804 117.039 -3.27227 63.13 19.4925C46.1062 93.5704 -0.499982 277 0.542476 318.142C1.58494 359.284 16.9997 388.5 90.9997 376.5C165 364.5 238.617 290.475 214 211C202.03 172.355 262.909 190.413 243.883 70.8056Z;
                            M228.001 57.5003C186 -33 107.04 5.72801 53.1312 28.4928C36.1074 102.571 -0.0424818 205.858 0.999977 247C2.04244 288.142 7.00089 397.5 81.0009 385.5C155.001 373.5 210 330.2 210 247C210 197 278.986 167.357 228.001 57.5003Z;
                            M243.883 70.8056C228.662 -24.8804 117.039 -3.27227 63.13 19.4925C46.1062 93.5704 -0.499982 277 0.542476 318.142C1.58494 359.284 16.9997 388.5 90.9997 376.5C165 364.5 238.617 290.475 214 211C202.03 172.355 262.909 190.413 243.883 70.8056Z'>
                                    </animate>
                                </path>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container service4">
        <div class="row">
            <h1><b>Цены</b></h1>
            <br />
        </div>
        <?php
        require("code/showPrices.php");
        ?>
        <!-- <h3><b>Обрезание когтей</b></h3>
                <p>Длинные когти могут травмировать окружающие поверхности, такие как диваны, ковры или обои. Мы можем помочь это предотвратить</p>

                <div class="prices">
                    <div class="type">
                        <div style="text-align:center">
                            <p><b>Коты</b></p>
                        </div><br />
                    </div>
                    <div class="pris">
                        <p>Умывание</p>
                        <div class="dots"></div>
                        <p>от 5р.</p>
                    </div>
                </div> -->
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
    <script src="../js/chooseType.js"></script>
    <script src="../js/orderAdd.js"></script>
</body>

</html>
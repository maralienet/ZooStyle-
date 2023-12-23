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
            <center>
                <h1><b>Управление</b></h1>
            </center>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12">
                <div class="managements" id='managements'>
                    <div class="manageItem" onclick="show('Пользователи')">
                        <p>Пользователи</p>
                    </div>

                    <div id="invisUSERS" style="display:none;">
                        <div class="manageItemHeader">
                            <div class="manageItem1">
                                <p>Пользователи</p>
                            </div>
                            <div class="cancel" onClick="show('')">
                                <img src='../pics/manage/cancel.png' />
                            </div>
                        </div>
                        <input type="text" class="searchInput" />

                        <fieldset class="fset">
                            <legend>Роль</legend>

                            <div>
                                <input type="radio" id="role1" name="role" value="Заказчик" />
                                <label for="role1">Заказчик</label>
                            </div>

                            <div>
                                <input type="radio" id="role2" name="role" value="Мастер" />
                                <label for="role2">Мастер</label>
                            </div>
                            <div>
                                <input type="radio" id="role3" name="role" value="Администратор" />
                                <label for="role3">Администратор</label>
                            </div>
                        </fieldset>
                        <fieldset class="fset">
                            <legend>Активность</legend>

                            <div>
                                <input type="radio" id="active1" name="active" value="true" />
                                <label for="active1">Да</label>
                            </div>

                            <div>
                                <input type="radio" id="active2" name="active" value="false" />
                                <label for="active2">Нет</label>
                            </div>
                        </fieldset>
                        <div class="edits">
                            <button><img src='../pics/manage/add.png' /></button>
                            <button><img src='../pics/me/trash.png' /></button>
                        </div>
                        <button type="submit" class="btnPurp">Найти</button>
                    </div>


                    <div class="manageItem" onclick="show('Услуги')">
                        <p>Услуги</p>
                    </div>


                    <div id="invisSERVICE" style="display:none;">
                        <div class="manageItemHeader">
                            <div class="manageItem1">
                                <p>Услуги</p>
                            </div>
                            <div class="cancel" onClick="show('')">
                                <img src='../pics/manage/cancel.png' />
                            </div>
                        </div>
                        <input type="text" class="searchInput" />

                        <fieldset class="fset">
                            <legend>Тип</legend>

                            <div>
                                <input type="radio" id="type1" name="type" value="Кошки" />
                                <label for="type1">Кошки</label>
                            </div>

                            <div>
                                <input type="radio" id="type2" name="type" value="Собаки" />
                                <label for="type2">Собаки</label>
                            </div>
                        </fieldset>
                        <fieldset class="fset">
                            <legend>Цена</legend>

                            <div>
                                <input type="radio" id="price1" name="price" value="20" />
                                <label for="price1">До 20р</label>
                            </div>

                            <div>
                                <input type="radio" id="price2" name="price" value="40" />
                                <label for="price2">До 40р</label>
                            </div>
                            <div>
                                <input type="radio" id="price3" name="price" value="60" />
                                <label for="price3">До 60р</label>
                            </div>
                        </fieldset>
                        <fieldset class="fset">
                            <legend>Активность</legend>

                            <div>
                                <input type="radio" id="active3" name="active" value="true" />
                                <label for="active3">Да</label>
                            </div>

                            <div>
                                <input type="radio" id="active4" name="active" value="false" />
                                <label for="active4">Нет</label>
                            </div>
                        </fieldset>
                        <button type="submit" class="btnPurp">Найти</button>
                    </div>

                    <div class="manageItem" onclick="show('Заявки')">
                        <p>Заявки</p>
                    </div>


                    <div id="invisORDER" style="display:none;">
                        <div class="manageItemHeader">
                            <div class="manageItem1">
                                <p>Заявки</p>
                            </div>
                            <div class="cancel" onClick="show('')">
                                <img src='../pics/manage/cancel.png' />
                            </div>
                        </div>
                        <input type="text" class="searchInput" />

                        <legend>Активность</legend>

                        <div>
                            <input type="radio" id="active5" name="active" value="true" />
                            <label for="active5">Да</label>
                        </div>

                        <div>
                            <input type="radio" id="active6" name="active" value="false" />
                            <label for="active6">Нет</label>
                        </div>
                        </fieldset>
                        <button type="submit" class="btnPurp">Найти</button>
                    </div>


                    <div class="manageItem" onclick="show('Салоны')">
                        <p>Салоны</p>
                    </div>


                    <div id="invisSALON" style="display:none;">
                        <div class="manageItemHeader">
                            <div class="manageItem1">
                                <p>Салоны</p>
                            </div>
                            <div class="cancel" onClick="show('')">
                                <img src='../pics/manage/cancel.png' />
                            </div>
                        </div>
                        <input type="text" class="searchInput" />

                        <legend>Активность</legend>

                        <div>
                            <input type="radio" id="active5" name="active" value="true" />
                            <label for="active5">Да</label>
                        </div>

                        <div>
                            <input type="radio" id="active6" name="active" value="false" />
                            <label for="active6">Нет</label>
                        </div>
                        </fieldset>
                        <button type="submit" class="btnPurp">Найти</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="infoTableDIV">
                    <table class="infoTable">
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Descr</th>
                            <th>Price</th>
                        </tr>
                        <tr>
                            <td>id</td>
                            <td>Name</td>
                            <td>Descr</td>
                            <td>Price</td>
                        </tr>
                        <tr>
                            <td>id</td>
                            <td>Name</td>
                            <td>Descr</td>
                            <td>Price</td>
                        </tr>
                        <tr>
                            <td>id</td>
                            <td>Name</td>
                            <td>Descr</td>
                            <td>Price</td>
                        </tr>
                        <tr>
                            <td>id</td>
                            <td>Name</td>
                            <td>Descr</td>
                            <td>Price</td>
                        </tr>
                        <tr>
                            <td>id</td>
                            <td>Name</td>
                            <td>Descr</td>
                            <td>Price</td>
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
    <script src="../js/showManagements.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <script src="../js/checkRegister.js"></script>
</body>

</html>
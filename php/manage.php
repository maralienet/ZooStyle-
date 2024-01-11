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
        <div class="row manage">
            <div class="edits">
                <button onclick="tables()"><span>Просмотр таблиц</span><img src='../pics/manage/table.png' /></button>
                <button onclick="editTables()"><span>Изменение таблиц</span><img src='../pics/me/pencil.png' /></button>
                <button onclick="photos()"><span>Добавить фото в галерею</span><img src='../pics/manage/photo.png' /></button>
                <button onclick="exit()"><span>Выйти</span><img src='../pics/me/exit.png' /></button>
            </div>
        </div>
        <div class="notifyWindow delete notifyWindowDel align-items-center" style="display: none; text-align:center;">
            <h3>Вы уверены, что хотите удалить запись?</h3>
            <div class="btns">
                <button onclick="deleteConfirm()">Да</button>
                <button onclick="hideWindow()">Нет</button>
            </div>
        </div>
        <div class="addForm addUser" style="display: none">
            <form>
                <h4>
                    <center>Добавление администратора</center>
                </h4>
                <div class="form-group input-container">
                    <input class="form-input phonenum" name='phonenum' maxlength="13" type="tel" required />
                    <label for="phonenum">Номер телефона</label>
                </div>
                <span class="sayError" id="sayErrorPhoneA"></span>

                <div class="form-group input-container">
                    <input class="form-input pass" name='pass' type="password" required />
                    <label for="pass">Пароль</label>
                </div>
                <span class="sayError sayErrorPass"></span>

                <span>Роль</span>
                <div class="form-group input-container">
                    <select class="formSelect Select__control" name="role">
                        <option value="Администратор" checked>Администратор</option>
                    </select>
                </div>
                <button class="btnSimp" type="submit">
                    Добавить
                </button>
            </form>
            <div onclick="closeForm()">
                <img class="close" src="../pics/manage/add.png">
            </div>
        </div>
        <div class="addForm addMaster" style="display: none">
            <form enctype="multipart/form-data">
                <h4>
                    <center>Добавление мастера</center>
                </h4>
                <div class="form-group input-container">
                    <input class="form-input phonenum" name='phonenum' maxlength="13" type="tel" required />
                    <label for="phonenum">Номер телефона</label>
                </div>
                <span class="sayError" id="sayErrorPhoneM"></span>

                <div class="form-group input-container">
                    <input class="form-input" name='name' type="text" required />
                    <label for="name">Имя</label>
                </div>

                <div class="form-group input-container">
                    <input class="form-input" name='surname' type="text" required />
                    <label for="surname">Фамилия</label>
                </div>

                <span>Предоставляемая услуга</span>
                <div class="form-group input-container">
                    <select class="formSelect Select__control" name="servtId" required>
                        <?php
                        require("code/conn.php");
                        $sql = "SELECT servtId,servtName FROM ServicesTypes";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0)
                            while ($row = $result->fetch_assoc())
                                echo "<option value='" . $row["servtId"] . "'>" . $row["servtName"] . "</option>";
                        $conn->close();
                        ?>
                    </select>
                </div>

                <div class="form-group input-container">
                    <input class="form-input" name='post' type="text" required />
                    <label for="post">Должность</label>
                </div>

                <span class="avatar">Фото</span>
                <label class="input-file">
                    <input type="file" accept="image/*" />
                    <span>Выберите файл</span>
                </label>
                <span class="sayError" id="sayErrorPhotoM"></span>
                <br />
                <button class="btnSimp" type="submit">
                    Добавить
                </button>
            </form>
            <div onclick="closeForm()">
                <img class="close" src="../pics/manage/add.png">
            </div>
        </div>
        <div class="addForm addCust" style="display: none">
            <form>
                <h4>
                    <center>Добавление заказчика</center>
                </h4>
                <div class="form-group input-container">
                    <input class="form-input phonenum" name='phonenum' maxlength="13" type="tel" required />
                    <label for="phonenum">Номер телефона</label>
                </div>
                <span class="sayError" id="sayErrorPhoneC"></span>

                <div class="form-group input-container">
                    <input class="form-input pass" name='pass' type="password" required />
                    <label for="pass">Пароль</label>
                </div>
                <span class="sayError sayErrorPass" id="sayErrorPassC"></span>

                <div class="form-group input-container">
                    <input class="form-input" name='name' type="text" required />
                    <label for="pass">Имя</label>
                </div>
                <button class="btnSimp" type="submit">
                    Добавить
                </button>
            </form>
            <div onclick="closeForm()">
                <img class="close" src="../pics/manage/add.png">
            </div>
        </div>
        <div class="addForm addServ" style="display: none">
            <form>
                <h4>
                    <center>Добавление услуги</center>
                </h4>
                <div class="form-group input-container">
                    <input class="form-input" name='name' type="text" required />
                    <label for="name">Название</label>
                </div>
                <span>Роль</span>
                <div class="form-group input-container">
                    <select class="formSelect Select__control" name="type">
                        <option value="Коты">Коты</option>
                        <option value="Собаки">Собаки</option>
                    </select>
                </div>
                <div class="form-group input-container">
                    <input class="form-input" name='price' type="number" required />
                    <label for="pass">Цена</label>
                </div>
                <span>Тип услуги</span>
                <div class="form-group input-container">
                    <select class="formSelect Select__control" name="servtId" required>
                        <?php
                        require("code/conn.php");
                        $sql = "SELECT servtId,servtName FROM ServicesTypes";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0)
                            while ($row = $result->fetch_assoc())
                                echo "<option value='" . $row["servtId"] . "'>" . $row["servtName"] . "</option>";
                        $conn->close();
                        ?>
                    </select>
                </div>
                <button class="btnSimp" type="submit">
                    Добавить
                </button>
            </form>
            <div onclick="closeForm()">
                <img class="close" src="../pics/manage/add.png">
            </div>
        </div>
        <div class="addForm addServt" style="display: none">
            <form>
                <h4>
                    <center>Добавление услуги</center>
                </h4>
                <div class="form-group input-container">
                    <input class="form-input" name='name' type="text" required />
                    <label for="name">Название</label>
                </div>
                <div class="form-group input-container">
                    <textarea class="form-input" name='descr' required></textarea>
                    <label for="descr">Описание</label>
                </div>

                <button class="btnSimp" type="submit">
                    Добавить
                </button>
            </form>
            <div onclick="closeForm()">
                <img class="close" src="../pics/manage/add.png">
            </div>
        </div>
        <div class="row tables" style='display:none;'>
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
                        <form id='usersForm'>
                            <input type="text" class="searchInput phoneInput" id='phonenum' placeholder="Поиск по телефону" />

                            <fieldset class="fset">
                                <legend>Роль</legend>
                                <div>
                                    <input type="radio" id="orderer" name="role" value="Заказчик" />
                                    <label for="orderer">Заказчик</label>
                                </div>

                                <div>
                                    <input type="radio" id="master" name="role" value="Мастер" />
                                    <label for="master">Мастер</label>
                                </div>
                                <div>
                                    <input type="radio" id="admin" name="role" value="Администратор" />
                                    <label for="admin">Администратор</label>
                                </div>
                            </fieldset>
                            <fieldset class="fset">
                                <legend>Активность</legend>

                                <div>
                                    <input type="radio" id="active_user" name="active" value="true" />
                                    <label for="active_user">Да</label>
                                </div>

                                <div>
                                    <input type="radio" id="inactive_user" name="active" value="false" />
                                    <label for="inactive_user">Нет</label>
                                </div>
                            </fieldset>
                            <div class="edits">
                                <button onclick='openAddWindow("Пользователи")'><img src='../pics/manage/add.png' /></button>
                            </div>
                            <button type="submit" class="btnPurp">Найти</button>
                        </form>
                    </div>

                    <div class="manageItem" onclick="show('Мастера')">
                        <p>Мастера</p>
                    </div>

                    <div id="invisMASTERS" style="display:none;">
                        <div class="manageItemHeader">
                            <div class="manageItem1">
                                <p>Мастера</p>
                            </div>
                            <div class="cancel" onClick="show('')">
                                <img src='../pics/manage/cancel.png' />
                            </div>
                        </div>
                        <form id="masterForm">
                            <input type="text" class="searchInput" id="surname" placeholder="Поиск по фамилии" />
                            <fieldset class="fset">
                                <legend>Активность</legend>

                                <div>
                                    <input type="radio" id="active_mast" name="active" value="true" />
                                    <label for="active_mast">Да</label>
                                </div>

                                <div>
                                    <input type="radio" id="inactive_mast" name="active" value="false" />
                                    <label for="inactive_mast">Нет</label>
                                </div>
                            </fieldset>
                            <div class="edits">
                                <button onclick='openAddWindow("Мастера")'><img src='../pics/manage/add.png' /></button>
                            </div>
                            <button type="submit" class="btnPurp">Найти</button>
                        </form>
                    </div>

                    <div class="manageItem" onclick="show('Заказчики')">
                        <p>Заказчики</p>
                    </div>

                    <div id="invisCUSTS" style="display:none;">
                        <div class="manageItemHeader">
                            <div class="manageItem1">
                                <p>Заказчики</p>
                            </div>
                            <div class="cancel" onClick="show('')">
                                <img src='../pics/manage/cancel.png' />
                            </div>
                        </div>
                        <form id="custForm">
                            <input type="text" class="searchInput" id='naming' placeholder="Поиск по имени" />
                            <fieldset class="fset">
                                <legend>С фото</legend>
                                <div>
                                    <input type="radio" id="wiphoto_ordr" name="photo" value="not null" />
                                    <label for="wiphoto_ordr">Да</label>
                                </div>

                                <div>
                                    <input type="radio" id="wophoto_ordr" name="photo" value="null" />
                                    <label for="wophoto_ordr">Нет</label>
                                </div>
                            </fieldset>
                            <fieldset class="fset">
                                <legend>Активность</legend>
                                <div>
                                    <input type="radio" id="active_ordr" name="active" value="true" />
                                    <label for="active_ordr">Да</label>
                                </div>

                                <div>
                                    <input type="radio" id="inactive_ordr" name="active" value="false" />
                                    <label for="inactive_ordr">Нет</label>
                                </div>
                            </fieldset>
                            <div class="edits">
                                <button onclick='openAddWindow("Заказчики")'><img src='../pics/manage/add.png' /></button>
                            </div>
                            <button type="submit" class="btnPurp">Найти</button>
                        </form>
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
                        <form id="servForm">
                            <input type="text" class="searchInput" id='service' placeholder="Поиск по виду" />

                            <fieldset class="fset">
                                <legend>Тип</legend>

                                <div>
                                    <input type="radio" id="cats_serv" name="type" value="Коты" />
                                    <label for="cats_serv">Коты</label>
                                </div>

                                <div>
                                    <input type="radio" id="dogs_serv" name="type" value="Собаки" />
                                    <label for="dogs_serv">Собаки</label>
                                </div>
                            </fieldset>
                            <fieldset class="fset">
                                <legend>Цена</legend>

                                <div>
                                    <input type="radio" id="do20" name="price" value="20" />
                                    <label for="do20">До 20р</label>
                                </div>

                                <div>
                                    <input type="radio" id="do40" name="price" value="40" />
                                    <label for="do40">До 40р</label>
                                </div>
                                <div>
                                    <input type="radio" id="do60" name="price" value="60" />
                                    <label for="do60">До 60р</label>
                                </div>
                            </fieldset>
                            <fieldset class="fset">
                                <legend>Активность</legend>

                                <div>
                                    <input type="radio" id="active_serv" name="active" value="true" />
                                    <label for="active_serv">Да</label>
                                </div>

                                <div>
                                    <input type="radio" id="inactive_serv" name="active" value="false" />
                                    <label for="inactive_serv">Нет</label>
                                </div>
                            </fieldset>
                            <div class="edits">
                                <button onclick='openAddWindow("Услуги")'><img src='../pics/manage/add.png' /></button>
                            </div>
                            <button type="submit" class="btnPurp">Найти</button>
                    </div>
                    </form>

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
                        <form id="ordForm">
                            <fieldset class="fset">
                                <legend>Тип</legend>

                                <div>
                                    <input type="radio" id="cats_ord" name="type" value="Коты" />
                                    <label for="cats_ord">Коты</label>
                                </div>
                                <div>
                                    <input type="radio" id="dogs_ord" name="type" value="Собаки" />
                                    <label for="dogs_ord">Собаки</label>
                                </div>
                            </fieldset>

                            <fieldset class="fset">
                                <legend>Дата</legend>

                                <div>
                                    <input type="radio" id="data1" name="data" value=" 1" />
                                    <label for="data1">За последний месяц</label>
                                </div>
                                <div>
                                    <input type="radio" id="data2" name="data" value="3" />
                                    <label for="data2">За последних 3 месяца</label>
                                </div>
                                <div>
                                    <input type="radio" id="data3" name="data" value="6" />
                                    <label for="data3">За последних полгода</label>
                                </div>
                            </fieldset>

                            <fieldset class="fset">
                                <legend>Статус</legend>

                                <div>
                                    <input type="radio" id="active_ord" name="active" value="true" />
                                    <label for="active_ord">Принят</label>
                                </div>

                                <div>
                                    <input type="radio" id="inactive_ord" name="active" value="false" />
                                    <label for="inactive_ord">Не принят</label>
                                </div>
                            </fieldset>
                            <button type="submit" class="btnPurp">Найти</button>
                        </form>
                    </div>

                    <div class="manageItem" onclick="show('Типы услуг')">
                        <p>Типы услуг</p>
                    </div>

                    <div id="invisSALON" style="display:none;">
                        <div class="manageItemHeader">
                            <div class="manageItem1">
                                <p>Типы услуг</p>
                            </div>
                            <div class="cancel" onClick="show('')">
                                <img src='../pics/manage/cancel.png' />
                            </div>
                        </div>
                        <form id="servtForm">
                            <input type="text" class="searchInput" id='typeName' placeholder="Поиск по названию" />

                            <fieldset class="fset">
                                <legend>Активность</legend>

                                <div>
                                    <input type="radio" id="active_servt" name="active" value="true" />
                                    <label for="active_servt">Да</label>
                                </div>

                                <div>
                                    <input type="radio" id="inactive_servt" name="active" value="false" />
                                    <label for="inactive_servt">Нет</label>
                                </div>
                            </fieldset>
                            <div class="edits">
                                <button onclick='openAddWindow("Типы услуг")'><img src='../pics/manage/add.png' /></button>
                            </div>
                            <button type="submit" class="btnPurp">Найти</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="infoTableDIV" id='table'>
                    <tr>
                        <h4 style="margin-top:10px">Выберите таблицу</h4>
                    </tr>
                </div>
            </div>
        </div>

        <div class="row editTables" style='display:none;'>
            <div class="col-lg-3 col-md-12 col-sm-12">

            </div>
            <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="infoTableDIV">
                    <tr>
                        <h4 style="margin-top:10px">Выберите таблицу</h4>
                    </tr>
                </div>
            </div>
        </div>
        <div class="addForm addPhoto" style="display: none">
            <form enctype="multipart/form-data">
                <h4>
                    <center>Добавление фото</center>
                </h4>
                <span>Тип животного</span>
                <div class="form-group input-container">
                    <select class="formSelect Select__control" name="petType" required>
                        <option value="Коты" checked>Коты</option>
                        <option value="Собаки">Собаки</option>
                    </select>
                </div>
                <span>Роль</span>
                <div class="form-group input-container">
                    <select class="formSelect Select__control" name="role" required>
                        <option value="best" checked>Лучшие</option>
                        <option value="all">Остальные</option>
                    </select>
                </div>
                <span class="avatar">Фото</span>
                <label class="input-file">
                    <input type="file" accept="image/*" />
                    <span>Выберите файл</span>
                </label>
                <span class="sayError" id="sayErrorPhotoP"></span>
                <button class="btnSimp" type="submit">
                    Добавить
                </button>
            </form>
            <div onclick="closeForm()">
                <img class="close" src="../pics/manage/add.png">
            </div>
        </div>
        <div class="row photos" style='display:none;'>
            <div class="col-lg-3 col-md-12 col-sm-12">
                <div class="managements" id='photoManagements'>
                    <div class="manageItem" onclick="show('Лучшие')">
                        <p class='bp'>Лучшие фото</p>
                    </div>
                    <div class="manageItem" onclick="show('Остальные')">
                        <p class='op'>Остальные фото</p>
                    </div>
                    <div class="manageItem" onclick="openAddWindow('Фото')">
                        <button class="btnPurp" onclick="">Добавить фото</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="infoTableDIV" id="photoTable">
                    <tr>
                        <h4 style="margin-top:10px">Выберите пункт меню</h4>
                    </tr>
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

    <script src="../js/managing.js"></script>
    <script src="../js/checkRegister.js"></script>
</body>

</html>
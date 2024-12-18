<?php
    require_once 'sessionStart.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap-5.3.3/bootstrap.css" rel="stylesheet">
    <title>Интернет-магазин XCOP-SHOP</title>
    <link rel="icon" href= "pic/icons/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="style.css">
</head>


<body>
<div class="header">
    <div class="lang-navbar">
        <div class="container-fluid">
            <div class="row">
                <nav class="nav">
                <aside class="col-md-2">
                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#citiesModal">
                        <img src="pic/icons/icon_pin.svg" width="20" height="20" alt="icon_pin">
                        Волгоград                
                        <img src="pic/icons/icon_open_selection_2.svg" width="10" height="6" alt="icon_arrow_down">
                    </button>
                      
                    <div class="modal fade" id="citiesModal" tabindex="-1" aria-labelledby="CitiesModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Выберите город</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Введите название города" aria-label="пример ввода по умолчанию">
                                </div>

                            <div class="container text-center" id="listOfCities">
                                <div class="row">
                                    <div class="col-4">
                                        <a class="selectCity" href="#">
                                            <img src="pic/icons/geo_blue.svg" width="20" height="20" alt="icon_pin">Москва
                                        </a> 
                                    </div>
                                    <div class="col-4">
                                        <a class="selectCity" href="#">
                                            <img src="pic/icons/geo_blue.svg" width="20" height="20" alt="icon_pin">Нижний Новгород
                                        </a> 
                                    </div>
                                    <div class="col-4">
                                        <a class="selectCity" href="#">
                                            <img src="pic/icons/geo_blue.svg" width="20" height="20" alt="icon_pin">Самара
                                        </a> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <a class="selectCity" href="#">
                                            <img src="pic/icons/geo_blue.svg" width="20" height="20" alt="icon_pin">Санкт-Петербург
                                        </a> 
                                    </div>
                                    <div class="col-4">
                                        <a class="selectCity" href="#">
                                            <img src="pic/icons/geo_blue.svg" width="20" height="20" alt="icon_pin">Волгоград
                                        </a> 
                                    </div>
                                    <div class="col-4">
                                        <a class="selectCity" href="#">
                                            <img src="pic/icons/geo_blue.svg" width="20" height="20" alt="icon_pin">Уфа
                                        </a> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <a class="selectCity" href="#">
                                            <img src="pic/icons/geo_blue.svg" width="20" height="20" alt="icon_pin">Новосибирск
                                        </a> 
                                    </div>
                                    <div class="col-4">
                                        <a class="selectCity" href="#">
                                            <img src="pic/icons/geo_blue.svg" width="20" height="20" alt="icon_pin">Воронеж
                                        </a> 
                                    </div>
                                    <div class="col-4">
                                        <a class="selectCity" href="#">
                                            <img src="pic/icons/geo_blue.svg" width="20" height="20" alt="icon_pin">Челябинск
                                        </a> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <a class="selectCity" href="#">
                                            <img src="pic/icons/geo_blue.svg" width="20" height="20" alt="icon_pin">Екатеринбург
                                        </a> 
                                    </div>
                                    <div class="col-4">
                                        <a class="selectCity" href="#">
                                            <img src="pic/icons/geo_blue.svg" width="20" height="20" alt="icon_pin">Пермь
                                        </a> 
                                    </div>
                                    <div class="col-4">
                                        <a class="selectCity" href="#">
                                            <img src="pic/icons/geo_blue.svg" width="20" height="20" alt="icon_pin">Омск
                                        </a> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <a class="selectCity" href="#">
                                            <img src="pic/icons/geo_blue.svg" width="20" height="20" alt="icon_pin">Казань
                                        </a> 
                                    </div>
                                    <div class="col-4">
                                        <a class="selectCity" href="#">
                                            <img src="pic/icons/geo_blue.svg" width="20" height="20" alt="icon_pin">Ростов-на-Дону
                                        </a> 
                                    </div>
                                    <div class="col-4">
                                        <a class="selectCity" href="#">
                                            <img src="pic/icons/geo_blue.svg" width="20" height="20" alt="icon_pin">Красноярск
                                        </a> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-flex p-2"><h4>А</h4></div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <a class="selectCity" href="#">
                                            <img src="pic/icons/geo_blue.svg" width="20" height="20" alt="icon_pin">Архангельск
                                        </a> 
                                    </div>
                                    <div class="col-4">
                                        <a class="selectCity" href="#">
                                            <img src="pic/icons/geo_blue.svg" width="20" height="20" alt="icon_pin">Абакан
                                        </a> 
                                    </div>
                                    <div class="col-4">
                                        <a class="selectCity" href="#">
                                            <img src="pic/icons/geo_blue.svg" width="20" height="20" alt="icon_pin">Астрахань
                                        </a> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <a class="selectCity" href="#">
                                            <img src="pic/icons/geo_blue.svg" width="20" height="20" alt="icon_pin">Альметьевск
                                        </a> 
                                    </div>
                                    <div class="col-4">
                                        <a class="selectCity" href="#">
                                            <img src="pic/icons/geo_blue.svg" width="20" height="20" alt="icon_pin">Армавир
                                        </a> 
                                    </div>
                                </div>
                            </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </aside>
                <aside class="col-md-10 sidebar">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link disabled">
                            <img src="pic/icons/icon_clock.svg" width="20" height="20" alt="icon_clock">
                            Режим работы: 9:00 — 21:00
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <img src="pic/icons/icon_phone.svg" class="site_header__icon--default" width="20" height="20" alt="icon_phone">
                            +7 495 799-96-69
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <img src="pic/icons/icon_phone-2_black.svg" class="site_header__icon--default" width="20" height="20" alt="icon_phone-2_black">
                            <span>Заказать звонок</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <img src="pic/icons/icon_chat_black_2.svg" class="site_header__icon--default" width="20" height="20" alt="icon_chat">
                            <span>Отправить запрос</span>
                        </a>
                    </li>
                </ul>
                </aside>
            </div>
        </nav>
        </div>
    </div>

    <div class="container-fluid">
        <div class="d-flex justify-content-end">
        <p>Сейчас вы <?php echo (!empty($_SESSION['auth'])) ? "авторизованы" : "не авторизованы";?>.&nbsp</p>
        <?php
            if (!empty($_SESSION['auth']))
            { ?>
                <p>Вы вошли как: <strong> <?php echo htmlspecialchars($_SESSION['login']);?></strong>.&nbsp;</p>
                <p><a href='logOut.php'>Выйти</a></p>
            <?php
            }
            else
            {
        ?>
            <p><a href="authorizationForm.php" >Авторизоваться</a> или <a href="registrationForm.php">Зарегистрироваться</a></p>
        <?php
            }
        ?>
        </div>

    </div>

    <div class="container-fluid">
        <ul class="nav justify-content-between">
            <li class="nav-item">
                <a href="welcome.php">
                    <img src="pic/icons/xcomshop-logo-main-middle.svg" alt="XCOM" width="148" height="44">
                </a>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-primary" data-bs-toggle="button">
                    <img class="icon2" src="pic/icons/icon_all_catalog2.svg">
                    Каталог
                  </button>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Поиск по каталогу" aria-label="Каталог" aria-describedby="button-addon2">
                    <button class="btn" type="button" id="button-addon2">
                      <img class="icon2" src="pic/icons/icon-search.svg">
                  </button>
                </div>

            </li>
            <div class="d-flex">
            <li class="nav-item">
                <button type="button" class="btn ">
                    <img class="icon2" src="pic/icons/heart-icon.svg">
                    Избранное
                    </button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn">
                    <img class="icon2" src="pic/icons/compare-icon.svg">
                    Сравнение
                    </button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn">
                    <img class="icon2" src="pic/icons/cart-icon.svg">
                    Корзина
                    </button>
            </li>
            </div>
        </ul>
    </div>

    <div class="goods-navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">
                        <img class="icon2" src="pic/icons/promo-icon.svg">
                        Акции </a>
                </li>
                <li class="nav-item">   
                    <a class="nav-link active" href="#">
                    <img class="icon2" src="pic/icons/percent-icon.svg">
                    Распродажа</a>
                </li>
                </ul>
            </div>

            <div class="col-9">
            <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#">
                <img class="icon2" src="pic/icons/icon-about.svg">
                О нас</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">
                <img class="icon2" src="pic/icons/icon-contacts.svg">
                Контакты</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">
                <img class="icon2" src="pic/icons/icon-wallet.svg">
                Оплата</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">
                <img class="icon2" src="pic/icons/icon-shield.svg">
                Гарантия</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">
                <img class="icon2" src="pic/icons/icon-delivery.svg">
                Доставка</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">
                <img class="icon2" src="pic/icons/icon-services.svg">
                Услуги</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link">
                <img class="icon2" src="pic/icons/icon-portfolio.svg">
                Корпоративным клиентам</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                  <img class="icon2" src="pic/icons/icon_menu.svg">
                  Меню</a>
                <ul class="dropdown-menu">
                    <li class="nav-item"> 
                      <a class="dropdown-item">
                        <img class="icon2" src="pic/icons/icon-leasing.svg">
                        Лизинг</a></li>
                    <li class="nav-item">
                    <a class="dropdown-item" href="#">
                      <img class="icon2" src="pic/icons/consultation-new-icon.svg">
                    Консультационный центр</a></li>
                    <li class="nav-item">
                      <a class="dropdown-item" href="#">
                        <img class="icon2" src="pic/icons/icon-supply.svg">
                      Поставщикам</a></li>
                </ul>
              </li>


            </ul>
            </div>
        </div>
    </div>
</div>

<?php
//Две строчки ниже для защиты форм от спам-ботов
session_start();
$_SESSION['sf_key'] = md5(substr( session_id(), mt_rand(0,10), mt_rand(3,10) ) . time() ); 

header('Content-Type: text/html; charset=utf-8');
header('X-UA-Compatible: IE=edge');
include 'functions.php';

$title = 'MOSHOZTORG';
$desc = 'Товары для дома и сада';
$url = SI_CurrentPageURL();
$image = SI_CurrentPageImage();

//https://sypexgeo.net/ru/about/
if (file_exists('SxGeo.php')) {
    include 'SxGeo.php';
    $web_time = '';

    $SxGeo = new SxGeo('SxGeo.dat');
    $SxGeoCity = new SxGeo('SxGeoCity.dat');
    $ip = $_SERVER['REMOTE_ADDR'];
    $country = $SxGeo->getCountry($ip);
    $region = $SxGeoCity->getCityFull($ip);
    $regionCity = $region["city"]["name_ru"];

    if ($country == "RU") {
        $web_time = '12:00';
        switch ($regionCity) {
            case 'Калининград':
                $web_time = '10:00';
                break;
            case 'Москва':
                $web_time = '11:00';
                break;
            case 'Санкт-Петербург':
                $web_time = '11:00';
                break;
        }
    } else if ($country == "UA") {
        $web_time = '10:00';
    } else if ($country == "BY") {
        $web_time = '11:00';
    } else {
        $web_time = '12:00 по Москве';
    }
}
?>

<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" class="loading">


<head>

    <!-- Meta information (content-type + mobile mod) -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="format-detection" content="telephone=no">
    <meta name="cmsmagazine" content="2f345f737ed0d95e9259d18f5edc8cd7">
    <meta name="tagline" content="http://hello-brand.ru/">


    <!-- Favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- Favicon -->
    <link rel="icon" href="images/mht-service.jpg" type="image/png">
    <link rel="shortcut icon" href="images/mht-service.jpg" type="image/png">


    <!-- CSS styles -->
    <link rel="stylesheet" href="css/jquery.fancybox.min.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/jquery.formstyler.min.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/swiper.min.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style-fix.css" type="text/css" media="screen">


    <!-- OGP -->
    <meta property="og:title" content="<?php echo $title; ?>"/>
    <meta property="og:description" content="<?php echo $desc; ?>"/>
    <meta property="og:url" content="<?php echo $url; ?>">
    <meta property="og:image" content="<?php echo $image; ?>">


    <!-- Page title -->
    <title><?php echo $title; ?> | <?php echo $desc; ?></title>


</head>


<body id="main">
<div id="global-wrapper">

    <!--===================================================== Loader -->
<!--        <div class="loader">-->
<!--            <div class="pseudo-table">-->
<!--                <div class="pseudo-table-cell align-center">-->
<!---->
<!--                    <div class="a-loader a-loader-2">-->
<!--                        <div class="bar-1"></div>-->
<!--                        <div class="bar-2"></div>-->
<!--                        <div class="bar-3"></div>-->
<!--                        <div class="bar-4"></div>-->
<!--                        <div class="bar-5"></div>-->
<!--                        <div class="bar-6"></div>-->
<!--                        <div class="bar-7"></div>-->
<!--                        <div class="bar-8"></div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="loader-text">-->
<!--                        загрузка-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

    <!--===================================================== Header -->
    <header class="section-header" id="header">
        <div class="container">
            <div class="row line_bottom cre-animate" data-animation="scale-up" data-speed="1500" data-delay="500" data-offset="90%" data-easing="ease">
                <div class="col-1-1">
                    <div class="basic_nav">
                        <div class="left_column-nav">
                            <div>
                                <select name="city">
                                    <option>Санкт-Петербург</option>
                                    <option>Москва</option>
                                    <option>Казань</option>
                                </select>
                            </div>
                            <div class="first_menu">
                                <ul>
                                    <li><a href="#">sale</a></li>
                                    <li><a href="#">бренды</a></li>
                                    <li><a href="#">магазины</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="logo_block">
                            <a class="logo" href="#"></a>
                        </div>
                        <div class="si-phone align-right">

                            <a href="tel:+78001234545" class="phone-link dark">
                                <div class="icon-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                        <path id="Phone_icon" class="cls-1" d="M1402.08,28.92c-1.19-1.187-2.32-2.563-1.78-3.107,0.78-.778,1.46-1.258.08-2.973s-2.3-.4-3.06.356c-0.87.87-.04,4.113,3.16,7.319s6.45,4.03,7.32,3.159c0.76-.754,2.07-1.673.36-3.052s-2.2-.7-2.98.077C1404.64,31.242,1403.27,30.108,1402.08,28.92Z" transform="translate(-1397 -22)"/>
                                    </svg>
                                </div>
                                <span>8 800</span> 123-45-45</a>
                            <a class="enter" href="#">Вход</a>/<a class="enter" href="#">Регистрация</a>
                            <div class="heart_block">
                                <div class="icon-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20.91" height="18.188" viewBox="0 0 20.91 18.188">
                                        <path id="Heart_icon" class="cls-1 Heart_icon" d="M1467.39,53.4a5.441,5.441,0,0,0-7.52,0l-0.29.281-0.38-.281a5.541,5.541,0,0,0-7.6,0,5.027,5.027,0,0,                                       0,.04,7.28l7.05,6.777a3.382,3.382,0,0,0,.89.642,5.4,5.4,0,0,0,.81-0.642l7-6.777A5.026,5.026,0,0,0,1467.39,
                                        53.4Z" transform="translate(-1449.06 -50.906)"/>
                                    </svg>
                                </div>
                                <div class="grey_circle">0</div>
                            </div>
                            <div class="cart_block">
                                <div class="icon-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17.07" height="16.188" viewBox="0 0 17.07 16.188">
                                        <path id="Cart_icon" class="cls-1 Cart_icon" d="M1539.03,61.027a0.892,0.892,0,0,1-.88.773H1528.1l0.14,0.9h9.02a0.9,0.9,0,0,1,0,1.8h-9.77a0.828,0.828,0,0,1-.32-0.067,0.5,0.5,0,0,1-.1-0.058,1.3,1.3,0,0,1-.18-0.117c-0.03-.031-0.05-0.066-0.08-0.1a0.974,0.974,0,0,1-.11-0.162,0.622,0.622,0,0,1-.04-0.136,0.242,0.242,0,0,1-.04-0.112L1524.96,53.7h-1.24a0.9,0.9,0,0,1,0-1.8h2a0.888,0.888,0,0,1,.87.752l0.17,1.047h12.28a0.88,0.88,0,0,1,.67.311,0.926,0.926,0,0,1,.21.717ZM1534.6,60h2.78l0.25-1.8h-3.03V60Zm-4.44-4.5h-3.1l0.3,1.828a0.445,0.445,0,0,1,.13-0.028h2.67V55.5Zm0,2.7h-2.66l0.3,1.8h2.36V58.2Zm3.55-2.7h-2.67v1.8h2.67V55.5Zm0,2.7h-2.67V60h2.67V58.2Zm0.89-2.7v1.8h3.16l0.25-1.8h-3.41Zm-5.78,9.9a1.35,1.35,0,1,1-1.33,1.35A1.345,1.345,0,0,1,1528.82,65.4Zm8,0a1.35,1.35,0,1,1-1.33,1.35A1.343,1.343,0,0,1,1536.82,65.4Z" transform="translate(-1522.84 -51.906)"/>
                                    </svg>
                                </div>
                                <div class="red_circle_mini">2</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row cre-animate" data-animation="scale-up" data-speed="1500" data-delay="700" data-offset="90%" data-easing="ease">
                <div class="col-1-1 col-1-xs">
                    <div class="row_second_nav">
                        <div class="menu-second">
                            <a class="catalog_link" href="#"><div class="burger"></div> Каталог</a>
                            <ul>
                                <li><a href="#">Для дома</a></li>
                                <li><a href="#">Бытовая химия</a></li>
                                <li><a href="#">Для уборки</a></li>
                                <li><a href="#">Средства для насекомых</a></li>
                                <li><a href="#">Для Пасхи</a></li>
                                <li><a href="#">Ещё</a></li>
                            </ul>
                        </div>
                        <div class="research">
                            <input type="text" name="research" placeholder="Поиск" />
                            <input type="submit" class="submit_research" value=""/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--===================================================== Header mobile-->
    <header class="section-header-mobile cre-animate" data-animation="scale-up" data-speed="1500" data-delay="900" data-offset="90%" data-easing="ease" id="header-mobile">
        <div class="container">
            <div class="row line_bottom">
                <div class="col-1-1 col-1-xs justify-content">
                    <div class="left_column-nav">
                        <a class="catalog_link" href="#"><div class="burger"></div> Каталог</a>
                    </div>
                    <div class="logo_block">
                        <a class="logo" href="#"></a>
                    </div>
                    <div class="research">
                        <input type="submit" class="submit_research" value=""/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1-1 col-1-xs justify-content">
                    <div class="mobile_select">
                        <select name="city">
                            <option>Санкт-Петербург</option>
                            <option>Москва</option>
                            <option>Казань</option>
                        </select>
                    </div>
                    <div class="si-phone align-right">
                        <a class="enter" href="#">Вход</a>/<a class="enter" href="#">Регистрация</a>
                        <div class="heart_block">
                            <div class="icon-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20.91" height="18.188" viewBox="0 0 20.91 18.188">
                                    <path id="Heart_icon" class="cls-1 Heart_icon" d="M1467.39,53.4a5.441,5.441,0,0,0-7.52,0l-0.29.281-0.38-.281a5.541,5.541,0,0,0-7.6,0,5.027,5.027,0,0,                                       0,.04,7.28l7.05,6.777a3.382,3.382,0,0,0,.89.642,5.4,5.4,0,0,0,.81-0.642l7-6.777A5.026,5.026,0,0,0,1467.39,
                                        53.4Z" transform="translate(-1449.06 -50.906)"/>
                                </svg>
                            </div>
                            <div class="grey_circle">0</div>
                        </div>
                        <div class="cart_block">
                            <div class="icon-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17.07" height="16.188" viewBox="0 0 17.07 16.188">
                                    <path id="Cart_icon" class="cls-1 Cart_icon" d="M1539.03,61.027a0.892,0.892,0,0,1-.88.773H1528.1l0.14,0.9h9.02a0.9,0.9,0,0,1,0,1.8h-9.77a0.828,0.828,0,0,1-.32-0.067,0.5,0.5,0,0,1-.1-0.058,1.3,1.3,0,0,1-.18-0.117c-0.03-.031-0.05-0.066-0.08-0.1a0.974,0.974,0,0,1-.11-0.162,0.622,0.622,0,0,1-.04-0.136,0.242,0.242,0,0,1-.04-0.112L1524.96,53.7h-1.24a0.9,0.9,0,0,1,0-1.8h2a0.888,0.888,0,0,1,.87.752l0.17,1.047h12.28a0.88,0.88,0,0,1,.67.311,0.926,0.926,0,0,1,.21.717ZM1534.6,60h2.78l0.25-1.8h-3.03V60Zm-4.44-4.5h-3.1l0.3,1.828a0.445,0.445,0,0,1,.13-0.028h2.67V55.5Zm0,2.7h-2.66l0.3,1.8h2.36V58.2Zm3.55-2.7h-2.67v1.8h2.67V55.5Zm0,2.7h-2.67V60h2.67V58.2Zm0.89-2.7v1.8h3.16l0.25-1.8h-3.41Zm-5.78,9.9a1.35,1.35,0,1,1-1.33,1.35A1.345,1.345,0,0,1,1528.82,65.4Zm8,0a1.35,1.35,0,1,1-1.33,1.35A1.343,1.343,0,0,1,1536.82,65.4Z" transform="translate(-1522.84 -51.906)"/>
                                </svg>
                            </div>
                            <div class="red_circle_mini">2</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!--===================================================== section-slade_one -->
    <section class="section-slade_one" id="slade_one">
        <div class="block-slider-holder">
            <div class="block-slider swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="container">
                            <div class="row">
                                <div class="col-1-1">
                                    <div class="slade_one_text">
                                        <h1 class="h1_title">
                                            Красота<Br> по-швейцарски
                                        </h1>
                                        <p class="sub-h1">
                                            Доступная линейка эксклюзивной косметики*
                                        </p>
                                        <h2 class="h2_title">
                                            от 270 р.
                                        </h2>
                                        <a class="orange_button button" href="#">
                                            Выбрать
                                        </a>
                            <span class="grey-text">
                                *Цена действительна до 8 Марта
                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="container">
                            <div class="row">
                                <div class="col-1-1">
                                    <div class="slade_one_text">
                                        <h1 class="h1_title">
                                            Красота<Br> по-швейцарски
                                        </h1>
                                        <p class="sub-h1">
                                            Доступная линейка эксклюзивной косметики*
                                        </p>
                                        <h2 class="h2_title">
                                            от 270 р.
                                        </h2>
                                        <a class="orange_button button" href="#">
                                            Выбрать
                                        </a>
                            <span class="grey-text">
                                *Цена действительна до 8 Марта
                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="container">
                            <div class="row">
                                <div class="col-1-1">
                                    <div class="slade_one_text">
                                        <h1 class="h1_title">
                                            Красота<Br> по-швейцарски
                                        </h1>
                                        <p class="sub-h1">
                                            Доступная линейка эксклюзивной косметики*
                                        </p>
                                        <h2 class="h2_title">
                                            от 270 р.
                                        </h2>
                                        <a class="orange_button button" href="#">
                                            Выбрать
                                        </a>
                            <span class="grey-text">
                                *Цена действительна до 8 Марта
                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="container">
                            <div class="row">
                                <div class="col-1-1">
                                    <div class="slade_one_text">
                                        <h1 class="h1_title">
                                            Красота<Br> по-швейцарски
                                        </h1>
                                        <p class="sub-h1">
                                            Доступная линейка эксклюзивной косметики*
                                        </p>
                                        <h2 class="h2_title">
                                            от 270 р.
                                        </h2>
                                        <a class="orange_button button" href="#">
                                            Выбрать
                                        </a>
                            <span class="grey-text">
                                *Цена действительна до 8 Марта
                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="block-pagination swiper-pagination"></div>
            <div class="block-next swiper-button-next">
<!--                <img src="images/next.jpg" alt="next"/>-->
            </div>
            <div class="block-prev swiper-button-prev">
<!--                <img src="images/prev.jpg" alt="prev"/>-->
            </div>
        </div>
    </section>


    <!--===================================================== section-slade_two -->
    <section class="section-slade_two" id="slade_two">
        <div class="container">
            <p class="title_slade">
                <span class="orange_text">Торопитесь!</span> Действие акции ограничено
            </p>
            <div class="row">
                <div class="col-2-3 col-1-xs">
                    <div class="big_picture cre-animate" data-animation="scale-up" data-speed="1500" data-delay="500" data-offset="90%" data-easing="easeInOutBack">
                        <div class="red_circle">
                            50%
                        </div>
                        <div class="big_picture-text">
                            <h3>
                                Моем окна<br> к весне!
                            </h3>
                            <div class="line-orange"></div>
                            <p class="sub-h3">
                                Обзор новинок среди эффективных средств для мойки окон.
                            </p>
                            <a class="button orange_button" href="#">
                                Узнать больше
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-1-3 col-1-xs">
                    <div class="small_picture cre-animate" data-animation="scale-up" data-speed="1500" data-delay="700" data-offset="90%" data-easing="ease">
                        <div class="red_circle">
                            70%
                        </div>
                        <div class="big_picture-text">
                            <h6>
                                Навстречу солнцу
                            </h6>
                            <div class="line-orange"></div>
                            <p class="sub-h6">
                                Защитные средства
                                от солнца для всех членов семьи.
                            </p>

                        </div>
                    </div>
                    <div class="small_picture_one cre-animate" data-animation="scale-up" data-speed="1000" data-delay="900" data-offset="90%" data-easing="ease">
                        <div class="red_circle">
                            65%
                        </div>
                            <h6 class="h6_text">
                                Ещё
                                название
                            </h6>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--===================================================== section-slade_three  -->
    <section class="section-slade_three" id="slade_three">
        <div class="container">
            <div class="row">
                <div class="col-1-1">
                    <div class="red_circle cre-animate" data-animation="scale-up" data-speed="1600" data-delay="500" data-offset="90%" data-easing="easeOutBack">
                        50%
                    </div>
                    <div class="slade_one_text cre-animate" data-animation="scale-up" data-speed="1600" data-delay="600" data-offset="90%" data-easing="ease">
                        <h1>
                            А Вы готовы <br>
                            к сезону шашлыков?
                        </h1>
                        <p class="sub-h1 cre-animate" data-animation="scale-up" data-speed="1600" data-delay="700" data-offset="90%" data-easing="ease">
                            Вас всегда назначают ответственным за приготовление обеда на природе? Узнайте, что необходимо для идеального шашлыка.
                        </p>
                        <a class="button orange_button cre-animate" data-animation="scale-up" data-speed="1600" data-delay="900" data-offset="90%" data-easing="ease" href="#">
                            Узнать больше
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--===================================================== section-slade_product  -->
    <section class="section-slade_product" id="slade_product">
        <div class="container">
            <div class="row">
                <div class="col-1-3 col-1-xs">
                    <div class="block_product_basic first_block cre-animate" data-animation="scale-up" data-speed="1600" data-delay="300" data-offset="90%" data-easing="easeInCirc">
                        <div class="block_product">
                            <!--                        картинка -->
                            <img src="images/pool.jpg" alt=" "/>
                        </div>
                        <h6>
                            Надувная мебель
                        </h6>
                    </div>
                </div>
                <div class="col-1-3 col-1-xs">
                    <div class="block_product_basic cre-animate" data-animation="scale-up" data-speed="1600" data-delay="500" data-offset="90%" data-easing="easeInCirc">
                        <div class="block_product">
                            <!--                        картинка -->
                            <img src="images/kettle.jpg" alt=" "/>
                        </div>
                        <h6>
                            Товары для отдыха
                            на природе
                        </h6>
                    </div>
                </div>
                <div class="col-1-3 col-1-xs">
                    <div class="block_product_basic cre-animate" data-animation="scale-up" data-speed="1600" data-delay="500" data-offset="90%" data-easing="easeInCirc">
                        <div class="block_product">
                            <!--                        картинка -->
                            <img src="images/bag.jpg" alt=" "/>
                        </div>
                        <h6>
                            Рыбалка
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--===================================================== section-slade_novelties  -->
    <section class="section-slade_novelties" id="slade_novelties">
        <div class="container">
            <p class="title_slade">
                <span class="orange_text">Новинки.</span>  Обзоры новинок сезона
            </p>
            <div class="row">
                <div class="col-1-3 col-1-xs">
                    <div class="novelties_block column_picture_one cre-animate" data-animation="scale-up" data-speed="1300" data-delay="500" data-offset="90%" data-easing="easeInOutBack">
                        <div class="red_circle">
                            new
                        </div>
                        <div class="big_picture-text">
                            <h3>
                                Весенняя уборка
                            </h3>
                            <div class="line-orange"></div>
                            <p class="sub-h3">
                                Обзор новинок среди эффективных средств для мойки окон.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-1-3 col-1-xs">
                    <div class="novelties_block column_picture_two cre-animate" data-animation="scale-up" data-speed="1500" data-delay="300" data-offset="90%" data-easing="easeInOutBack">
                        <div class="red_circle">
                            new
                        </div>
                        <div class="big_picture-text">
                            <h3>
                                Первые саженцы
                            </h3>
                            <div class="line-orange"></div>
                            <p class="sub-h3">
                                Уникальные семена из Германии.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-1-3 col-1-xs">
                    <div class="novelties_block column_picture_three cre-animate" data-animation="scale-up" data-speed="1300" data-delay="700" data-offset="90%" data-easing="easeInOutBack">
                        <div class="red_circle">
                            new
                        </div>
                        <div class="big_picture-text">
                            <h3>
                                Средства от насекомых
                            </h3>
                            <div class="line-orange"></div>
                            <p class="sub-h3">
                                Обзор новых товаров от насекомых и грызунов.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1-1 col-1-xs">
                    <div class="novelties_block_row">
                        <div class="novelties_block_big column_picture_four cre-animate" data-animation="scale-up" data-speed="1300" data-delay="700" data-offset="90%" data-easing="easeInOutBack">
                            <div class="red_circle">
                                new
                            </div>
                            <div class="big_picture-text">
                                <h3>
                                    Чем занять малышей весной?
                                </h3>
                                <div class="line-orange"></div>
                                <p class="sub-h3">
                                    Новинки товаров для активного отдыха
                                    и развития в вессенний период.
                                </p>
                            </div>
                        </div>
                        <div class="novelties_block_small column_picture_five cre-animate" data-animation="scale-up" data-speed="1300" data-delay="400" data-offset="90%" data-easing="easeInOutBack">
                            <div class="red_circle">
                                new
                            </div>
                            <div class="big_picture-text">
                                <h3>
                                    Время ремонта
                                </h3>
                                <div class="line-orange"></div>
                                <p class="sub-h3">
                                    Обзор новинок строительной химии из Беларуссии.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1-1 col-1-xs">
                    <div class="novelties_block_row">
                        <div class="novelties_block_small column_picture_six cre-animate" data-animation="scale-up" data-speed="1300" data-delay="800" data-offset="90%" data-easing="easeInOutBack">
                            <div class="red_circle">
                                new
                            </div>
                            <div class="big_picture-text">
                                <h3>
                                    Домашние животные
                                </h3>
                                <div class="line-orange"></div>
                                <p class="sub-h3">
                                    Игрушки для животных
                                    из категории Зоотоваров.
                                </p>
                            </div>
                        </div>
                        <div class="novelties_block_big column_picture_seven cre-animate" data-animation="scale-up" data-speed="1300" data-delay="200" data-offset="90%" data-easing="easeInOutBack">
                            <div class="red_circle">
                                new
                            </div>
                            <div class="big_picture-text">
                                <h3>
                                    Готовим блины
                                    к масленице
                                </h3>
                                <div class="line-orange"></div>
                                <p class="sub-h3">
                                    Важный кухонный «инвентарь»
                                    в приготовлении классических блинов.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--===================================================== section-slade_woman_fon  -->
    <section class="section-slade_woman_fon entry-main-image parallax-block" data-parallax="scroll" data-image-src="images/fon-woman_second.jpg" id="slade_woman_fon">
        <div class="container">
            <div class="row">
                <div class="col-1-1">
                    <div class="slade_one_text cre-animate" data-animation="scale-up" data-speed="1300" data-delay="800" data-offset="90%" data-easing="easeInSine">
                        <h1>
                            Подарок к 8 Марта для неё
                        </h1>
                        <p class="sub-h1 cre-animate" data-animation="scale-up" data-speed="1300" data-delay="200" data-offset="90%" data-easing="easeInSine">
                            Не хотите быть банальным? Удивляйт любимых и близких
                            с эксклюзивными и качественными товарами зарубежных производителей.
                        </p>
                        <a class="button orange_button cre-animate" data-animation="scale-up" data-speed="1300" data-delay="600" data-offset="90%" data-easing="easeInSine" href="#">
                            Узнать больше
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--===================================================== section-slade_product  -->
    <section class="section-slade_product padding_under" id="slade_product">
        <div class="container">
            <div class="row">
                <div class="col-1-3 col-1-xs">
                    <div class="block_product_basic margin_under cre-animate" data-animation="scale-up" data-speed="1600" data-delay="600" data-offset="90%" data-easing="easeInOutQuint">
                        <div class="block_product">
                            <!--                        картинка -->
                            <img src="images/accessories.jpg" alt=" "/>
                        </div>
                        <h6>
                            Аксессуары
                        </h6>
                        <div class="text_h6">
                            Ремешки, браслеты, солнцезащитные очки зададут весенний тон Вашему образу
                        </div>
                    </div>
                </div>
                <div class="col-1-3 col-1-xs">
                    <div class="block_product_basic margin_under cre-animate" data-animation="scale-up" data-speed="1600" data-delay="300" data-offset="90%" data-easing="easeInOutQuint">
                        <div class="block_product">
                            <!--                        картинка -->
                            <img src="images/cosmetics.jpg" alt=" "/>
                        </div>
                        <h6>
                            Косметика
                        </h6>
                        <div class="text_h6">
                            Правильный уход за кожей с натуральной косметикой из Швейцарии.
                        </div>
                    </div>
                </div>
                <div class="col-1-3 col-1-xs">
                    <div class="block_product_basic margin_under cre-animate" data-animation="scale-up" data-speed="1600" data-delay="500" data-offset="90%" data-easing="easeInOutQuint">
                        <div class="block_product">
                            <!--                        картинка -->
                            <img src="images/hair.jpg" alt=" "/>
                        </div>
                        <h6>
                            Уход за волосами
                        </h6>
                        <div class="text_h6 padding_under_mini">
                            Популярные средства по уходу
                            за секущимися волосами.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--===================================================== section-slade_man_fon  -->
    <section class="section-slade_man_fon entry-main-image parallax-block" data-parallax="scroll" data-image-src="images/fon-man.jpg" id="slade_man_fon">
        <div class="container">
            <div class="row">
                <div class="col-1-1">
                    <div class="slade_one_text cre-animate" data-animation="scale-up" data-speed="1600" data-delay="800" data-offset="90%" data-easing="easeInOutQuint">
                        <h1>
                            Подарок ко Дню <Br>
                            защитника Отечества
                            для него
                        </h1>
                        <p class="sub-h1 cre-animate" data-animation="scale-up" data-speed="1600" data-delay="200" data-offset="90%" data-easing="easeInOutQuint">
                            Гель для душа, средство для бритья уже не в моде.
                            Выбирайте лучшее для Вашего защитника.
                        </p>
                        <a class="button orange_button cre-animate" data-animation="scale-up" data-speed="1600" data-delay="500" data-offset="90%" data-easing="easeInOutQuint" href="#">
                            Узнать больше
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--===================================================== section-slade_product  -->
    <section class="section-slade_product padding_under" id="slade_product">
        <div class="container">
            <div class="row">
                <div class="col-1-3 col-1-xs">
                    <div class="block_product_basic margin_under cre-animate" data-animation="scale-up" data-speed="1600" data-delay="900" data-offset="90%" data-easing="easeInOutQuint">
                        <div class="block_product">
                            <!--                        картинка -->
                            <img src="images/nivea.jpg" alt=" "/>
                        </div>
                        <h6>
                            Косметика
                        </h6>
                        <div class="text_h6">
                            Быть ухоженным - значит пользоваться проверенной линейкой по уходу за кожей.
                        </div>
                    </div>
                </div>
                <div class="col-1-3 col-1-xs">
                    <div class="block_product_basic margin_under cre-animate" data-animation="scale-up" data-speed="1600" data-delay="500" data-offset="90%" data-easing="easeInOutQuint">
                        <div class="block_product">
                            <!--                        картинка -->
                            <img src="images/wallet.jpg" alt=" "/>
                        </div>
                        <h6>
                            Бумажники
                        </h6>
                        <div class="text_h6">
                            Обзор бумажников настоящего мужчины - кожаные, разных параметров и цветов.
                        </div>
                    </div>
                </div>
                <div class="col-1-3 col-1-xs">
                    <div class="block_product_basic margin_under cre-animate" data-animation="scale-up" data-speed="1600" data-delay="200" data-offset="90%" data-easing="easeInOutQuint">
                        <div class="block_product">
                            <!--                        картинка -->
                            <img src="images/drill.jpg" alt=" "/>
                        </div>
                        <h6>
                            Электроинструменты
                        </h6>
                        <div class="text_h6 padding_under_mini">
                            Обзор популярных электроинструментов, которые выбирают наши покупатели.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--===================================================== section-slade_reviews  -->
    <section class="section-slade_reviews" id="slade_reviews">
        <div class="container">
            <p class="title_slade">
                <span class="orange_text">Отзывы</span>  о нас на Яндекс. Маркет
            </p>
            <div class="row">
                <div class="col-1-1">
                    <div class="block-slider-holder">
                        <div class="block-slider swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="block_reviews">
                                        <div class="icon-block">
                                            <img src="images/avatar.jpg" alt=" "/>
                                        </div>
                                        <p class="name"><span>M</span>artemyanowa Olya</p>
                                        <div class="stars_block">
                                            <img src="images/stars.jpg" alt=" "/>
                                            <p class="assessment">отличный магазин</p><p class="assessment">Способ покупки: доставка</p>
                                        </div>
                                        <p class="reviews_text">
                                            <span>Достоинства:</span> приветливые сотрудники, служба доставки четко работает.
                                        </p>
                                        <p class="reviews_text">
                                            <span>Недостатки:</span> не увидела
                                        </p>
                                        <p class="reviews_text">
                                            <span>Комментарий:</span> заказывала парфюмерную воду бренда NG Perfumes, аромат Boom. Взяла сразу два флакончика: себе, и подруге в                                                подарок. Заказ доставили в обещанный срок – через 2 дня, меня это вполне устроило. За доставку не пришлось платить, курьер приехал                                                  точно по адресу и в оговоренный промежуток времени.
                                        </p>
                                        <p class="date_text">
                                            24 февраля, Москва
                                        </p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="block_reviews">
                                        <div class="icon-block">
                                            <img src="images/avatar.jpg" alt=" "/>
                                        </div>
                                        <p class="name"><span>M</span>artemyanowa Olya</p>
                                        <div class="stars_block">
                                            <img src="images/stars.jpg" alt=" "/>
                                            <p class="assessment">отличный магазин</p><p class="assessment">Способ покупки: доставка</p>
                                        </div>
                                        <p class="reviews_text">
                                            <span>Достоинства:</span> приветливые сотрудники, служба доставки четко работает.
                                        </p>
                                        <p class="reviews_text">
                                            <span>Недостатки:</span> не увидела
                                        </p>
                                        <p class="reviews_text">
                                            <span>Комментарий:</span> заказывала парфюмерную воду бренда NG Perfumes, аромат Boom. Взяла сразу два флакончика: себе, и подруге в                                                подарок. Заказ доставили в обещанный срок – через 2 дня, меня это вполне устроило. За доставку не пришлось платить, курьер приехал                                                  точно по адресу и в оговоренный промежуток времени.
                                        </p>
                                        <p class="date_text">
                                            24 февраля, Москва
                                        </p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="block_reviews">
                                        <div class="icon-block">
                                            <img src="images/avatar.jpg" alt=" "/>
                                        </div>
                                        <p class="name"><span>M</span>artemyanowa Olya</p>
                                        <div class="stars_block">
                                            <img src="images/stars.jpg" alt=" "/>
                                            <p class="assessment">отличный магазин</p><p class="assessment">Способ покупки: доставка</p>
                                        </div>
                                        <p class="reviews_text">
                                            <span>Достоинства:</span> приветливые сотрудники, служба доставки четко работает.
                                        </p>
                                        <p class="reviews_text">
                                            <span>Недостатки:</span> не увидела
                                        </p>
                                        <p class="reviews_text">
                                            <span>Комментарий:</span> заказывала парфюмерную воду бренда NG Perfumes, аромат Boom. Взяла сразу два флакончика: себе, и подруге в                                                подарок. Заказ доставили в обещанный срок – через 2 дня, меня это вполне устроило. За доставку не пришлось платить, курьер приехал                                                  точно по адресу и в оговоренный промежуток времени.
                                        </p>
                                        <p class="date_text">
                                            24 февраля, Москва
                                        </p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="block_reviews">
                                         <div class="icon-block">
                                            <img src="images/avatar.jpg" alt=" "/>
                                        </div>
                                        <p class="name"><span>M</span>artemyanowa Olya</p>
                                        <div class="stars_block">
                                            <img src="images/stars.jpg" alt=" "/>
                                            <p class="assessment">отличный магазин</p><p class="assessment">Способ покупки: доставка</p>
                                        </div>
                                        <p class="reviews_text">
                                            <span>Достоинства:</span> приветливые сотрудники, служба доставки четко работает.
                                        </p>
                                        <p class="reviews_text">
                                            <span>Недостатки:</span> не увидела
                                        </p>
                                        <p class="reviews_text">
                                            <span>Комментарий:</span> заказывала парфюмерную воду бренда NG Perfumes, аромат Boom. Взяла сразу два флакончика: себе, и подруге в                                                подарок. Заказ доставили в обещанный срок – через 2 дня, меня это вполне устроило. За доставку не пришлось платить, курьер приехал                                                  точно по адресу и в оговоренный промежуток времени.
                                        </p>
                                        <p class="date_text">
                                            24 февраля, Москва
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="block-pagination swiper-pagination"></div>
                        <div class="block-next swiper-button-next">
<!--                            <img src="images/next.jpg" alt="next"/>-->
                        </div>
                        <div class="block-prev swiper-button-prev">
<!--                            <img src="images/prev.jpg" alt="prev"/>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--===================================================== section-slade_sub_footer  -->
    <section class="section-slade_sub_footer" id="slade_sub_footer">
        <div class="container">
            <h3 class="orange_h3">
                с нами удобно
            </h3>
            <div class="row">
                <div class="col-1-4 col-1-xs">
                    <div class="number_block cre-animate" data-animation="scale-up" data-speed="1000" data-delay="200" data-offset="90%" data-easing="easeInOutQuint">
                        <div class="icon-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                                <path id="_1" data-name="1" class="cls-1" d="M546.338,6963.79a0.945,0.945,0,1,1,0-1.89h2.625a0.945,0.945,0,1,1,0,1.89h-2.625Zm6.236-21.36a0.959,0.959,0,0,1-.275-0.67,0.942,0.942,0,0,1,.275-0.67,0.945,0.945,0,0,1,1.616.67,1,1,0,0,1-.274.67,0.992,0.992,0,0,1-.671.27A0.97,0.97,0,0,1,552.574,6942.43ZM575.75,6973a9.2,9.2,0,0,1-6.436-2.62H537.953a0.942,0.942,0,0,1-.945-0.94v-37.98a0.942,0.942,0,0,1,.945-0.94h6.927a0.888,0.888,0,0,1,.231.04v-2.19a3.386,3.386,0,0,1,6.772,0v2.16c0.017,0,.032-0.01.05-0.01h17.4c0.018,0,.033.01,0.051,0.01v-2.16a3.386,3.386,0,0,1,6.772,0v2.19a0.88,0.88,0,0,1,.23-0.04h6.927a0.942,0.942,0,0,1,.945.94v14.03a0.945,0.945,0,0,1-1.89,0v-2.79H558.256a0.945,0.945,0,1,1,0-1.89h24.112v-8.41h-5.982a0.891,0.891,0,0,1-.23-0.05v2.2a3.386,3.386,0,0,1-6.772,0v-2.16c-0.018,0-.033.01-0.051,0.01h-17.4c-0.018,0-.033-0.01-0.05-0.01v2.16a3.386,3.386,0,0,1-6.772,0v-2.2a0.9,0.9,0,0,1-.231.05H538.9v8.41h9.331a0.945,0.945,0,1,1,0,1.89H538.9v25.8h28.926a9.121,9.121,0,0,1-1.314-4.71H552.837a0.945,0.945,0,1,1,0-1.89h13.87a9.247,9.247,0,0,1,15.661-4.52v-7.46a0.945,0.945,0,0,1,1.89,0v10.28a9.106,9.106,0,0,1,.734,3.59A9.236,9.236,0,0,1,575.75,6973Zm-4.476-38.45a1.5,1.5,0,0,0,2.992,0v-6.18a1.5,1.5,0,0,0-2.992,0v6.18Zm-24.273,0a1.5,1.5,0,0,0,2.992,0v-6.18a1.5,1.5,0,0,0-2.992,0v6.18Zm28.749,21.92a7.32,7.32,0,1,0,7.352,7.32A7.341,7.341,0,0,0,575.75,6956.47Zm-0.6,10.81a0.961,0.961,0,0,1-1.336,0l-3.125-3.11a0.937,0.937,0,0,1,0-1.33,0.953,0.953,0,0,1,1.337-.01l2.457,2.45,5-4.97a0.942,0.942,0,1,1,1.335,1.33Z" transform="translate(-537 -6925)"/>
                            </svg>
                        </div>
                        01
                    </div>
                    <p class="number_block_title cre-animate" data-animation="scale-up" data-speed="1000" data-delay="800" data-offset="90%" data-easing="easeInOutQuint">
                        Работаем<Br>
                        с 2014 года
                    </p>
                </div>
                <div class="col-1-4 col-1-xs">
                    <div class="number_block cre-animate" data-animation="scale-up" data-speed="1000" data-delay="400" data-offset="90%" data-easing="easeInOutQuint">
                        <div class="icon-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="61.625" height="36.82" viewBox="0 0 61.625 36.82">
                                <path id="_2" data-name="2" class="cls-1" d="M872.911,6944.83a0.971,0.971,0,0,1,.746.35l4.86,5.9a0.929,0.929,0,0,1,.124,1,0.966,0.966,0,0,1-.87.54h-9.342a0.952,0.952,0,0,1-.962-0.95v-5.89a0.959,0.959,0,0,1,.962-0.95h4.482Zm-3.519,5.9h6.355l-3.294-4h-3.061v4Zm-11.164-13.92a0.95,0.95,0,1,1,0,1.9h-6.112a0.95,0.95,0,1,1,0-1.9h6.112Zm-10.4,0a0.95,0.95,0,1,1,0,1.9H829.959a0.95,0.95,0,1,1,0-1.9h17.873Zm-23.486,14.96a0.956,0.956,0,0,1,0,1.35,1,1,0,0,1-1.367,0,0.956,0.956,0,0,1,0-1.35A1.021,1.021,0,0,1,824.346,6951.77Zm58.991,11.84h-5.8a5.8,5.8,0,0,1-11.431,0H840.894a5.806,5.806,0,0,1-11.433,0h-5.8a0.952,0.952,0,0,1-.962-0.95v-6.5a0.963,0.963,0,0,1,1.925,0v5.56h4.835a5.806,5.806,0,0,1,11.433,0h25.213a5.8,5.8,0,0,1,11.431,0h4.837v-9.71l-7.147-8.93h-10.7a0.953,0.953,0,0,1-.963-0.95v-8.63H824.626v15.23a0.963,0.963,0,0,1-1.925,0v-16.18a0.952,0.952,0,0,1,.962-0.95h40.861a0.952,0.952,0,0,1,.962.95v8.63h10.208a0.964,0.964,0,0,1,.756.36l7.643,9.55a0.911,0.911,0,0,1,.207.58v10.99A0.953,0.953,0,0,1,883.337,6963.61Zm-48.159-4.78a3.835,3.835,0,1,0,3.888,3.83A3.866,3.866,0,0,0,835.178,6958.83Zm36.644,0a3.835,3.835,0,1,0,3.889,3.83A3.864,3.864,0,0,0,871.822,6958.83Z" transform="translate(-822.688 -6931.59)"/>
                            </svg>
                        </div>
                        02
                    </div>
                    <p class="number_block_title_desktop cre-animate" data-animation="scale-up" data-speed="1000" data-delay="600" data-offset="90%" data-easing="easeInOutQuint">
                        Бесплатная доставка
                        в Москву от 2 000 руб.
                    </p>
                    <p class="number_block_title_mobile">
                        Бесплатная доставка
                    </p>
                </div>
                <div class="col-1-4 col-1-xs">
                    <div class="number_block cre-animate" data-animation="scale-up" data-speed="1000" data-delay="600" data-offset="90%" data-easing="easeInOutQuint">
                        <div class="icon-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="47" height="47" viewBox="0 0 47 47">
                                <path id="_3" data-name="3" class="cls-1" d="M1146.5,6973a23.5,23.5,0,1,1,16.41-40.32,0.9,0.9,0,0,1-1.26,1.29,21.448,21.448,0,0,0-9.52-5.38c3.8,3.73,6.38,11.17,6.55,20.01h9.47a21.44,21.44,0,0,0-1.56-7.3,0.9,0.9,0,1,1,1.67-.69A23.513,23.513,0,0,1,1146.5,6973Zm-10.37-24.4h9.47v-20.69C1140.51,6928.87,1136.35,6937.87,1136.13,6948.6Zm9.47,22.49V6950.4h-9.47C1136.35,6961.13,1140.51,6970.13,1145.6,6971.09Zm1.8,0c5.09-.96,9.25-9.96,9.47-20.69h-9.47v20.69Zm-6.55-.69c-3.79-3.74-6.36-11.17-6.53-20h-9.47A21.7,21.7,0,0,0,1140.85,6970.4Zm-16-21.8h9.47c0.17-8.83,2.74-16.26,6.53-20A21.7,21.7,0,0,0,1124.85,6948.6Zm22.55-20.69v20.69h9.47C1156.65,6937.87,1152.49,6928.87,1147.4,6927.91Zm11.28,22.49c-0.17,8.83-2.74,16.26-6.53,20a21.7,21.7,0,0,0,16-20h-9.47Zm6.57-12.77a0.927,0.927,0,0,1-.64-0.27,0.905,0.905,0,1,1,1.28-1.28A0.91,0.91,0,0,1,1165.25,6937.63Z" transform="translate(-1123 -6926)"/>
                            </svg>
                        </div>
                        03
                    </div>
                    <p class="number_block_title cre-animate" data-animation="scale-up" data-speed="1000" data-delay="400" data-offset="90%" data-easing="easeInOutQuint">
                        Доставка<Br>
                        в регионы
                    </p>
                </div>
                <div class="col-1-4 col-1-xs">
                    <div class="number_block cre-animate" data-animation="scale-up" data-speed="1000" data-delay="800" data-offset="90%" data-easing="easeInOutQuint">
                        <div class="icon-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="47" viewBox="0 0 50 47">
                                <path id="_4" data-name="4" class="cls-1" d="M1464.1,6967.57h-2.31v2.29a0.905,0.905,0,0,1-1.81,0v-2.29h-2.3a0.9,0.9,0,1,1,0-1.8h2.3v-2.3a0.905,0.905,0,0,1,1.81,0v2.3h2.31A0.9,0.9,0,1,1,1464.1,6967.57Zm-2.46-10.54a0.769,0.769,0,0,1,.29.19,0.853,0.853,0,0,1,.19.3,0.842,0.842,0,0,1,.07.35,0.927,0.927,0,0,1-.26.62,0.942,0.942,0,0,1-.29.2,1.03,1.03,0,0,1-.35.06,0.9,0.9,0,0,1-.64-0.26,0.972,0.972,0,0,1-.19-0.29,0.817,0.817,0,0,1-.07-0.33A0.894,0.894,0,0,1,1461.64,6957.03Zm2.96-10.95c-0.01.01-.01,0.03-0.02,0.04a0.654,0.654,0,0,1-.17.26l-23.92,25.34a0.133,0.133,0,0,0-.05.03,1.429,1.429,0,0,1-.2.14c-0.03.01-.05,0.03-0.08,0.04a0.824,0.824,0,0,1-.31.07h-0.02a0.928,0.928,0,0,1-.33-0.07c-0.03-.01-0.05-0.03-0.08-0.04a0.9,0.9,0,0,1-.2-0.14c-0.01-.01-0.04-0.02-0.05-0.03l-23.93-25.34a0.782,0.782,0,0,1-.17-0.26,0.06,0.06,0,0,0-.01-0.04,0.918,0.918,0,0,1-.05-0.28c0-.01-0.01-0.02-0.01-0.03,0-.03.01-0.05,0.01-0.08a0.8,0.8,0,0,1,.05-0.21,0.5,0.5,0,0,1,.05-0.13c0.02-.02.02-0.06,0.04-0.08l7.09-10.52a0.374,0.374,0,0,0,.07-0.06,0.658,0.658,0,0,1,.14-0.15,0.251,0.251,0,0,1,.07-0.04,0.754,0.754,0,0,1,.13-0.06,0.839,0.839,0,0,1,.26-0.07c0.03,0,.06-0.02.08-0.02h33.67c0.03,0,.06.02,0.09,0.02a0.828,0.828,0,0,1,.27.07c0.05,0.02.09,0.05,0.13,0.07a1.054,1.054,0,0,1,.11.07,0.481,0.481,0,0,1,.09.11c0.02,0.03.05,0.04,0.06,0.06l7.09,10.52a0.3,0.3,0,0,1,.04.08,0.672,0.672,0,0,1,.06.12,0.933,0.933,0,0,1,.04.22,0.235,0.235,0,0,1,.02.08c0,0.01-.01.02-0.01,0.03A0.918,0.918,0,0,1,1464.6,6946.08Zm-2.94.59h-13.57l-6.31,21.05Zm-21.9,21.5,6.44-21.5h-13.94Zm-2.17-.76-7.24-20.74h-12.36Zm-19.99-22.54h11.57l-6.13-8.07Zm7.21-8.72,6.19,8.14,6.36-8.14h-12.55Zm8.03,8.72h12.73l-6.37-8.15Zm8.21-8.72,6.41,8.21,7.21-8.21h-13.62Zm15.52,0.58-7.16,8.14h12.65Zm-26.45-7.57a0.926,0.926,0,0,1-.3.2,0.885,0.885,0,0,1-.69,0,0.926,0.926,0,0,1-.3-0.2,1.065,1.065,0,0,1-.19-0.28,0.834,0.834,0,0,1-.06-0.35,0.862,0.862,0,0,1,.06-0.35,1.452,1.452,0,0,1,.19-0.29,1.023,1.023,0,0,1,.3-0.19,0.929,0.929,0,0,1,.99.19,1.118,1.118,0,0,1,.19.29,0.875,0.875,0,0,1,.07.35,0.842,0.842,0,0,1-.07.35A1.065,1.065,0,0,1,1430.12,6929.16Zm-7.8.83h-2.31v2.3a0.9,0.9,0,1,1-1.8,0v-2.3h-2.31a0.9,0.9,0,0,1,0-1.8h2.31v-2.29a0.9,0.9,0,0,1,1.8,0v2.29h2.31A0.9,0.9,0,0,1,1422.32,6929.99Zm28.74,39.59a0.915,0.915,0,0,1,.69,0,0.877,0.877,0,0,1,.3.2,1.065,1.065,0,0,1,.19.28,0.875,0.875,0,0,1,.07.35,0.9,0.9,0,0,1-.26.64,1.426,1.426,0,0,1-.3.2,0.974,0.974,0,0,1-.34.06,1.03,1.03,0,0,1-.35-0.06,1,1,0,0,1-.29-0.2,0.769,0.769,0,0,1-.19-0.29,0.842,0.842,0,0,1-.07-0.35,0.86,0.86,0,0,1,.26-0.63A0.837,0.837,0,0,1,1451.06,6969.58Z" transform="translate(-1415 -6925)"/>
                            </svg>
                        </div>
                        04
                    </div>
                    <p class="number_block_title cre-animate" data-animation="scale-up" data-speed="1000" data-delay="200" data-offset="90%" data-easing="easeInOutQuint">
                        15 эксклюзивных
                        товаров в день
                    </p>
                </div>
            </div>
            <div class="block_product_text">
                МОСХОЗТОРГ - единственный поставщик эксклюзивных товаров, который удовлетворяет потребности всех покупателей. Если в нашем каталоге Вы нашли товар, который Вам нужен, мы доставим его в любую точку России, где бы Вы не находились. А главное, сделаем это быстро, качественно и удобно для Вас.
            </div>
        </div>
    </section>


    <!--===================================================== section form-x -->
<!--    <section class="section-form form-x" id="form-x">-->
<!--        <div class="container align-center">-->
<!---->
<!--            <h2>-->
<!---->
<!--            </h2>-->
<!---->
<!--            <p>-->
<!---->
<!--            </p>-->
<!---->
<!--            <form method="post" class="send-form" autocomplete="off">-->
<!--                <div class="row">-->
<!--                    <div class="col-1-3">-->
<!--                        <input type="text" name="client_name" class="client-name" placeholder="Ваше имя">-->
<!--                    </div>-->
<!---->
<!--                    <div class="col-1-3">-->
<!--                        <input type="tel" name="client_phone" class="client-phone" placeholder="Ваш телефон">-->
<!--                    </div>-->
<!---->
<!--                    <div class="col-1-3">-->
<!--                        <input type="email" name="client_mail" class="client-mail" placeholder="Ваш e-mail">-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <input type="hidden" name="send_type" class="send-type" value="2">-->
<!--                <input type="hidden" name="send_extra" class="send-extra" value="1">-->
<!--				<input type="hidden" name="key" value="--><?php //echo $_SESSION['sf_key'] ?><!--">-->
<!--				--><?php ////Поле выше для защиты формы от спам-ботов ?>
<!---->
<!--                <div class="btn-holder">-->
<!--                    <button type="submit" class="btn">Позвоните мне</button>-->
<!--                    <!--<div class="g-recaptcha" id="g-recaptcha"></div>-->
<!--                </div>-->
<!---->
<!--                <!-- Agreement -->
<!--                <div class="form-agree align-left">-->
<!--                    <label class="checkbox-label form-agree-check checked">-->
<!--                        <input type="checkbox" checked>-->
<!--                        Нажимая кнопку "ПОЗВОНИТЕ МНЕ", я&nbsp;даю своё согласие на&nbsp;обработку-->
<!--                        моих персональных данных в&nbsp;соответствии с&nbsp;Федеральным законом-->
<!--                        от&nbsp;27.07.2006&nbsp;года №152&#8209;ФЗ "О&nbsp;персональных данных",-->
<!--                        на&nbsp;условиях и&nbsp;для&nbsp;целей, определённых-->
<!--                        в&nbsp;Согласии на&nbsp;обработку персональных данных.-->
<!--                    </label>-->
<!--                </div>-->
<!--            </form>-->
<!---->
<!--        </div>-->
<!--    </section>-->

    <!--===================================================== section map -->
<!--    <div class="section-map">-->
<!--        <div class="map-holder" id="map"></div>-->
<!--    </div>-->


    <!--===================================================== Footer -->
    <footer class="layout-footer">
        <div class="container">
            <div class="row">
                <div class="col-1-4 col-1-xs">
                    <div class="logo-white"></div>
                    <div class="mxt"></div>
                    <div class="logo_block_mobile">
                        <div class="logo-white-big"></div>
                        <div class="mxt-big"></div>
                    </div>
                    <p class="orange-text">
                        Время обработки заказов в будни
                        с 9 до 21
                    </p>
                    <p class="white-text">
                        Суббота с 10 до 20, воскресенье с 11 до 20
                    </p>
                </div>
                <div class="col-2-4 col-1-xs">
                    <div class="column_footer_block">
                        <div class="column_footer">
                            <p class="footer_title">
                                О компании
                            </p>
                            <ul>
                                <li>Новости</li>
                                <li>Акции и скидки</li>
                                <li>Вакансии</li>
                                <li>Реквизиты</li>
                                <li>Магазины</li>
                                <li>Пожаловаться</li>
                            </ul>
                        </div>
                        <div class="column_footer second_column_footer">
                            <p class="footer_title">
                                Сервисы
                            </p>
                            <ul>
                                <li>Доставка и оплата</li>
                                <li>Дисконтные карты</li>
                                <li>Социальная карта</li>
                                <li>Аэрофлот бонус</li>
                                <li>Подарочный сертификат</li>
                                <li>Обмен и возврат</li>
                            </ul>
                        </div>
                        <div class="column_footer last_column_footer">
                            <p class="footer_title">
                                Информация
                            </p>
                            <ul>
                                <li>Гарантии</li>
                                <li>Реклама на сайте</li>
                                <li>Статьи</li>
                                <li>Полезные видео</li>
                                <li>Поставщикам</li>
                                <li>Вопросы и ответы</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-1-4 col-1-xs">

                    <a href="tel:+78005504747" class="phone-link white align-right">
                        <div class="icon-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                <path id="Phone_icon" class="cls-1" d="M1402.08,28.92c-1.19-1.187-2.32-2.563-1.78-3.107,0.78-.778,1.46-1.258.08-2.973s-2.3-.4-3.06.356c-0.87.87-.04,4.113,3.16,7.319s6.45,4.03,7.32,3.159c0.76-.754,2.07-1.673.36-3.052s-2.2-.7-2.98.077C1404.64,31.242,1403.27,30.108,1402.08,28.92Z" transform="translate(-1397 -22)"/>
                            </svg>
                        </div>
                        <div class="phone_icon_big">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29"><defs><path id="wf8va" d="M159.73 14141.26c-2.27-2.27-4.45-4.9-3.4-5.95 1.49-1.5 2.78-2.41.14-5.7-2.64-3.29-4.4-.76-5.85.68-1.67 1.67-.09 7.88 6.06 14.03 6.14 6.14 12.36 7.72 14.02 6.05 1.45-1.44 3.97-3.2.69-5.84-3.3-2.65-4.21-1.35-5.7.14-1.04 1.04-3.68-1.13-5.96-3.4z"/></defs><g><g transform="translate(-147 -14125)"><use fill="#f95319" xlink:href="#wf8va"/></g></g></svg>
                        </div>
                        <span>8 800</span> 550-47-47</a>
                    <a href="#" class="button orange_button open-phone-modal">Заказать консультацию</a>
                    <div class="si-overlay"></div>
                    <div class="si-modals-wrapper">
                        <div class="si-success-modal si-success-modal-1">
                            <a href="#" class="si-close">
                                <svg class="svg-icon close" xmlns="http://www.w3.org/2000/svg" width="16.9" height="16.9" viewBox="0 0 16.9 16.9">
                                    <polygon points="16.9,2.3 14.6,0 8.4,6.2 2.3,0 0,2.3 6.2,8.4 0,14.6 2.3,16.9 8.4,10.7 8.4,10.7 8.5,10.7 14.6,16.9 16.9,14.6
	10.7,8.4 "/>
                                </svg>
                            </a>

                            <div class="modal-container align-center">

                                <div class="si-success-modal-title">
                                    <div class="title">
                                        Спасибо!
                                    </div>
                                </div>

                                <div class="modal_sub_title">
                                    Наш менеджер свяжется
                                    с Вами в течение 15 мин
                                </div>
                                <div class="title-2">
                                    Время работы отдела продаж:
                                </div>
                                <div class="sub_title-2">
                                    пн-пт с 10.00 до 20.00 (по Москве)
                                </div>
                            </div>
                            <div class="modal_social">
                                <div class="social-title">
                                    Подпишитесь на наши новости:
                                </div>
                                <div class="modal_social_icon">
                                    <div class="icon-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28.82" height="28.82" viewBox="0 0 28.82 28.82">
                                            <path id="face" class="cls-1 face_black" d="M1385,7509.4a14.4,14.4,0,1,1,14.4-14.4A14.365,14.365,0,0,1,1385,7509.4Zm0-25.8a11.4,11.4,0,1,0,11.4,11.4A11.395,11.395,0,0,0,1385,7483.6Zm4.2,9-0.6,3h-2.4v8.4h-3.6v-8.4h-3v-3h3v-2.4a3.877,3.877,0,0,1,4.2-4.2h2.4v3H1388c-1.32,0-1.8.3-1.8,1.2v2.4h3Z" transform="translate(-1370.59 -7480.59)"/>
                                        </svg>
                                    </div>
                                    <div class="icon-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28.82" height="28.82" viewBox="0 0 28.82 28.82">
                                            <path id="ok" class="cls-1 ok_black" d="M1423,7509.4a14.4,14.4,0,1,1,14.4-14.4A14.365,14.365,0,0,1,1423,7509.4Zm0-25.8a11.4,11.4,0,1,0,11.4,11.4A11.395,11.395,0,0,0,1423,7483.6Zm4.8,13.62c-0.72.42-3,1.38-3,1.38l2.52,3.24a2.3,2.3,0,0,1,.48.96,1.2,1.2,0,0,1-1.2,1.2,1.143,1.143,0,0,1-.9-0.42l-2.7-3.18-2.76,3.18a1.143,1.143,0,0,1-.9.42,1.2,1.2,0,0,1-1.2-1.2,1.944,1.944,0,0,1,.48-0.96l2.58-3.24s-2.28-.96-3-1.38a1.091,1.091,0,0,1-.6-1.02,1.2,1.2,0,0,1,1.2-1.2c0.6,0,1.8,1.2,4.2,1.2s3.6-1.2,4.2-1.2a1.2,1.2,0,0,1,1.2,1.2A1.168,1.168,0,0,1,1427.8,7497.22Zm-4.8-2.82a4.2,4.2,0,1,1,4.2-4.2A4.174,4.174,0,0,1,1423,7494.4Zm0-6.3a2.1,2.1,0,1,0,2.1,2.1A2.126,2.126,0,0,0,1423,7488.1Z" transform="translate(-1408.59 -7480.59)"/>
                                        </svg>
                                    </div>
                                    <div class="icon-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28.82" height="28.82" viewBox="0 0 28.82 28.82">
                                            <path id="insta" class="cls-1 insta_black" d="M1461,7509.4a14.4,14.4,0,1,1,14.4-14.4A14.365,14.365,0,0,1,1461,7509.4Zm0-25.8a11.4,11.4,0,1,0,11.4,11.4A11.395,11.395,0,0,0,1461,7483.6Zm5.7,18.84h-11.4a1.741,1.741,0,0,1-1.74-1.74v-11.4a1.741,1.741,0,0,1,1.74-1.74h11.16a2.175,2.175,0,0,1,1.98,1.74v11.4A1.824,1.824,0,0,1,1466.7,7502.44Zm-5.7-10.14a2.7,2.7,0,1,0,2.7,2.7A2.689,2.689,0,0,0,1461,7492.3Zm5.46-2.22a0.44,0.44,0,0,0-.48-0.48h-1.5a0.473,0.473,0,0,0-.48.48v1.5a0.516,0.516,0,0,0,.48.48h1.5a0.516,0.516,0,0,0,.48-0.48v-1.5Zm-0.06,9.36v-5.7h-1.14a4.568,4.568,0,0,1,.18,1.26,4.44,4.44,0,0,1-8.88,0,4.264,4.264,0,0,1,.18-1.26h-1.14v5.7a0.948,0.948,0,0,0,.96.96h8.94a0.948,0.948,0,0,0,.96-0.96h-0.06Z" transform="translate(-1446.59 -7480.59)"/>
                                        </svg>
                                    </div>
                                    <div class="icon-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28.82" height="28.82" viewBox="0 0 28.82 28.82">
                                            <path id="vk" class="cls-1 vk_black" d="M1499,7509.4a14.4,14.4,0,1,1,14.4-14.4A14.365,14.365,0,0,1,1499,7509.4Zm0-25.8a11.4,11.4,0,1,0,11.4,11.4A11.395,11.395,0,0,0,1499,7483.6Zm7.2,10.2c-1.8,2.4-1.2,1.8,0,3,1.38,1.38,1.8,2.04,1.8,2.4a1.229,1.229,0,0,1-1.2,1.2H1505a1.2,1.2,0,0,1-1.2-.6c-0.78-.78-1.8-1.8-2.4-1.8a1.29,1.29,0,0,0-1.2,1.2c0,0.36,0,1.2-.6,1.2H1499c-1.2-.06-2.58-0.18-4.68-2.34a19.5,19.5,0,0,1-4.32-7.26c-0.06-.24,0-0.6.6-0.6h1.8a0.982,0.982,0,0,1,1.2.6c1.2,1.8,2.4,4.2,3,4.2s0.6-2.4.6-2.4v-1.2c0-.84-1.02-0.6-1.2-0.6a2.829,2.829,0,0,1,.6-0.6,3.514,3.514,0,0,1,1.8-.6h1.8c0.9,0.24.6,1.62,0.6,3.6,0,0.66.06,1.8,0.6,1.8s0.6-.6,1.2-1.8a19.274,19.274,0,0,1,1.8-3c0.42-.54,3.48.06,3.6,0.42S1507.28,7492.3,1506.2,7493.8Z" transform="translate(-1484.59 -7480.59)"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="si-modal phone-modal">
                            <a href="#" class="si-close">
                                <svg class="svg-icon close" xmlns="http://www.w3.org/2000/svg" width="16.9" height="16.9" viewBox="0 0 16.9 16.9">
                                    <polygon points="16.9,2.3 14.6,0 8.4,6.2 2.3,0 0,2.3 6.2,8.4 0,14.6 2.3,16.9 8.4,10.7 8.4,10.7 8.5,10.7 14.6,16.9 16.9,14.6
	10.7,8.4 "/>
                                </svg>
                            </a>

                            <div class="modal-container align-center">

                                <div class="modal-form-title">
                                    <div class="title">
                                        Закажите консультацию
                                    </div>
                                    <div class="modal_sub_title">
                                        Ответ в течение 15 мин
                                    </div>
                                </div>

                                <form method="post" class="send-form" autocomplete="on">
                                    <input type="text" name="client_name" class="client-name" placeholder="Ваше имя">

                                    <input type="tel" name="client_phone" class="client-phone" placeholder="Ваш телефон">

                                    <textarea type="email" name="client_question" class="client-question" placeholder="Ваш вопрос"></textarea>

                                    <input type="hidden" name="send_type" class="send-type" value="1">
                                    <input type="hidden" name="send_extra" class="send-extra" value="1">
                                    <input type="hidden" name="key" value="<?php echo $_SESSION['sf_key'] ?>">
                                    <?php //Поле выше для защиты формы от спам-ботов ?>

                                    <div class="btn-holder">
                                        <button type="submit" class="button-white orange_button">Позвоните мне</button>
                                        <!--<div class="g-recaptcha" id="g-recaptcha"></div>-->
                                    </div>

                                    <!-- Agreement -->
                                    <div class="form-agree align-left">
                                        <label class="checkbox-label form-agree-check checked">
                                            <input type="checkbox" checked>
                                            Нажимая кнопку "ПОЗВОНИТЕ МНЕ", я&nbsp;даю своё согласие на&nbsp;обработку
                                            моих персональных данных в&nbsp;соответствии с&nbsp;Федеральным законом
                                            от&nbsp;27.07.2006&nbsp;года №152&#8209;ФЗ "О&nbsp;персональных данных",
                                            на&nbsp;условиях и&nbsp;для&nbsp;целей, определённых
                                            в&nbsp;Согласии на&nbsp;обработку персональных данных.
                                        </label>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="footer_social">
                        <p class="footer_social_text">
                            Мы в соцсетях
                        </p>
                        <ul class="social_icons">
                            <li>
                                <a href="#">
                                    <div class="icon-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28.82" height="28.82" viewBox="0 0 28.82 28.82">
                                            <path id="face" class="cls-1 face" d="M1385,7509.4a14.4,14.4,0,1,1,14.4-14.4A14.365,14.365,0,0,1,1385,7509.4Zm0-25.8a11.4,11.4,0,1,0,11.4,11.4A11.395,11.395,0,0,0,1385,7483.6Zm4.2,9-0.6,3h-2.4v8.4h-3.6v-8.4h-3v-3h3v-2.4a3.877,3.877,0,0,1,4.2-4.2h2.4v3H1388c-1.32,0-1.8.3-1.8,1.2v2.4h3Z" transform="translate(-1370.59 -7480.59)"/>
                                        </svg>
                                    </div>
                                    <div class="phone_icon_big">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><defs><path id="apyea" class="face_big" d="M235.89 14380.99a22.5 22.5 0 0 1-22.58-22.53 22.5 22.5 0 0 1 22.58-22.53 22.5 22.5 0 0 1 22.58 22.53 22.5 22.5 0 0 1-22.58 22.53zm0-40.37a17.85 17.85 0 1 0 0 35.67 17.85 17.85 0 1 0 0-35.67zm6.59 14.08l-.95 4.7h-3.76v13.14h-5.64v-13.14h-4.7v-4.7h4.7v-3.75c0-4.32 2.72-6.58 6.58-6.58h3.77v4.7h-1.89c-2.07 0-2.82.47-2.82 1.88v3.75z"/></defs><g><g transform="translate(-212 -14334)"><use fill="#fff" xlink:href="#apyea"/></g></g></svg>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="icon-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28.82" height="28.82" viewBox="0 0 28.82 28.82">
                                            <path id="ok" class="cls-1 ok" d="M1423,7509.4a14.4,14.4,0,1,1,14.4-14.4A14.365,14.365,0,0,1,1423,7509.4Zm0-25.8a11.4,11.4,0,1,0,11.4,11.4A11.395,11.395,0,0,0,1423,7483.6Zm4.8,13.62c-0.72.42-3,1.38-3,1.38l2.52,3.24a2.3,2.3,0,0,1,.48.96,1.2,1.2,0,0,1-1.2,1.2,1.143,1.143,0,0,1-.9-0.42l-2.7-3.18-2.76,3.18a1.143,1.143,0,0,1-.9.42,1.2,1.2,0,0,1-1.2-1.2,1.944,1.944,0,0,1,.48-0.96l2.58-3.24s-2.28-.96-3-1.38a1.091,1.091,0,0,1-.6-1.02,1.2,1.2,0,0,1,1.2-1.2c0.6,0,1.8,1.2,4.2,1.2s3.6-1.2,4.2-1.2a1.2,1.2,0,0,1,1.2,1.2A1.168,1.168,0,0,1,1427.8,7497.22Zm-4.8-2.82a4.2,4.2,0,1,1,4.2-4.2A4.174,4.174,0,0,1,1423,7494.4Zm0-6.3a2.1,2.1,0,1,0,2.1,2.1A2.126,2.126,0,0,0,1423,7488.1Z" transform="translate(-1408.59 -7480.59)"/>
                                        </svg>
                                    </div>
                                    <div class="phone_icon_big">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" width="49" height="48" viewBox="0 0 49 48"><defs><path id="yfv2a" class="ok_big" d="M295.48 14380.99a22.5 22.5 0 0 1-22.58-22.53 22.5 22.5 0 0 1 22.58-22.53 22.5 22.5 0 0 1 22.58 22.53 22.5 22.5 0 0 1-22.58 22.53zm0-40.37a17.85 17.85 0 1 0 0 35.67 17.85 17.85 0 1 0 0-35.67zm7.53 21.31a68.5 68.5 0 0 1-4.7 2.16l3.94 5.07s.76.94.76 1.5c0 1.03-.85 1.88-1.89 1.88-.94 0-1.4-.66-1.4-.66l-4.24-4.97-4.33 4.97s-.47.66-1.41.66a1.89 1.89 0 0 1-1.88-1.88c0-.66.75-1.5.75-1.5l4.05-5.07s-3.58-1.5-4.7-2.16a1.7 1.7 0 0 1-.95-1.6c0-1.03.85-1.87 1.88-1.87.94 0 2.83 1.87 6.59 1.87s5.64-1.87 6.59-1.87c1.03 0 1.88.84 1.88 1.87 0 .94-.57 1.32-.94 1.6zm-7.53-4.41a6.54 6.54 0 0 1-6.59-6.57 6.54 6.54 0 0 1 6.59-6.58c3.67 0 6.59 2.91 6.59 6.58a6.54 6.54 0 0 1-6.6 6.57zm0-9.86c-1.79 0-3.3 1.5-3.3 3.29 0 1.78 1.51 3.28 3.3 3.28 1.79 0 3.3-1.5 3.3-3.28 0-1.79-1.51-3.29-3.3-3.29z"/></defs><g><g transform="translate(-271 -14334)"><use fill="#fff" xlink:href="#yfv2a"/></g></g></svg>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="icon-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28.82" height="28.82" viewBox="0 0 28.82 28.82">
                                            <path id="insta" class="cls-1 insta" d="M1461,7509.4a14.4,14.4,0,1,1,14.4-14.4A14.365,14.365,0,0,1,1461,7509.4Zm0-25.8a11.4,11.4,0,1,0,11.4,11.4A11.395,11.395,0,0,0,1461,7483.6Zm5.7,18.84h-11.4a1.741,1.741,0,0,1-1.74-1.74v-11.4a1.741,1.741,0,0,1,1.74-1.74h11.16a2.175,2.175,0,0,1,1.98,1.74v11.4A1.824,1.824,0,0,1,1466.7,7502.44Zm-5.7-10.14a2.7,2.7,0,1,0,2.7,2.7A2.689,2.689,0,0,0,1461,7492.3Zm5.46-2.22a0.44,0.44,0,0,0-.48-0.48h-1.5a0.473,0.473,0,0,0-.48.48v1.5a0.516,0.516,0,0,0,.48.48h1.5a0.516,0.516,0,0,0,.48-0.48v-1.5Zm-0.06,9.36v-5.7h-1.14a4.568,4.568,0,0,1,.18,1.26,4.44,4.44,0,0,1-8.88,0,4.264,4.264,0,0,1,.18-1.26h-1.14v5.7a0.948,0.948,0,0,0,.96.96h8.94a0.948,0.948,0,0,0,.96-0.96h-0.06Z" transform="translate(-1446.59 -7480.59)"/>
                                        </svg>
                                    </div>
                                    <div class="phone_icon_big">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><defs><path id="395ja" class="insta_big" d="M355.07 14380.99a22.5 22.5 0 0 1-22.58-22.53 22.5 22.5 0 0 1 22.58-22.53 22.5 22.5 0 0 1 22.58 22.53 22.5 22.5 0 0 1-22.58 22.53zm0-40.37a17.85 17.85 0 1 0 0 35.67 17.85 17.85 0 1 0 0-35.67zm8.94 29.48h-17.88a2.73 2.73 0 0 1-2.73-2.72v-17.84c0-1.5 1.23-2.72 2.73-2.72h17.5c1.41.09 3.01 1.31 3.1 2.72v17.84c0 1.5-1.31 2.62-2.72 2.72zm-8.94-15.87a4.21 4.21 0 0 0-4.23 4.23 4.21 4.21 0 0 0 4.23 4.22 4.21 4.21 0 0 0 4.23-4.22 4.21 4.21 0 0 0-4.23-4.23zm8.56-3.47c0-.47-.37-.85-.75-.75h-2.35a.74.74 0 0 0-.76.75v2.35c0 .37.38.75.76.75h2.35c.38 0 .75-.38.75-.75zm-.1 14.64v-8.91h-1.78a6.94 6.94 0 0 1-6.68 8.92 6.94 6.94 0 0 1-6.68-8.92h-1.79v8.91c0 .85.66 1.5 1.5 1.5h14.03c.84 0 1.5-.65 1.5-1.5z"/></defs><g><g transform="translate(-331 -14334)"><use fill="#fff" xlink:href="#395ja"/></g></g></svg>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="icon-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28.82" height="28.82" viewBox="0 0 28.82 28.82">
                                            <path id="vk" class="cls-1 vk" d="M1499,7509.4a14.4,14.4,0,1,1,14.4-14.4A14.365,14.365,0,0,1,1499,7509.4Zm0-25.8a11.4,11.4,0,1,0,11.4,11.4A11.395,11.395,0,0,0,1499,7483.6Zm7.2,10.2c-1.8,2.4-1.2,1.8,0,3,1.38,1.38,1.8,2.04,1.8,2.4a1.229,1.229,0,0,1-1.2,1.2H1505a1.2,1.2,0,0,1-1.2-.6c-0.78-.78-1.8-1.8-2.4-1.8a1.29,1.29,0,0,0-1.2,1.2c0,0.36,0,1.2-.6,1.2H1499c-1.2-.06-2.58-0.18-4.68-2.34a19.5,19.5,0,0,1-4.32-7.26c-0.06-.24,0-0.6.6-0.6h1.8a0.982,0.982,0,0,1,1.2.6c1.2,1.8,2.4,4.2,3,4.2s0.6-2.4.6-2.4v-1.2c0-.84-1.02-0.6-1.2-0.6a2.829,2.829,0,0,1,.6-0.6,3.514,3.514,0,0,1,1.8-.6h1.8c0.9,0.24.6,1.62,0.6,3.6,0,0.66.06,1.8,0.6,1.8s0.6-.6,1.2-1.8a19.274,19.274,0,0,1,1.8-3c0.42-.54,3.48.06,3.6,0.42S1507.28,7492.3,1506.2,7493.8Z" transform="translate(-1484.59 -7480.59)"/>
                                        </svg>
                                    </div>
                                    <div class="phone_icon_big">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><defs><path id="mkq9a" class="vk_big" d="M414.66 14380.99a22.5 22.5 0 0 1-22.58-22.53 22.5 22.5 0 0 1 22.58-22.53 22.5 22.5 0 0 1 22.58 22.53 22.5 22.5 0 0 1-22.58 22.53zm0-40.37a17.85 17.85 0 1 0 0 35.67 17.85 17.85 0 1 0 0-35.67zm11.3 15.96c-2.83 3.75-1.9 2.82 0 4.7 2.15 2.15 2.81 3.18 2.81 3.75 0 1.78-1.88 1.88-1.88 1.88h-2.82c-.94 0-.94 0-1.88-.94-1.23-1.22-2.83-2.82-3.77-2.82s-1.88.94-1.88 1.88c0 .56 0 1.88-.94 1.88h-.94c-1.88-.1-4.05-.29-7.34-3.67-3.57-3.75-4.9-6.66-6.77-11.35-.1-.38 0-.94.94-.94h2.82c.94 0 1.13-.2 1.88.94 1.88 2.81 3.77 6.57 4.7 6.57.95 0 .95-3.76.95-3.76v-1.88c0-1.3-1.6-.93-1.88-.93-.2 0 .94-.94.94-.94s1.31-.94 2.82-.94h2.82c1.41.37.94 2.53.94 5.63 0 1.03.1 2.82.94 2.82.85 0 .94-.94 1.89-2.82.56-1.22.94-1.88 2.82-4.7.66-.84 5.46.1 5.64.66.2.57-1.13 2.63-2.82 4.98z"/></defs><g><g transform="translate(-391 -14334)"><use fill="#fff" xlink:href="#mkq9a"/></g></g></svg>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="payments"></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!--===================================================== Modals -->
    <!-- Overlay(s) -->
<!--    <div class="si-overlay"></div>-->
<!--    <div class="si-overlay-2"></div>-->
<!---->
<!--    <!-- Wrappers -->
<!--    <div class="si-modals-wrapper-2"></div>-->
<!---->
<!--    <div class="si-modals-wrapper">-->

        <!--============================================== success modal -->
<!--        <div class="si-success-modal si-success-modal-1">-->
<!--            <a href="#" class="si-close"></a>-->
<!---->
<!--            <div class="modal-container align-center">-->
<!---->
<!--                <div class="si-success-modal-title">-->
<!--                    Спасибо!-->
<!--                </div>-->
<!---->
<!--                <div class="success-time">-->
<!--                    Наш менеджер свяжется с вами в течение 15 минут-->
<!--                </div>-->
<!---->
<!--                <p>-->
<!--                    <strong>Время работы отдела продаж:</strong>-->
<!--                    пн-пт с 10.00 до 20.00 (по Москве)-->
<!--                </p>-->
<!---->
<!--            </div>-->
<!--        </div>-->
	
        <!--============================================== phone modal -->
<!--        <div class="si-modal phone-modal">-->
<!--            <a href="#" class="si-close"></a>-->
<!---->
<!--            <div class="modal-container align-center">-->
<!---->
<!--                <div class="modal-form-title">-->
<!--                    Закажите консультацию-->
<!--                </div>-->
<!---->
<!--                <div class="modal-time">-->
<!--                    Ответ в течение 15 минут-->
<!--                </div>-->
<!---->
<!--                <form method="post" class="send-form" autocomplete="off">-->
<!--                    <div class="row">-->
<!--                        <div class="col-1-2">-->
<!--                            <input type="text" name="client_name" class="client-name" placeholder="Ваше имя">-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-1-2">-->
<!--                            <input type="tel" name="client_phone" class="client-phone" placeholder="Ваш телефон">-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <textarea name="client_message" class="client-message" placeholder="Ваш вопрос"></textarea>-->
<!---->
<!--                    <input type="hidden" name="send_type" class="send-type" value="1">-->
<!--                    <input type="hidden" name="send_extra" class="send-extra" value="1">-->
<!--					<input type="hidden" name="key" value="--><?php //echo $_SESSION['sf_key'] ?><!--">-->
<!--					--><?php ////Поле выше для защиты формы от спам-ботов ?>
<!---->
<!--                    <div class="btn-holder">-->
<!--                        <button type="submit" class="btn">Позвоните мне</button>-->
<!--                        <!--<div class="g-recaptcha" id="g-recaptcha"></div>-->
<!--                    </div>-->
<!---->
<!--                    <!-- Agreement -->
<!--                    <div class="form-agree align-left">-->
<!--                        <label class="checkbox-label form-agree-check checked">-->
<!--                            <input type="checkbox" checked>-->
<!--                            Нажимая кнопку "ПОЗВОНИТЕ МНЕ", я&nbsp;даю своё согласие на&nbsp;обработку-->
<!--                            моих персональных данных в&nbsp;соответствии с&nbsp;Федеральным законом-->
<!--                            от&nbsp;27.07.2006&nbsp;года №152&#8209;ФЗ "О&nbsp;персональных данных",-->
<!--                            на&nbsp;условиях и&nbsp;для&nbsp;целей, определённых-->
<!--                            в&nbsp;Согласии на&nbsp;обработку персональных данных.-->
<!--                        </label>-->
<!--                    </div>-->
<!--                </form>-->
<!---->
<!--            </div>-->
<!--        </div>-->

        <!--============================================== text modal 1 -->
<!--        <div class="si-modal text-modal text-modal-1">-->
<!--            <a href="#" class="si-close"></a>-->
<!---->
<!--            <div class="modal-container">-->
<!---->
<!--                <div class="modal-form-title align-center">-->
<!--                    Согласие на обработку персональных данных-->
<!--                </div>-->
<!---->
<!--                <div class="modal-text-block">-->
<!--                    <p>-->
<!--                        Настоящим в&nbsp;соответствии с&nbsp;Федеральным законом №152&#8209;ФЗ-->
<!--                        «О&nbsp;персональных данных» от&nbsp;27.07.2006 года свободно, своей волей и&nbsp;в&nbsp;своём-->
<!--                        интересе выражаю своё безусловное согласие на&nbsp;обработку моих персональных данных-->
<!--                        НАЗВАНИЕ КОМПАНИИ,-->
<!--                        зарегистрированным в&nbsp;соответствии с&nbsp;законодательством&nbsp;РФ по&nbsp;адресу:-->
<!--                        АДРЕС КОМПАНИИ-->
<!--                        (далее по&nbsp;тексту&nbsp;- Оператор).-->
<!--                    </p>-->
<!---->
<!--                    <p>-->
<!--                        Персональные данные&nbsp;- любая информация, относящаяся к&nbsp;определённому-->
<!--                        или&nbsp;определяемому на&nbsp;основании такой информации физическому лицу.-->
<!--                    </p>-->
<!---->
<!--                    <p>-->
<!--                        Настоящее Согласие выдано мною на&nbsp;обработку следующих персональных данных:-->
<!--                    </p>-->
<!---->
<!--                    <ul class="marked">-->
<!--                        <li>-->
<!--                            Имя;-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            Телефон;-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            E-mail;-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            Комментарий.-->
<!--                        </li>-->
<!--                    </ul>-->
<!---->
<!--                    <p>-->
<!--                        Согласие дано Оператору для&nbsp;совершения следующих действий с&nbsp;моими персональными-->
<!--                        данными с&nbsp;использованием средств автоматизации и/или&nbsp;без&nbsp;использования таких-->
<!--                        средств: сбор, систематизация, накопление, хранение, уточнение (обновление, изменение),-->
<!--                        использование, обезличивание, передача третьим лицам для&nbsp;указанных ниже целей,-->
<!--                        а&nbsp;также осуществление любых иных действий, предусмотренных действующим-->
<!--                        законодательством&nbsp;РФ, как&nbsp;неавтоматизированными, так&nbsp;и&nbsp;автоматизированными-->
<!--                        способами.-->
<!--                    </p>-->
<!---->
<!--                    <p>-->
<!--                        Данное согласие даётся Оператору и&nbsp;третьему лицу(&#8209;ам)-->
<!--                        ТРЕТЬИ ЛИЦА-->
<!--                        для&nbsp;обработки моих персональных данных в&nbsp;следующих целях:-->
<!--                    </p>-->
<!---->
<!--                    <ul class="marked">-->
<!--                        <li>-->
<!--                            предоставление мне услуг/работ;-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            направление в&nbsp;мой адрес уведомлений, касающихся предоставляемых услуг/работ;-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            подготовка и&nbsp;направление ответов/коммерческих предложений на&nbsp;мои запросы;-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            направление в&nbsp;мой адрес информации, в&nbsp;том числе рекламной,-->
<!--                            о&nbsp;мероприятиях/товарах/услугах/работах Оператора.-->
<!--                        </li>-->
<!--                    </ul>-->
<!---->
<!--                    <p>-->
<!--                        Настоящее согласие действует до&nbsp;момента его&nbsp;отзыва путём направления соответствующего-->
<!--                        уведомления на&nbsp;электронный адрес-->
<!--                        <a href="mailto:">ЕМЕЙЛ</a>.-->
<!--                        В&nbsp;случае отзыва мною согласия на&nbsp;обработку персональных данных Оператор вправе-->
<!--                        продолжить обработку персональных данных без&nbsp;моего согласия при&nbsp;наличии оснований,-->
<!--                        указанных в&nbsp;пунктах 2&#8209;11 части&nbsp;1 статьи&nbsp;6, части&nbsp;2 статьи&nbsp;10-->
<!--                        и&nbsp;части&nbsp;2 статьи&nbsp;11 Федерального закона №152&#8209;ФЗ-->
<!--                        «О&nbsp;персональных данных» от&nbsp;26.06.2006&nbsp;г.-->
<!--                    </p>-->
<!--                </div>-->
<!---->
<!--            </div>-->
<!--        </div>-->

    </div>

</div>

<script type="text/javascript">
    var template_url = '<?php echo SI_RootURL(); ?>';
    //    var template_url = '<?php //echo SI_CurrentPageURL(); ?>//';
</script>


<!-- Inlcude jQuery framework + jQuery migrate -->
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery-migrate-1.4.1.min.js"></script>

<!-- IE -->
<!--[if IE]>
<script src="js/html5shiv.js"></script> <![endif]-->

<!-- JS Scripts -->
<script src="js/plugins-all.js"></script>
<script src="js/jquery.easing.js"></script>
<script src="js/smooth-scroll-1.4.4.min.js"></script>
<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU"></script>

<!-- Google Recaptcha -->
<!--<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>-->
<!--<script type="text/javascript">-->
<!--    var recaptcha1,-->
<!--        recaptcha2,-->
<!--        recaptcha3;-->
<!--    var onloadCallback = function () {-->
<!--        recaptcha = grecaptcha.render('g-recaptcha', {-->
<!--            'sitekey': ''-->
<!--        });-->
<!--    };-->
<!--</script>-->

<!-- custom scripts -->
<script src="js/main.js"></script>
<script src="js/share.js"></script>

<?php include('si-engine.php'); ?>

<!--

Digital-agency "Hello, brand!" - http://hello-brand.ru/
Дата создания: 16.03.2016
Версия: 1.0

-->


</body>
</html>
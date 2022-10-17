<?php
    session_start();
?>
<!DOCTYPE html>

<html lang="ru">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cursach</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="wrapper">

        <div class="content">

            <div class="header">

                <div class="container">

                    <div class="header__row">

                    <div class="header__logo">

                        Cursach

                        </div>

                        <div class="header__item">

                        <div class="header__link">

                            <a class="header__alink" href="index.php">ГЛАВНАЯ</a>

                        </div>

                        <div class="header__link">

                            <a id="blik" class="header__alink" href="info.php">ИНФО</a>

                        </div>

                        </div>
                        <?php if(!$_SESSION['user']){ ?>
                        <div class="header__profile">

                        <div class="header__avt">

                            <a class="header__alink header__alink_1" href="authorization.php">Войти</a>

                        </div>

                        </div>
                        <?php }
                        else { ?>
                        <div class="header__profile">

                        <div class="header__balance">

                            <?= $_SESSION['user']['balance'];?> ₽

                        </div>

                        <div class="header__avt">
                            <span class="header__alink header__alink_1 header__nickname"><?=$_SESSION['user']['login'];?></span>
                        </div>

                        </div>

                        <nav class="header__menu">

                            <ul class="header__list">

                                <li><a href="refill.php" class="header__list-link">Пополнить баланс</a></li>

                                <li><a href="profile.php" class="header__list-link">Инвентарь</a></li>

                                <li><span id="exit" class="header__list-link">Выход</span></li>

                            </ul>

                        </nav>
                        <?php }?>
                    </div>

                </div>

            </div>

            <div class="advantages">

                <div class="container">

                    <div class="advantages__row">

                        <div class="advantages__body">

                            <div class="advantages__title title">Преимущества</div>

                            <ul class="advantages__list">

                                <li>Большой выбор</li>

                                <li>Лёгкое пополнение</li>

                                <li>Выгодные цены</li>

                                <li>Габену на похудение</li>

                            </ul>

                        </div>

                        <div class="advantages__image">

                            <img src="img/icons/image_2.png" alt="">

                        </div>

                    </div>

                </div>

            </div>

            <div class="description">

                <div class="container">

                    <div class="description__row">

                        <div class="description__image">

                            <img src="img/icons/image.jpg" alt="">

                        </div>

                        <div class="description__body">

                            <div class="description__title title">О нас</div>

                            <div class="description__text">

                                <p>Данный интернет магазин создан для продажи скинов по игре Dota 2. В нашем магазине вы можете приобрести скины по более выгодной цене.</p>

                                <p>Данный сайт не является казином, рулеткой и подобной махинационной схемой. Здесь покупатели получают товар, который сами выбирают.</p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="link">

                <div class="container">

                    <div class="link__row">

                        <div class="link__title title">Следите за нами здесь</div>

                        <div class="link__item">

                            <div class="link__image">

                                <a href="https://vk.com/d2ru"><img src="img/icons/link/vk.png" alt=""></a>

                            </div>

                            <div class="link__image">

                                <a href="https://www.youtube.com/watch?v=P-t2BB1s2hM"><img src="img/icons/link/youtube.png" alt=""></a>

                            </div>

                            <div class="link__image">

                                <a href="https://telegram.org"><img src="img/icons/link/tg.png" alt=""></a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <footer class="footer">

            <div class="container">

                <div class="footer__row">

                    <div class="footer__text">Курсовой проект 2022</div>

                </div>

            </div>

        </footer>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="js/script.js"></script>

</body>

</html>
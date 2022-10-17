<?php
    session_start();
    require_once 'db.php';
    $inventory=[];
    if($query = $db->query("select transaction.id, transaction.id_user,transaction.id_skin,skin.img,skin.price,skin.name FROM transaction INNER JOIN skin on transaction.id_skin = skin.id and transaction.id_user = '".$_SESSION['user']['id']."'")){
        $inventory = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    else{
        print_r($db->errorInfo());
    }
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

                            <a class="header__alink" href="info.php">ИНФО</a>

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

            <div class="inventory">

                <div class="container">

                    <div class="inventory__row">

                        <div class="inventory__title title">

                            Инвентарь

                        </div>

                        <div class="inventory__catalog catalog">
                            <?php foreach($inventory as $item): ?>

                            <div class="inventory__item">

                                <div class="inventory__item-main">

                                    <img src="img/skins/<?= $item['img'] ?>" alt="">

                                    <div class="inventory__item-text"><?= $item['name'] ?></div>

                                </div>

                                <div class="inventory__item-info">

                                    <button>Вывод</button>

                                    <div class="inventory__item-price"><?= $item['price'] ?> ₽</div>

                                </div>

                            </div>
                            <?php endforeach; ?>

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
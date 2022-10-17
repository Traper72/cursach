<?php

session_start();

require_once '../db.php';

$transaction = [];

if($query = $db->query("select user.login , skin.name , transaction.price , transaction.date from transaction inner JOIN user on transaction.id_user = user.id INNER join skin on transaction.id_skin = skin.id  order by date desc;")){
    $transaction = $query->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="../css/style.css">
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
                                <a class="header__alink" href="index.php">СКИНЫ</a>
                            </div>
                            <div class="header__link">
                                <a id="blik" class="header__alink" href="statistic.php">СТАТИСТИКА</a>
                            </div>
                        </div>
                        <div class="header__profile">
                            <div class="header__avt">
                                <span class="header__alink header__alink_1 header__nickname"><?=$_SESSION['user']['login'];?></span>
                            </div>
                        </div>
                        <nav class="header__menu">
                            <ul class="header__list">
                                <li><span id="exit-admin" class="header__list-link">Выход</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="inventory">
                <div class="container">
                    <div class="inventory__row">
                        <div class="inventory__title subtitle">
                            Статистика покупок
                        </div>
                        <div class="inventory__statistic">
                            <table class="inventory__table">
                                <tr class="table__title">
                                    <td>Логин пользователя</td>
                                    <td>название скина</td>
                                    <td>Стоимость покупки</td>
                                    <td>Время покупки</td>
                                </tr>
                                <?php foreach($transaction as $item): ?>
                                <tr>
                                    <td><?= $item['login'] ?></td>
                                    <td><?= $item['name'] ?></td>
                                    <td><?= $item['price'] ?></td>
                                    <td><?= $item['date'] ?></td>
                                </tr>
                                <? endforeach; ?>
                            </table>
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
    <script src="../js/script.js"></script>
    <script>
        $('#exit-admin').on("click", function(){
            var b = true;
            $.ajax({
                url: '../handlers/exit_account.php',
                type: 'POST',
                cache: false,
                data: {b: b},
                dataType: 'html',
                success: function(data){
                    alert('Вы вышли из аккаунта');
                    window.location.href = 'http://a0689178.xsph.ru/index.php';
                }
            });
        });
    </script>
</body>
</html>
<?php

session_start();

require_once '../db.php';

$skins = [];

if($query = $db->query("select * from skin")){
    $skins = $query->fetchAll(PDO::FETCH_ASSOC);
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
                                <a id="blik" class="header__alink" href="index.php">СКИНЫ</a>
                            </div>
                            <div class="header__link">
                                <a class="header__alink" href="statistic.php">СТАТИСТИКА</a>
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
                    <div id="inventory" class="inventory__row">
                        <div class="inventory__title title">
                            Скины
                        </div>
                        <div class="inventory__catalog catalog">
                        <?php foreach($skins as $item): ?>
                            <div class="inventory__item">
                                <div class="inventory__item-main">
                                    <img src="../img/skins/<?= $item['img'] ?>" alt="">
                                    <div class="inventory__item-text"><?= $item['name'] ?></div>
                                </div>
                                <div class="inventory__item-info">
                                    <button class="btn-delete" id="<?= $item['id'] ?>">Удалить</button>
                                    <div class="inventory__item-price"><?= $item['price'] ?> ₽</div>
                                </div>
                            </div>
                            <? endforeach; ?>
                        </div>
                    </div>
                    <a href="addProduct.php">Добавить товар</a>
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
        async function elementUpdate(selector) {
            try {
                var html = await (await fetch(location.href)).text();
                var newdoc = new DOMParser().parseFromString(html, 'text/html');
                document.querySelector(selector).outerHTML = newdoc.querySelector(selector).outerHTML;
                return true;
            } 
            catch(err) {
                return false;
            }
        }
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
        $(document).on('click','.btn-delete', function(){
            var id = $(this).attr('id');
            $.ajax({
                type : 'POST',
                url : "delete_item.php",
                data : {id: id},
                cache : false,
                dataType: 'html',
            success: function(data){
                if(data == 'true'){
                    alert("Предмет удалён");
                   window.location.replace('http://a0689178.xsph.ru/admin/index.php');
                }
                else{
                    alert("Не удалось удалить предмет");
                }
            }
            })
        })
    </script>
</body>
</html>
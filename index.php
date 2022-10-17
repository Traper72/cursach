<?php

session_start();

require_once 'db.php';

$skins = [];
$rarity = [];
$heroes = [];


if($query = $db->query("select * from rarity")){
    $rarity = $query->fetchAll(PDO::FETCH_ASSOC);
}
else{
    print_r($db->errorInfo());
}
if($query = $db->query("select * from hero")){
    $heroes = $query->fetchAll(PDO::FETCH_ASSOC);
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

                                <a id="blik" class="header__alink" href="index.php">ГЛАВНАЯ</a>

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

            <div class="shop">

                <div class="container">

                    <div class="shop__row">

                        <div class="shop__title title">Каталог</div>

                        <div id="shop__body" class="shop__body">

                            <div class="shop__filter">

                                <div class="shop__search">

                                    <div class="shop__search-title subtitle">Поиск</div>

                                    <div class="shop__search-input">

                                        <input id="input-search" type="search" placeholder="search">

                                        <button id="btn-search">Поиск</button>

                                    </div>

                                </div>

                                <div class="shop__rarity">

                                    <div class="shop__rarity-title subtitle">Редкость</div>

                                    <ul id="rarity-form" class="shop__rarity-list">

                                        <li><input name="raret" type="radio" id="All-rare" value="all" checked><label for="All-rare">All</label></li>
                                        <?php foreach($rarity as $item): ?>
                                        <li><input name="raret" type="radio" id="<?=$item['name']?>" value="<?=$item['name']?>"><label for="<?=$item['name']?>"><?=$item['name']?></label></li>
                                        <?php endforeach; ?>
                                    </ul>

                                </div>

                                <div class="shop__hero">

                                    <div class="shop__hero-title subtitle">Герой</div>

                                    <div class="shop__hero-list">

                                        <select name="heroes" id="heroes">
                                            <option name="hero" value="all">All</option>
                                            <?php foreach($heroes as $item): ?>
                                            <option name="hero" value="<?=$item['name']?>"><?=$item['name']?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div>
                                    <div class="shop__filter-btn">
                                        <button id="btn-reser-filters">Сбросить фильтры</button>
                                    </div>
                                    

                                </div>

                            </div>

                             <div class="shop__catalog catalog" id="catalog">
                                <?php
                                    if($_SESSION['searchStatus']){
                                        $search_text = $_SESSION['searchText'];
                                        if($query = $db->query("select skin.id as id, skin.name as name, id_rarity, id_hero, img, price from skin where name like '%$search_text%'")){
                                            $skins = $query->fetchAll(PDO::FETCH_ASSOC);
                                        }
                                        else{
                                            print_r($db->errorInfo());
                                        }
                                    }
                                    else{
                                        if($_SESSION['selectedRarity'] && !$_SESSION['selectedHero']){
                                            $rarity = $_SESSION['selectedRarity'];
                                            if($query = $db->query("select skin.id as id, skin.name as name, id_rarity, id_hero, img, price from skin inner join rarity on skin.id_rarity = rarity.id and rarity.name = '$rarity'")){
                                                $skins = $query->fetchAll(PDO::FETCH_ASSOC);
                                            }
                                            else{
                                                print_r($db->errorInfo());
                                            }
                                        }
                                        else if($_SESSION['selectedHero'] && !$_SESSION['selectedRarity']){
                                            $hero = $_SESSION['selectedHero'];
                                            if($query = $db->query("select skin.id as id, skin.name as name, id_rarity, id_hero, img, price from skin inner join hero on skin.id_hero = hero.id and hero.name = '$hero'")){
                                                $skins = $query->fetchAll(PDO::FETCH_ASSOC);
                                            }
                                            else{
                                                print_r($db->errorInfo());
                                            }
                                        }
                                        else if($_SESSION['selectedRarity'] && $_SESSION['selectedHero']){
                                            $rarity = $_SESSION['selectedRarity'];
                                            $hero = $_SESSION['selectedHero'];
                                            if($query = $db->query("select skin.id as id, skin.name as name, id_rarity, id_hero, img, price from skin inner join hero on skin.id_hero = hero.id and hero.name = '$hero' inner join rarity on skin.id_rarity = rarity.id and rarity.name = '$rarity'")){
                                                $skins = $query->fetchAll(PDO::FETCH_ASSOC);
                                            }
                                            else{
                                                print_r($db->errorInfo());
                                            }
                                        }
                                        else{
                                            if($query = $db->query("select * from skin")){
                                                $skins = $query->fetchAll(PDO::FETCH_ASSOC);
                                            }
                                            else{
                                                print_r($db->errorInfo());
                                            }
                                        }
                                    }
                                ?>
                                <?php foreach($skins as $item): ?>

                                <div class="shop__item">

                                    <div class="shop__item-main">

                                        <img src="img/skins/<?=$item['img']?>" alt="">

                                        <div class="shop__item-text"><?=$item['name']?></div>

                                    </div>

                                    <div class="shop__item-info">
                                        <?php if($_SESSION['user']){ ?>
                                        <button class="btn-buy" id="<?=$item['id'];?>">Buy</button>
                                        <?php }else{ ?>
                                            <button>Buy</button>
                                        <?php } ?>

                                        <div class="shop__item-price"><?=$item['price']?> ₽</div>

                                    </div>

                                </div>
                                <?php endforeach; ?>

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

    <div id="query" style="display:none">
        <?php
             
        ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="js/script.js"></script>
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

        $('#rarity-form input').on('change', function() {
            var selectedRarity = $('input[name=raret]:checked', '#rarity-form').val(); 
            $.ajax({
                type : 'POST',
                url : 'handlers/filters.php',
                data : {selectedRarity : selectedRarity},
                cache : false
            }).done(function(data){
                elementUpdate('div#catalog');
            });
        });
        $('#heroes').on('change', function() {
            var selectedHero = this.value;
            $.ajax({
                type : 'POST',
                url : 'handlers/filters.php',
                data : {selectedHero : selectedHero},
                cache : false
            }).done(function(data){
                elementUpdate('div#catalog');
            });
        });
        $('#btn-reser-filters').on('click', function(){
            $('#heroes').val('all');
            $('#input-search').val('');
            $('input[name="raret"]')[0].checked = true;
            var ball = true;
            $.ajax({
                type : 'POST',
                url : 'handlers/resetfilters.php',
                data : {ball : ball},
                cache : false
            }).done(function(data){
                elementUpdate('div#catalog');
            });
        })
        $(document).on("click","#btn-search",function(){
            var searchText = $("#input-search").val();
            var searchStatus = true;
            $.ajax({
            type : 'POST',
            url : "handlers/search_handler.php",
            data : {
            searchText : searchText,
            searchStatus : searchStatus
            },
            cache : false
            }).done(function(){
            elementUpdate("div#catalog");
            });
        });
        $(document).on('click', '.btn-buy',function(){
            var id = $(this).attr('id');
            $.ajax({
                type : 'POST',
                url : "handlers/buy_item.php",
                data : {id: id},
                cache : false,
                dataType: 'html',
            success: function(data){
                if(data == 'true'){
                    alert("Покупка успешно завершена");
                    elementUpdate('div#header__balance');
                }
                else{
                    alert("Не удалось совершить покупку");
                }
            }
            })
        })
    </script>

</body>

</html>
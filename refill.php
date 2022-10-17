<?php
    session_start();
?>
<!DOCTYPE html>

<html lang="ru">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Curshach</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="wrapper">

        <div class="content">

            <div class="header" id="header">

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

                        <div id="header__balance" class="header__balance">
                            
                            
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

            <div class="authorization">

                <div class="container">

                    <div class="authorization__row">

                        <div class="authorization__title subtitle">

                            Пополнение баланса

                        </div>

                        <form action="" class="refill__body dataform">

                            <div class="authorization__item refill__item_1">

                                <input id="number_card" placeholder="Введите номер карты" type="text">

                            </div>

                            <div class="refill__item">

                                <input id="date_card" placeholder="Срок (06/2025)" type="text">

                                <input id="cvc_card" placeholder="Введите CVC" type="password">

                            </div>
                            <div class="authorization__item refill__item_1">

                                <input id="refill_sum" placeholder="Введите сумму пополнения" type="number">

                            </div>
                            <button id="btn-refill">Пополнить</button>

                        </form>

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
        
        $(document).on("click",'#btn-refill', function(){
            const regex = new RegExp('(?<=^|[^0-9])[0-9]{16}(?=[^0-9]|$)|[0-9]{4}[-| |_][0-9]{4}[-| |_][0-9]{4}[-| |_][0-9]{4}');
            const regex2 = new RegExp('^[01,02,03,04,05,06,07,08,09,10,11,12]{2}\/[202]{3}[3-9]$');
            const regex3 = new RegExp('^[0-9]{3}$');
            var number_card = $('#number_card').val().trim();
            var date_card = $('#date_card').val().trim();
            var cvc_card = $('#cvc_card').val().trim();
            var refill_sum = $('#refill_sum').val().trim();
            if(regex.test(number_card)){
                if(regex2.test(date_card)){
                    if(regex3.test(cvc_card)){
                        if(refill_sum != "" && refill_sum > 0){
                            $.ajax({
                            url: 'handlers/refill_balance.php',
                            type: 'POST',
                            cache: false,
                            data: {refill_sum: refill_sum},
                            dataType: 'html',
                            success: function(data){
                                if(data == "true"){
                                    alert("Баланс успешно пополнен");
                                    elementUpdate('#header__balance');
                                }
                                else{
                                    alert("Не удалось пополнить баланс");
                                }
                            }
                            });
                        }
                        else{
                            alert("Введите сумму пополнения");
                            return false;
                        }
                    }
                    else{
                        alert("Неверно указан код карты");
                        return false;
                    }
                }
                else{
                    alert("Срок карты введён неверно");
                    return false;
                }
            }
            else{
                alert("Номер карты введён неверно");
                return false;
            }
        })
    </script>

</body>

</html>
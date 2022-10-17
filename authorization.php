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

                        <div class="header__profile">

                            <div class="header__avt">

                                <a class="header__alink header__alink_1" href="authorization.php">Войти</a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="authorization">

                <div class="container">

                    <div class="authorization__row">

                        <div class="authorization__title subtitle">

                            Авторизация

                        </div>
                        <form id="authorization-form" action="javascript:sendForm()" class="authorization__body dataform">

                            <div class="authorization__item">

                                <input id="authorization-login" placeholder="Введите логин" type="text">

                            </div>

                            <div class="authorization__item">

                                <input id="authorization-password" placeholder="Введите пароль" type="password">

                            </div>

                            <button id="btn-authorization">Войти</button>

                            <div class="authorization__item-remark"><a href="registration.php">Нет аккаунта? Создать</a></div>

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
        function sendForm(){
        var login = $("#authorization-login").val().trim();
        var password = $("#authorization-password").val().trim();
        if(login == ""){
            alert("Введите логин");
            return false;
        }
        else if(password ==  ""){
            alert("Введите пароль");
            return false;
        }
        
        $.ajax({
            url: 'handlers/authorization_verification.php',
            type: 'POST',
            cache: false,
            data: {login: login, password: password},
            dataType: 'html',
            beforeSend: function(){
                $("#btn-authorization").prop("disabled", true);
            },
            success: function(data){
                if(data == 'admin'){
                    alert("Авторизация прошла успешно");
                    window.location.href = 'http://a0689178.xsph.ru/admin/index.php';
                }
                else if(data == 'true'){
                    alert("Авторизация прошла успешно");
                    window.location.href = 'http://a0689178.xsph.ru/index.php';
                }
                else{
                    alert("Неверный логин или пароль");
                }
                $("#btn-authorization").prop("disabled", false);
            }
        });
    }
    </script>

</body>

</html>
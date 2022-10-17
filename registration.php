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

                            Регистрация

                        </div>

                        <form action="" class="authorization__body dataform">

                            <div class="authorization__item">

                                <input id="registration-email" placeholder="Введите email" type="email">

                            </div>

                            <div class="authorization__item">

                                <input id="registration-login" placeholder="Введите логин" type="text">

                            </div>

                            <div class="authorization__item">

                                <input id="registration-password" placeholder="Введите пароль" type="password">

                            </div>

                            <button id="registration-btn">Зарегистрироваться</button>

                            <div class="authorization__item-remark"><a href="authorization.php">Есть аккаунт? Войти</a></div>

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
        $('#registration-btn').on('click', function(){
            var email = $('#registration-email').val().trim();
            var login = $('#registration-login').val().trim();
            var password = $('#registration-password').val().trim();
            regex = new RegExp(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
            regex2 = new RegExp('^[a-zA-z][0-9,a-z,A-Z]{5,29}$');
            if(regex.test(email)){
                if(regex2.test(login)){
                    if(password.length >= 5){
                        $.ajax({
                            url: 'handlers/registration_verification.php',
                            type: 'POST',
                            cache: false,
                            data: {email: email, login: login, password: password},
                            dataType: 'html',
                            beforeSend: function(){
                                $("#registration-btn").prop("disabled", true);
                            },
                            success: function(data){
                                if(data == 'true'){
                                    alert("Регистрация прошла успешно");
                                    window.location.href = 'http://a0689178.xsph.ru/authorization.php';
                                }
                                else{
                                    alert("Данный логин уже занят");
                                }
                                $("#registration-btn").prop("disabled", false);
                            }
                        })
                    }
                    else{
                        alert("Пароль должен быть не менее 5 символов");
                        return false;
                    }
                }
                else{
                    alert("Некорректный логин, логин должен начинаться с буквы и может состоять только из латинский букв и арабских чисел");
                    return false;
                }
            }
            else{
                alert("Некорректный ввод email");
                return false;
            }
        })
    </script>

</body>

</html>
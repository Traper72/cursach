document.querySelector('.header__nickname').onclick = function(){

    $('.header__menu').toggleClass('active');

};

$('#exit').on("click", function(){
   var b = true;
   $.ajax({
       url: 'handlers/exit_account.php',
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


   

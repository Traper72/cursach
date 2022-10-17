<?php

session_start();
unset($_SESSION['searchStatus']);
unset($_SESSION['searchText']);

if($_POST['selectedRarity']){
    if($_POST['selectedRarity'] != 'all'){
        $_SESSION['selectedRarity'] = $_POST['selectedRarity'];
    }
    else{
        unset($_SESSION['selectedRarity']);
    }
}
if($_POST['selectedHero']){
    if($_POST['selectedHero'] != 'all'){
        $_SESSION['selectedHero'] = $_POST['selectedHero'];
    }
    else{
        unset($_SESSION['selectedHero']);
    }
}
?>
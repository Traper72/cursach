<?php
    session_start();
    if($_POST['searchStatus']){
    $_SESSION['searchStatus'] = 'inSearch';
    $_SESSION['searchText'] = $_POST['searchText'];
    }
?>
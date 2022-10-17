<?php
    session_start();
    require_once '../db.php';
    $user = [];
    $query = $db->query("select * from user where login = '".$_POST['login']."' and password = '".$_POST['password']."'");
    $user = $query->fetchAll(PDO::FETCH_ASSOC);
    if($user[0]['id'] != "" && $user[0]['id_access'] == 2){
        $_SESSION['user'] = $user[0];
        echo "true";
    }
    else if($user[0]['id'] != "" && $user[0]['id_access'] == 1){
        $_SESSION['user'] = $user[0];
        echo "admin";
    }
    else{
        echo "false";
    }
    //file_put_contents('debug.txt',print_r($user,1));
    ?>
<?php
    session_start();
    require_once '../db.php';
    $user = [];
    $query = $db->query("select * from user where login = '".$_POST['login']."'");
    $user = $query->fetchAll(PDO::FETCH_ASSOC);
    if($user[0]['id'] != 0){
        echo 'false';
    }
    else{
        $query = $db->query("insert into user(login, password, email, balance, id_access) VALUES ('".$_POST['login']."','".$_POST['password']."','".$_POST['email']."',0, 2)");
        echo 'true';
    }
?>
<?php
    session_start();
    require_once '../db.php';
    $skins = [];
    if($query = $db->query("select * from skin where id = '".$_POST['id']."'")){
        $skins = $query->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['skin'] = $skins[0];
        if($_SESSION['skin']['price'] > $_SESSION['user']['balance']){
            echo 'false';
        }
        else{
            $query = $db->query("insert into transaction(id_user, id_skin, price) VALUES ('".$_SESSION['user']['id']."','".$_POST['id']."','".$_SESSION['skin']['price']."')");
            $_SESSION['user']['balance'] = $_SESSION['user']['balance'] - $_SESSION['skin']['price'];
            $query = $db->query("update user set balance='".$_SESSION['user']['balance']."' WHERE id = '".$_SESSION['user']['id']."'");
            echo 'true';
        }
    }
    else{
        print_r($db->errorInfo());
    }
?>
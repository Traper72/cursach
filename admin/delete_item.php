<?php
    session_start();
    require_once '../db.php';
    $item = $_POST['id'];
    $query = $db->query("delete from skin where id='$item'");
    echo 'true';
?>
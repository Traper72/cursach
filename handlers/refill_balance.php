<?php 
    session_start();
    require_once '../db.php';
    $sum = $_SESSION['user']['balance'] + $_POST['refill_sum'];
    $query = $db->query("update user set balance='$sum' WHERE id = '".$_SESSION['user']['id']."'");
    $_SESSION['user']['balance'] = $sum;
    echo "true";
?>
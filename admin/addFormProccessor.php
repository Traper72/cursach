<?php

session_start();
require_once '../db.php'; //ПУть к db.php

//ПУУТЬ прописать
$myimg = '../img/skins/' . basename($_FILES['product_photo']['name']);
move_uploaded_file($_FILES['product_photo']['tmp_name'], $myimg);


$name = $_POST['name'];
$price = $_POST['price'];
$rarity = $_POST['rarity'];
$hero = $_POST['heroes'];
$photoName = basename($_FILES['product_photo']['name']);

//$query = "insert into skin (name,id_rarity,id_hero,img,price) values('$name','$rarity','$hero','$photoName','$price')";
$query = $db->query("insert into skin (name,id_rarity,id_hero,img,price) values('$name','$rarity','$hero','$photoName','$price')");
header('Location: index.php');

?>
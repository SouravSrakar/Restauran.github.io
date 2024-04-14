<?php
session_start();
include_once 'connection.php';
if(!empty($_GET["action"])) {
$productId = isset($_GET['ID']) ? htmlspecialchars($_GET['ID']) : '';
$quantity = isset($_POST['quantity']) ? htmlspecialchars($_POST['quantity']) : '';
switch($_GET["action"]) {
case "add":
if(!empty($quantity)) {
$stmt = $con->prepare("SELECT * FROM food where ID= ?");
$stmt->bind_param('i',$productId);
$stmt->execute();
$productDetails = $stmt->get_result()->fetch_object();
$itemArray = array($productDetails->ID=>array('Foodname'=>$productDetails->Foodname, 'ID'=>$productDetails->ID, 'quantity'=>$quantity, 'Amount'=>$productDetails->Amount));
if(!empty($_SESSION["cart_item"])) {
if(in_array($productDetails->id,array_keys($_SESSION["cart_item"]))) {
foreach($_SESSION["cart_item"] as $k => $v) {
if($productDetails->ID == $k) {
if(empty($_SESSION["cart_item"][$k]["quantity"])) {
$_SESSION["cart_item"][$k]["quantity"] = 0;
}
$_SESSION["cart_item"][$k]["quantity"] += $quantity;
}
}
} else {
$_SESSION["cart_item"] = $_SESSION["cart_item"] + $itemArray;
}
} else {
$_SESSION["cart_item"] = $itemArray;
}
}
header('Location:../order/index.php');
break;
case "remove":
if(!empty($_SESSION["cart_item"])) {
foreach($_SESSION["cart_item"] as $k => $v) {
if($productId == $v['ID'])
unset($_SESSION["cart_item"][$k]);
header('Location:../order/index.php');
}
}
break;
case "empty":
unset($_SESSION["cart_item"]);
break;
}
}
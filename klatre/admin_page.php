<?php
session_start();
if(!$_SESSION['login']){
    header('Location:index.php');
    die();
}

$conn = new PDO("mysql:host=localhost;dbname=klatring;charset=UTF8", 'root', '');

$stmt = $conn->prepare("SELECT * FROM `deltaker");

$stmt->execute();


{

}
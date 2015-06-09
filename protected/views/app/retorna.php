<?php
$hostname = "";
$user = "";
$pass = "";
$basedados = "";
$pdo = new PDO("mysql:host=localhost; dbname=mtcontrool; charset=utf8;",'root','');
$dados = $pdo->prepare("SELECT name FROM users");
$dados->execute();
echo json_encode($dados->fetchAll(PDO::FETCH_ASSOC));
?>
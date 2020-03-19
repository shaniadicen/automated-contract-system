<?php
require './scripts/includes/dbh.php';

$id = $_GET['id'];

$stmt = $mysqli->prepare("UPDATE contracts set status='unpaid' where contractId=$id");
$stmt->execute();


$result = $stmt->get_result();

$row = mysqli_fetch_array($result);

header('Location: transactions.php');

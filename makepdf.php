<?php

require "vendor/autoload.php";

use Spipu\Html2Pdf\Html2Pdf;
$html2pdf = new Html2Pdf('P', 'A4', 'en', true, 'UTF-8', array(0, 0, 0, 0));
$html2pdf->pdf->SetDisplayMode('fullpage');
ob_start();
include "template.php";
$content = ob_get_clean();
$html2pdf->writeHTML($content);
error_reporting(0);
$html2pdf->createIndex('', 30, 12, false, true, 1, "helvetica");

$id = $_GET['id'];

$query = "SELECT * FROM contracts WHERE contractId = $id";  
$result = mysqli_query($mysqli, $query);
$row = mysqli_fetch_array($result);

$bride = $row['brideName'];
$groom = $row['groomName'];

$html2pdf->output("bowandarrowfilms_$bride-$groom.pdf",'D');

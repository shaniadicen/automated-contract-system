<?php
/*$conn = mysqli_connect("localhost", "root", "", "shoplyssanicole"); //WAMP Server*/
// $conn = mysqli_connect("localhost","root","root","shoplyssanicoletest"); //MAMP Server
$mysqli = new mysqli("localhost","id8557111_root","admin","id8557111_bowandarrowfilms"); //XXAMP Server

if (!$mysqli ) {
    die("Connection failed: " . mysqli_connect_error());
}
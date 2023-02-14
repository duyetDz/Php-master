<?php

$name = "Hello";

$numb1 = $_POST['numb1'];
$numb2 = $_POST['numb1'];
$sum = 0;

if (isset($_POST["submit-btn"])) {
    $sum = $numb1 + $numb2;
}

?>
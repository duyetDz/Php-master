<?php

// Khởi tạo session
session_start();

$servername = "localhost";
$username = "GVDUYET";
$password = "GVDUYET";

// Create connection
$conn = new mysqli($servername, $username, $password, "php_master");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

$id = $_GET['id'];

$sql = "DELETE FROM `students` WHERE `students`.`id` = $id";

if ($conn->query($sql) === TRUE) {
    $_SESSION['status'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Hey!</strong> Xóa thông tin người dùng $name thành công 
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    header('location: http://localhost/JVB/Tuan%202%20Php/function/index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

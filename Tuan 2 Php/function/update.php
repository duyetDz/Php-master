<?php

// Khởi tạo session
session_start();
// echo $id;
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

// Lấy dữ liệu của bảng class đổ xuống form add
$sql = "SELECT * FROM `class`";
$result = $conn->query($sql);

// Lấy dữ liệu của người dùng có Where id = $id

$id = $_GET['user_id'];



if(isset($_GET['user_id']))
{
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

    $query = "SELECT * FROM `students` WHERE students.id = $id";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $student = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Student Fetch Successfully by id',
            'data' => $student
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Student Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}































// echo json_encode($_GET);

// $get_user_id = "SELECT * FROM `students` WHERE students.id = $id";
// $user = $conn->query($get_user_id)->fetch_assoc();
// echo json_encode($user);

// if (!empty($user)) {
//     $name = $user['name'];
//     $main_major = $user['main_major'];
//     $class_id = $user['class_id'];
// }



    // $update_member  = "UPDATE `students` SET `id`='$id',`name`='$name',`main_major`='$main_major',`class_id`='$class_id',`created_at`=current_timestamp() WHERE students.id = $id";


?>

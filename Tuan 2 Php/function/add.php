<?php
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

if (isset($_POST['save_student'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $main_major = mysqli_real_escape_string($conn, $_POST['main_major']);
    $class_id = mysqli_real_escape_string($conn, $_POST['class_id']);

    if ($name == NULL  || $main_major == NULL  || $class_id == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO `students` (`id`, `name`, `main_major`, `class_id`, `created_at`) VALUES (NULL, '$name', '$main_major', '$class_id', current_timestamp())";
    // echo json_encode($query);
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Student Created Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Student Not Created'
        ];
        echo json_encode($res);
        return;
    }

    // echo json_encode($_POST);
}

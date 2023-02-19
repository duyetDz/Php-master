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
// Lấy dữ liệu của bảng class đổ xuống form add
$sql = "SELECT * FROM `class`";
$result = $conn->query($sql);


// print_r($_POST);
// tạo mảng rỗng để lưu lỗi, Lưu lại thông tin của các ô input
$error = array();
$name = "";
$main_major = "";
$class_id = "";
$created_at = "current_timestamp()";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $error['name'] = "<p style=' margin-top: 10px;color:red;margin-bottom: 0px;padding: 7px ;background-color: #ddabab'>Không được để trống name</p>";
    } else {
        $name = $_POST["name"];
    }
    if (empty($_POST["main_major"])) {
        $error['main_major'] = "<p style=' margin-top: 10px;color:red;margin-bottom: 0px;padding: 7px ;background-color: #ddabab'>Không được để trống main_major</p>";
    } else {
        $main_major = $_POST["main_major"];
    }

    if (empty($_POST["class_id"])) {
        $error['class_id'] = "<p style=' margin-top: 10px;color:red;margin-bottom: 0px;padding: 7px ;background-color: #ddabab'>Không được để trống class_id</p>";
    } else {
        $class_id = $_POST["class_id"];
    }


    $add_member  = "INSERT INTO `students` (`id`, `name`, `main_major`, `class_id`, `created_at`) VALUES (NULL, '$name', '$main_major', '$class_id', current_timestamp())";

    if (!isset($_POST['btn_submit'])) {
        if (empty($error)) {
            if ($conn->query($add_member) === TRUE) {
                $_SESSION['status'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Hey!</strong> Thêm thành công người dùng $name
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
                header('location: http://localhost/JVB/Tuan%202%20Php/function/index.php');
            } else {
                echo "Error: " . $add_member . "<br>" . $conn->error;
            }
        }
    }
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h1>Add member </h1>
        <form action="" method="post">

            <div class="row mb-3">
                <label for="name" class="col-sm-3 col-form-lable">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>">
                    <?php if (isset($error['name'])) {
                        echo $error['name'];
                    } ?>
                </div>
            </div>

            <div class="row mb-3">
                <label for="main_major" class="col-sm-3 col-form-lable">Chuyên ngành</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="main_major" name="main_major" value="<?php echo $main_major ?>">
                    <?php if (isset($error['name'])) {
                        echo $error['name'];
                    } ?>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-lable" for="validationDefault04">Ngôn ngữ</label>
                <div class="col-sm-6">
                    <select class="custom-select" id="validationDefault04" name="class_id" required>
                        <?php foreach ($result as $item) {
                        ?>
                            <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                        <?php
                        } ?>
                    </select>
                </div>



            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" name="btn-submit" value="1" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="http://localhost/JVB/Tuan%202%20Php/function/index.php" class="btn btn-primary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
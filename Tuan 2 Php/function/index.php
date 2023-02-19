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

$list_user  = array();





if (isset($_SESSION['status'])) {
  $status = $_SESSION['status'];
  unset($_SESSION['status']);
}

if (isset($_GET['ValuetoSearch'])) {
  $value_to_search = $_GET['ValuetoSearch'];
} else {
  $value_to_search = "";
}
if (isset($_GET['select'])) {
  $select = $_GET['select'];
} else {
  $select = "";
}

$selected = "";

// Url search phân trang
$url = "?ValuetoSearch=" . $value_to_search . "&select=" . $select . "&btn_submit=Search";


function is_selected($select, $lable)
{
  if (isset($select) && $select == $lable) {
    $selected = "selected";
  } else {
    $selected = "";
  }
  return $selected;
}

$sql = "";


if (isset($_GET['btn_submit'])) {

  if (isset($value_to_search)) {
    if ($select == "all") {
      $sql = "SELECT students.id, students.name ,students.main_major, class.name as language , students.created_at FROM `students` INNER JOIN class
    
      ON students.class_id = class.id WHERE CONCAT(students.id,students.name,students.main_major,students.class_id) LIKE '%" . $value_to_search . "%'";
    } else if ($select == "id") {
      $sql = "SELECT students.id, students.name ,students.main_major, class.name as language , students.created_at FROM `students` INNER JOIN class
    
      ON students.class_id = class.id WHERE students.id LIKE '%" . $value_to_search . "%'";
    } else if ($select == "name") {
      $sql = "SELECT students.id , students.name ,students.main_major, class.name as language , students.created_at FROM `students` INNER JOIN class
    
      ON students.class_id = class.id WHERE students.name LIKE '%" . $value_to_search . "%'";
      // echo $sql;
    } else if ($select == "main_major") {
      $sql = "SELECT students.id, students.name ,students.main_major, class.name as language , students.created_at FROM `students` INNER JOIN class
    
      ON students.class_id = class.id WHERE students.main_major LIKE '%" . $value_to_search . "%'";
    } else if ($select == "class_id") {
      $sql = "SELECT students.id, students.name ,students.main_major, class.name as language , students.created_at FROM `students` INNER JOIN class
      ON students.class_id = class.id WHERE students.class_id LIKE '%" . $value_to_search . "%'";
    }
  }
} else {
  $sql = "SELECT students.id, students.name ,students.main_major, class.name as language , students.created_at
  
    FROM students 
    
    INNER JOIN class
    
    ON students.class_id = class.id ";
}

// Khai báo số bản ghi trên một trang
$num_of_copy_page = 5;
$num_row = $conn->query($sql)->num_rows;
$num_page = ceil($num_row / $num_of_copy_page);
// echo $num_page;


// print_r($_GET)



if(isset($_GET['page'])){
  $current_page  =  $_GET['page'];
  $start_record  = ($current_page - 1) * $num_of_copy_page ;
  $sql = $sql."LIMIT ".$start_record.",".$num_of_copy_page ; 
  // echo $sql;
} else {
  $sql = $sql."LIMIT 0,".$num_of_copy_page ; 
}

$result = $conn->query($sql);
if (!empty($result)) {
  foreach ($result as $row) {
    $list_user[] = $row;
  }
} else {
  echo "Mang rong";
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>

<body>




  <div class="container">

    <h1>LIST STUDENTS</h1>

    <form action="" method="GET">
      <input type="text" value="<?php if (isset($value_to_search)) echo $value_to_search ?>" name="ValuetoSearch"><br><br>


      <select class="select" name="select" data-mdb-filter="true">
        <option value="all">All</option>
        <option <?php echo is_selected($select, "id") ?> value="id">Id</option>
        <option <?php echo is_selected($select, "name") ?> value="name">Name</option>
        <option <?php echo is_selected($select, "main_major") ?> value="main_major">Main Major</option>
        <option <?php echo is_selected($select, "class_id") ?> value="class_id">Class id</option>
      </select>

      <input type="submit" name='btn_submit' value="Search"><br><br>

    </form>

    <a href="http://localhost/JVB/Tuan%202%20Php/function/create.php" class="btn btn-success" style="width: 86px;
    height: 50px;text-align: left; right: 0px;"><i class="fa-solid fa-user-plus">ADD</i></a>

    <?php
    if (isset($status)) {
      echo $status;
    }
    ?>



    <table class="table caption-top">

      <thead>
        <tr>
          <th scope="col" style="width: 200px;">ID</th>
          <th scope="col" style="width: 200px;">Họ Và Tên</th>
          <th scope="col" style="width: 200px;">Chuyên ngành</th>
          <th scope="col" style="width: 200px;">Ngôn ngữ</th>
          <th scope="col" style="width: 200px;">Ngày tạo</th>
          <th scope="col" style="width: 200px;">Thao tác</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($list_user as $user) {
        ?>
          <tr>
            <td><?php echo $user['id'] ?></td>
            <td><?php echo $user['name'] ?></td>
            <td><?php echo $user['main_major'] ?></td>
            <td><?php echo $user['language'] ?></td>
            <td><?php echo $user['created_at'] ?></td>
            <td><a href="http://localhost/JVB/Tuan%202%20Php/function/update.php?id=<?php echo $user['id'] ?>" class="btn btn-primary"><i class="fa-solid fa-pen-clip"> Sửa</i></a>
              <a href="http://localhost/JVB/Tuan%202%20Php/function/delete.php?id=<?php echo $user['id'] ?>" class="btn btn-secondary"><i class="fa-solid fa-trash-can"></i> Xóa</a>
            </td>
          </tr>
        <?php
        } ?>
      </tbody>
    </table>
    <?php
    if (!empty($num_row)) {
    ?>
      <nav aria-label="...">
        <ul class="pagination">
          <li class="page-item disabled">
            <span class="page-link">Previous</span>
          </li>
          <?php
          for ($i = 1; $i <= $num_page; $i++) {
          ?>
            <li class="page-item"><a class="page-link" href="<?php echo $url . "&page=" . $i . "" ?>"> <?php echo $i ?> </a></li>
          <?php
          }
          ?>

          <li class="page-item">
            <a class="page-link" href="">Next</a>
          </li>
        </ul>
      </nav>
    <?php
    }
    ?>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
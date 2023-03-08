<?php

// Khởi tạo session
session_start();

$servername = "localhost";
$username = "GVDUYET";
$password = "GVDUYET";

$list_user  = array();

// Create connection
$conn = new mysqli($servername, $username, $password, "php_master");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

// Lấy dữ liệu của bảng class đổ xuống form add

$sql = "SELECT * FROM `class`";
$list_class = $conn->query($sql);


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

$sql = "SELECT students.id, students.name ,students.main_major, class.name as language , students.created_at
  
    FROM students 
    
    INNER JOIN class
    
    ON students.class_id = class.id ";


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
}

// Khai báo số bản ghi trên một trang
$num_of_copy_page = 10;
$num_row = $conn->query($sql)->num_rows;
$num_page = ceil($num_row / $num_of_copy_page);
// echo $num_page;





if (isset($_GET['page'])) {
    $current_page  =  $_GET['page'];
    $start_record  = ($current_page - 1) * $num_of_copy_page;
    $sql = $sql . "LIMIT " . $start_record . "," . $num_of_copy_page;
    // echo $sql;
} else {
    $sql = $sql . "LIMIT 0," . $num_of_copy_page;
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
    <link rel="shortcut icon" href="#">


</head>

<body>

    <!-- Modal add user -->


    <div class="modal fade" id="userAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="saveStudent">
                    <div class="modal-body">

                        <div id="errorMessage" class="alert alert-warning d-none"></div>

                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Main_major</label>
                            <input type="text" name="main_major" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="col-sm-3 col-form-lable" for="validationDefault04">Ngôn ngữ</label>
                            <div class="col-sm-6">
                                <select class="custom-select" id="validationDefault04" name="class_id" required>
                                    <?php foreach ($list_class as $item) {
                                    ?>
                                        <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                    <?php
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- End modal User -->


    <!-- Edit Student Modal -->
    <div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateUser">
                    <div class="modal-body">

                        <div id="errorMessage" class="alert alert-warning d-none"></div>
                        <input type="hidden" name="id" id="id" class="form-control" />

                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" id="view_name" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Main_major</label>
                            <input type="text" name="main_major" id="view_main_major" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="col-sm-3 col-form-lable" for="view_class_id">Ngôn ngữ</label>
                            <div class="col-sm-6">
                                <select class="custom-select" id="view_class_id" name="class_id" required>
                                    <?php foreach ($list_class as $item) {
                                    ?>
                                        <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                    <?php
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- End modal Update user -->


    <div class="container">

        <a href="http://localhost/JVB/Tuan%202%20Php/function">
            <h1>LIST STUDENTS</h1>
        </a>

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

        <!-- End Modal add user  -->

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userAddModal">
            Add User
        </button>

        <?php
        if (isset($status)) {
            echo $status;
        }
        ?>
        <div id="status"> </div>



        <table id="myTable" class="table caption-top">
            <thead>
                <tr>
                    <th scope="col" style="width: 200px;"><label class="list-group-item">
                            <input class="form-check-input me-1" id="checkboxAll" type="checkbox">
                            All
                        </label></th>
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
                    <tr id="<?php echo $user['id'] ?>">
                        <td><label class="list-group-item">
                                <input class="form-check-input me-1" id="chkboxname" value="<?php echo $user['id'] ?>" type="checkbox">
                            </label></td>
                        <td><?php echo $user['id'] ?></td>
                        <td><?php echo $user['name'] ?></td>
                        <td><?php echo $user['main_major'] ?></td>
                        <td><?php echo $user['language'] ?></td>
                        <td><?php echo $user['created_at'] ?></td>
                        <td class="d-flex">

                            <!-- Update user -->

                            <button type="button" class="btn btn-primary" value="<?php echo $user['id'] ?>" name="btn_update" id="btn_update" data-bs-toggle="modal" data-bs-target="#studentEditModal" style="margin-right: 7px;"><i class="fa-solid fa-pen-clip"></i> Sửa</button>

                            <button type="button" class="btn btn-danger" name="btn_delete" id="btn_delete"><i class="fa-solid fa-trash-can"></i> Xóa</button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        // Add user
        $(document).on('submit', '#saveStudent', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_student", true);

            $.ajax({
                type: "POST",
                url: "add.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    } else if (res.status == 200) {

                        $('#errorMessage').addClass('d-none');
                        $('#userAddModal').modal('hide');
                        $('#saveStudent')[0].reset();



                    } else if (res.status == 500) {
                        alert(res.message);
                    }
                    $('#myTable').load(location.href + " #myTable");
                    // console.log(res)
                }
            });

        });

        // UPdate user

        $(document).on('click', '#btn_update', function(e) {

            var user_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "update.php?user_id=" + user_id,
                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 404) {
                        alert(res.message);
                    } else if (res.status == 200) {

                        $('#view_name').val(res.data.name);
                        $('#view_main_major').val(res.data.main_major);
                        $('#view_class_id').val(res.data.class_id);
                        $('#id').val(res.data.id);
                        $('#studentViewModal').modal('show');

                    }
                }
            });
        });


        $(document).on('submit', '#updateUser', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append("save_update_student", true);

            $.ajax({
                type: "POST",
                url: "save_date_user.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    } else if (res.status == 200) {

                        $('#errorMessage').addClass('d-none');
                        $('#studentEditModal').modal('hide');
                        $('#updateUser')[0].reset();

                    } else if (res.status == 500) {
                        alert(res.message);
                    }
                    $('#myTable').load(location.href + " #myTable");
                    console.log(res)



                }


            });

        })

        // Delete User


        $(document).on('click', '#checkboxAll', function(e) {
            // alert("Chọn tất cả");
            $('input[type="checkbox"]').prop('checked', this.checked);

        })

        $(document).on('click', '#btn_delete', function(e) {
            if (confirm("Bạn có muốn thực hiện thao tác xóa với nó không ?")) {
                var id = [];
                $("#chkboxname:checked").each(function() {
                    id.push($(this).val());
                });

                console.log(id)
                if (id.length == 0) {
                    alert("Bạn chưa chọn bản ghi nào :))")
                } else {
                    // alert("Bạn có chọn bạn ghi nào")
                    $.ajax({
                        type: 'post',
                        url: 'delete.php',
                        data: {id:id},
                        dataType:"text",
                        success: function(response) {
                            var res = jQuery.parseJSON(response);
                            console.log(response);
                        },

                        error: function(xhr, ajaxOptions, thrownError) {
                            console.log(xhr.status);
                            console.log(thrownError);
                        }
                    });

                }

                $('#myTable').load(location.href + " #myTable");
            };



        })
    </script>

</body>



</html>
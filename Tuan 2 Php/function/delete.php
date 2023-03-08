<?php 
$servername = "localhost";
$username = "GVDUYET";
$password = "GVDUYET";

// Check connection
$conn = mysqli_connect($servername, $username, $password, "php_master");

$list_user = $_POST['id'];

if(!empty($list_user)){  

    foreach($list_user as $user){
        $query = "DELETE FROM `students` WHERE `students`.`id` = $user" ;
        if(mysqli_query($conn,$query)){
            echo json_encode("Xóa Thành công");
        } else {
            echo json_encode("Không Thành công");
        }
    }
} else {
    echo json_encode("không thể xóa ");
    
}

?>
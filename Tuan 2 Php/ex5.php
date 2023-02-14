<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h2>5. Cho 1 mảng [1,3,2,7,5,10,25, 4], viết chương trình PHP để đảo ngược thứ tự của các phần tử trong một mảng.
        Sau đó in thêm 1 output nữa là sắp xếp lại mảng theo thứ tự tăng hoặc giảm dần</h2>


    <?php
    
    $arr = [1,3,2,7,5,10,25, 4]; 

    $new_arr = array_reverse($arr);

    function is_Sort($arr){
        sort($arr);
        return $arr;
    }

    function is_rSort($arr){
        rsort($arr);
        return $arr;
    }
    
    print_r(is_Sort($new_arr));
    echo"<br>";
    print_r(is_rSort($new_arr));



    ?>



</body>

</html>
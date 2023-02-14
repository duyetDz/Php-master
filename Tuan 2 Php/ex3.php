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
    <h2>3. Cho 1 chuỗi "Xin Chao JVB Viet Nam" Viết chương trình PHP để in ra chuỗi nghịch đảo của một chuỗi đã cho.
        Ví dụ output : Nam Viet JVB Chao Xin"</h2>




    <?php

    $str = "Xin Chao JVB Viet Nam";

    $arr = explode(" ", $str );

    // print_r($arr);

    $length = count($arr)-1;
   
    while($length >=0){
        echo $arr[$length];
        echo " ";
        $length--;
    }
    

    ?>



</body>

</html>
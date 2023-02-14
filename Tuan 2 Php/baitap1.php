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
    <h2>1. Cho 1 chuỗi sau "1-th-3-4-zxxcvb-7-#$%".
        - Tìm ra các số trong chuỗi và tính tổng của chúng (gợi ý hàm explode của php)</h2>
    <?php
    $str = "1-th-3-4-zxxcvb-7-#$%";
    $array = explode('-',$str);
   $sum = 0;

   print_r($array);

    
   
    for ($i=0; $i < count($array); $i++) { 
        if( is_numeric($array[$i])){
            $sum += (int)$array[$i];
        }
    }
    echo '<pre>';
    echo "Tổng các số là : ";
    echo $sum;


    ?>



</body>

</html>
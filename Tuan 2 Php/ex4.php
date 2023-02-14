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
    <h2>4. Cho 1 mảng [1,3,2,7,5,10,25, 4,6], viết chương trình PHP để tìm và in ra phần tử lớn nhất trong một mảng.</h2>


    <?php
        function is_Max($arr){
            $max = 0;
            for ($i=0; $i < count($arr);$i++){ 
                if($max < $arr[$i]){
                    $max = $arr[$i];
                }
            }
            return $max;
        }


        $array = [1,3,2,7,5,10,25, 4,6];
        echo "Số lớn nhất là : ";
        echo is_Max($array);
    ?>



</body>

</html>
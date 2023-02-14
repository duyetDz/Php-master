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
    <h2>2. Cho 1 chuỗi sau "1 5-th-3-6 4-zxx vb-10 7-#$%".
        - Tìm ra các số trong chuỗi , gán vào mảng và sắp xếp theo thứ tự giảm dần (gợi ý hàm explode của php)</h2>


    <?php
    $array =  "1 5-th-3-6 4-zxx vb-10 7-#$%";
    $array  = explode(' ',$array);
    // $new_Array = [];

    for ($i=0; $i < count($array); $i++) { 
        $array[$i]  = explode('-', $array[$i]);
        
    }

    // print_r($array);



    for($i=0; $i < count($array); $i++){
        for($j=0; $j <count($array[$i]) ; $j++){
            if(is_numeric($array[$i][$j])){
                $new_Array[] = $array[$i][$j];
            }
        }
    }

    // echo '<pre>';
    // print_r($array);
   
    function is_Sort($arr){
        sort($arr);
        return $arr;
    }

    echo '<pre>';
    print_r($new_Array);

    echo '<pre>';
    print_r(is_Sort($new_Array));

    ?>



</body>

</html>
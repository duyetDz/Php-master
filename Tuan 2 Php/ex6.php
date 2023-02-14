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
    <h2>6. Cho 1 mảng [1,3,2,7,5,10,25, 4], viết chương trình PHP để tính tổng của các phần tử trong một mảng. Và cho biết tổng đó có phải là số nguyên tố hay không</h2>


    <?php

    $arr = [1,3,2,7,5,10,25, 4];
    function is_prime($n)
    {
        for ($i = 2; $i <= sqrt($n); $i++) {
            if ($n % $i == 0){
                return false;
            }
        }
        return true;
    }

    function sum($arr){
        $sum = 0;
        foreach ($arr as $a){
            $sum += $a;
        }
        return $sum;
    }


    if(is_prime(sum($arr))){
        echo "Tổng của các số đã cho là số nguyên tố";
    } else {
        echo "Tổng của các số đã cho không là số nguyên tố";
    }

    


    ?>



</body>

</html>
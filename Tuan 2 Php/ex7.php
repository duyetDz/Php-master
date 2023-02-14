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
    <h2>7. Cho 1 mảng [1,3,2,7,5,1,5, 4,1,3], viết chương trình PHP để đếm số lần xuất hiện của một phần tử trong một mảng. (Bài tập này các em sẽ kiểm tra xem trong mảng có bao nhiêu phần tử không giống nhau và số lần lặp của phần tử đó là bao nhiêu. Ví dụ output sẽ là:
        Có 6 phần tử độc lập 1 ,3 ,2 ,7 ,5 4
        số 1 lặp 3
        số 3 lặp 2
        .....
        )</h2>


    <?php

    $array = [1,3,2,7,5,1,5, 4,1,3];

    echo '<pre>';
    print_r(array_count_values($array));


    ?>



</body>

</html>
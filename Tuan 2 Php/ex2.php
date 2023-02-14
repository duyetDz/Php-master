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
    <h2>2. Viết chương trình PHP để in ra chuỗi các số chẵn từ 1 đến 100 ngăn cách bởi dấu phẩy. Output : 2,4,6,8,10,...,100.</h2>


    <?php
    function is_Even($a)
    {
        return $a % 2 == 0;
    }

    for ($i=0; $i <= 100 ; $i++) { 
        if(is_Even($i)){
            echo "$i ," ;
            
        }
    }


    ?>



</body>

</html>
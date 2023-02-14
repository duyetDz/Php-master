<?php include './function/main.php'; ?>

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
    <h2>1. Đầu vào là 2 số a và b viết chương trình PHP để tính tổng của 2 số.</h2>
    <form method="post">
        <input type="text" name="numb1" placeholder="Enter numb1">
        <input type="text" name="num2" placeholder="Enter num2">
        <input type="submit" name="submit-btn" value="submit">
    </form>
    <div>a = <?php echo $numb1 ?></div>
    <div>b =  <?php echo $numb1 ?></div>
    <div> Kết quả a + b =  <?php echo $sum  ?></div>




</body>

</html>
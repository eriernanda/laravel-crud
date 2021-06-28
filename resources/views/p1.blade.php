<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project 1</title>
</head>
<body>
    <?php 
    for ($i=1; $i <= 100 ; $i++) { 
        if($i % 3 == 0 && $i % 5 == 0){
            $var = "Karirpad";
            echo $var, "<br>";
            continue;
        } elseif ($i % 3 == 0) {
            $var = "Karir";
            echo $var, "<br>";
            continue;
        } elseif ($i % 5 == 0) {
            $var = "Pad";
            echo $var, "<br>";
            continue;
        }
        echo $i, "<br>";
    }
    ?>
</body>
</html>

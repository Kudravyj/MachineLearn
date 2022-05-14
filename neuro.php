<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
$nums = array(
    array(1,1,1,1,0,1,1,0,1,1,0,1,1,1,1),
    array(0,0,1,0,0,1,0,0,1,0,0,1,0,0,1),
    array(1,1,1,0,0,1,1,1,1,1,0,0,1,1,1),
    array(1,1,1,0,0,1,1,1,1,0,0,1,1,1,1),
    array(1,0,1,1,0,1,1,1,1,0,0,1,0,0,1),
    array(1,1,1,1,0,0,1,1,1,0,0,1,1,1,1),
    array(1,1,1,1,0,0,1,1,1,1,0,1,1,1,1),
    array(1,1,1,0,0,1,0,0,1,0,0,1,0,0,1),
    array(1,1,1,1,0,1,1,1,1,1,0,1,1,1,1),
    array(1,1,1,1,0,1,1,1,1,0,0,1,1,1,1)
);
$num5 = array(
    array(1,1,1,1,0,0,1,1,1,0,0,0,1,1,1),
    array(1,1,1,1,0,0,0,1,0,0,0,1,1,1,1),
    array(1,1,1,1,0,0,0,1,1,0,0,1,1,1,1),
    array(1,1,0,1,0,0,1,1,1,0,0,1,1,1,1),
    array(1,1,0,1,0,0,1,1,1,0,0,1,0,1,1),
    array(1,1,1,1,0,0,1,0,1,0,0,1,1,1,1)
);

$weights = [];
for($i = 0; $i <= 15; $i++){
    $weights[] = 0;
}
$bias = 7;

function proceed($number)
{
    global $weights;
    global $bias;
    $net = 0;
    for($t = 0; $t <= 15; $t++){
        var_dump($number[$t]);
        var_dump($weights[$t]);
        $net += round($number[$t])* $weights[$t];
    }
    return $net >= $bias;
}
function decrease($number){
    for($s=0; $s <= 15; $s++){
        if (round($number[$s]) == 1){
            $weights[$s] += 1;
        }
    }
}
function increase($number){
    for($s=0; $s <= 15; $s++){
        if (round($number[$s]) == 1){
            $weights[$s] += 1;
        }
    }
}

# Тренировка сети
$count = 1000;

for($r=0; $r<= $count; $r++){
    $option = rand(0, 9);
    if($option != 5){
        if(proceed($nums[$option])){
            decrease($nums[$option]);
        }
    }
}
    # Если сеть выдала True/Да/1, то наказываем ее
    if(proceed($nums[$option])){
        decrease($nums[$option]);
    }
    # Если получилось число 5
    else{
        echo($weights);
    }
    # Если сеть выдала False/Нет/0, то показываем, что эта цифра - то, что нам нужно
    if(!proceed($num5)){
       increase($num5);
    }
    echo("0 это 5? ". proceed($num[0]));
    echo("1 это 5? ". proceed($num[1]));
    echo("2 это 5? ". proceed($num[2]));
    echo("3 это 5? ". proceed($num[3]));
    echo("4 это 5? ". proceed($num[4]));
    echo("6 это 5? ". proceed($num[6]));
    echo("7 это 5? ". proceed($num[7]));
    echo("8 это 5? ". proceed($num[8]));
    echo("9 это 5? ". proceed($num[9]). '\n');

    # Прогон по тестовой выборке
    echo("Узнал 5? ". proceed($num5));
    echo("Узнал 5 - 1? ". proceed($num5[1]));
    echo("Узнал 5 - 2? ". proceed($num5[2]));
    echo("Узнал 5 - 3? ". proceed($num5[3]));
    echo("Узнал 5 - 4? ". proceed($num5[4]));
    echo("Узнал 5 - 5? ". proceed($num5[5]));
    echo("Узнал 5 - 6? ". proceed($num5[6]));
?>
</body>
</html>

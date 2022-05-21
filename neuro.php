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
for($i = 0; $i <= 14; $i++){
    $weights[] = 0;
}
$bias = 6;

function proceed($number)
{
    global $weights;
    global $bias;
    $net = 0;
    for($t = 0; $t <= 14; $t++){
        $net += ((int)$number[$t] * ((int)$weights[$t]));
    }
    if($net >= $bias){
        return 1;
    }
    else
        return 0;
}
function decrease($number){
    global $weights;
    global $bias;
    for($s=0; $s <= 14; $s++){
        if (round($number[$s]) == 1){
            (int)$weights[$s] -= 1;
        }
    }
}
function increase($number){
    global $weights;
    global $bias;
    for($s=0; $s <= 14; $s++){
        if (round($number[$s]) == 1){
            (int)$weights[$s] += 1;
        }
    }
}

# Тренировка сети
$count = 10000;

for($r=0; $r<= $count; $r++){
    $option = rand(0, 9);
    if($option != 5){
        if(proceed($nums[$option])){
            decrease($nums[$option]);
        }
    }
    # Если получилось число 5
    else{
        if(!proceed($nums[5])){
           increase($nums[5]);
        }
    }
    # Если сеть выдала False/Нет/0, то показываем, что эта цифра - то, что нам нужно
}
    for($x=0; $x < count($weights); $x++){
        echo "$x :" . "$weights[$x] \r\n";
    }
    echo("0 это 5? ". proceed($nums[0]). "\r\n");
    echo("1 это 5? ". proceed($nums[1]). "\r\n");
    echo("2 это 5? ". proceed($nums[2]). "\r\n");
    echo("3 это 5? ". proceed($nums[3]). "\r\n");
    echo("4 это 5? ". proceed($nums[4]). "\r\n");
    echo("6 это 5? ". proceed($nums[6]). "\r\n");
    echo("7 это 5? ". proceed($nums[7]). "\r\n");
    echo("8 это 5? ". proceed($nums[8]). "\r\n");
    echo("9 это 5? ". proceed($nums[9]). "\r\n");

    # Прогон по тестовой выборке
    echo("Узнал 5? ". proceed($num5[0]). "\r\n");
    echo("Узнал 5 - 1? ". proceed($num5[1]). "\r\n");
    echo("Узнал 5 - 2? ". proceed($num5[2]). "\r\n");
    echo("Узнал 5 - 3? ". proceed($num5[3]). "\r\n");
    echo("Узнал 5 - 4? ". proceed($num5[4]). "\r\n");
    echo("Узнал 5 - 5? ". proceed($num5[5]). "\r\n");
?>

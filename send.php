<?php

include 'array0.php';
include 'array1.php';

$firstCount = 400;
$secondCount = 620;
$thirdCount = 2;
$firstWeightCount = $firstCount * $secondCount;
$secondWeightCount = $secondCount * $thirdCount;
$bias = 1;
$weight1 = array();
$weight2 = array();
$test0 = array(
    $number0,
    $number1
);
$secondNeural = array();

for($i = 0; $i <= $secondCount; $i++){
    $weight1 += array();
    for($x=0; $x <= $firstCount; $x++){
        $sam = rand(-9, 9)/10;
        $weight1[$i][$x] = $sam;
    }
}


for($i = 0; $i < $thirdCount; $i++){
    $weight2 += array();
    for($x=0; $x <= $secondCount; $x++){
        $sam = rand(-9, 9)/10;
        $weight2[$i][$x] = $sam;
    }
}


function wheightSum1($numberNeurons2, $numberIndex, $testIndex){
    global $firstCount;
    global $weight1;
    global $test0;
    $sum = 0;
    for($i=0; $i < $firstCount; $i++){
        $sum += $test0[$numberIndex][$testIndex][$i] * $weight1[$numberNeurons2][$i];
    }
    if($sum >= 1) return true;
    else return false;
}


function wheightSum2($numberNeurons3){
    global $secondCount, $secondNeural, $weight2;
    $sum = 0;
    for($i=0; $i < $secondCount; $i++){
        $sum += $secondNeural[$i] * $weight2[$numberNeurons3][$i];
    }
    if($sum > 1) return true;
    else return false;
}

function training(){
    global $secondCount, $thirdCount, $secondNeural;
    $sam = rand(0,1);
        $rand = rand(0,49);
        for($i=0; $i<$secondCount; $i++){
            if(wheightSum1($i, $sam, $rand)){
                 $secondNeural[$i] = 1;
            }
            else $secondNeural[$i] = 0;
        }
        for($x=0; $x<$thirdCount; $x++){
            if(wheightSum2($x)) echo "1";
            else echo "0";
        }
}
training();

?>
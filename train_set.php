<?php

$filename = 'array1.txt';
$text = 'array('."$api".'),'."\r\n";

$file = new SplFileObject('array1.txt');

$fp = fopen($filename, 'r');
$result = fgets($fp);
echo $result;
fwrite($fp, $text);
fclose($fp);
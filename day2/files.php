<?php

//importing from a file
if (file_exists("data.csv"))
    $imported_content = file("data.csv");
//var_dump($imported_content);


//محاولة فاشلة

// $words = array();

// foreach ($imported_content as $line)
// {
//     $words[] = explode(",", $line);
// }

// var_dump($words);
// echo "no of words in this file is: " . count($words);


/// <----- Create a new file and fill it from _GET[] ------>
if (file_exists("data.csv"))
    $fp = fopen("log.txt", "a+");
$line = isset($_GET["log"]) ? $_GET["log"] : "No parameters sent" . PHP_EOL;
fwrite($fp, $line);
fclose($fp);


if (file_exists("data.csv"))
    $imported_content2 = file_get_contents("data.csv");


var_dump($imported_content2);
///string(54) "name,age,score Ali,23,90 Mohamed,29,98 Omar,25,97 "

$imported_content3 = file_get_contents("https://www.google.com/");
var_dump($imported_content3);

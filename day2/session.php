<?php

session_start();

//To check if this page is visited for the first time
//We check the _SESSION array for a predefined variable
$counter = 0;

if (!isset($_SESSION["is_visited"]))
{
    echo "First Visit, Hiii";
    $_SESSION["is_visited"] = true;
    $counter++;
}
else
{
    $_SESSION["counter"] = isset($_SESSION["counter"]) ? $_SESSION["counter"] + 1 : 1;
    echo "You visited the page before " . $_SESSION["counter"] . " times.";
}

<?php

//importing from a file
if (file_exists("log.txt"))
    $imported_content = file("log.txt");

echo "<div class='log' style='border-style: double; padding: 5px;' > <br/>";

foreach ($imported_content as $line)
{
    $line = explode(",", $line);
    echo "You visited this page " . $line[4] . " times<br/>";
    echo "Visit Date: " . $line[0] . "<br/>";
    echo "IP Address: " . $line[1] . "<br/>";
    echo "Email: " . $line[2] . "<br/>";
    echo "Name: " . $line[3] . "<br/>";
    echo "<hr><br/>";
}

echo "</div>";

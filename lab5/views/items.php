<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "<table border='1'>";
$record_index = 0;
foreach ($all_records as $item)
{
    if ($record_index === 0)
    {
        echo "<tr>";
        foreach ($item as $key => $value)
        {
            echo "<td> $key </td>";
        }

        echo "</tr>";
    }
    echo "<tr>";
    foreach ($item as $value)
    {
        echo "<td>$value </td>";
    }
    echo "</tr>";

    $record_index++;
}
echo "</table>";

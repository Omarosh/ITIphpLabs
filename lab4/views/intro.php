<?php

// var_dump($searched_glasses);
//object(stdClass)#23 (12) { ["id"]=> int(88) ["PRODUCT_code"]=> string(9) "NWTCFV-88" 
//["product_name"]=> string(10) "ClubMaster" ["Photo"]=> string(6) "02.png" 
//["list_price"]=> string(5) "12.50" ["reorder_level"]=> int(5)
// ["Units_In_Stock"]=> int(15) ["category"]=> string(10) "sunglasses" 
//["CouNtry"]=> string(5) "Italy" ["Rating"]=> string(4) "5.00" ["discontinued"]=> int(0) 
//["date"]=> string(19) "2018-09-28 22:51:28" } >
if ($slock)
{


    echo "<table border='1'>>";
    echo "<tr>";
    echo "<td> Name </td>";
    echo "<td> Price </td>";
    echo "<td> Country </td>";

    echo "</tr>";
    echo "<tr>";
    echo "<td>" . $searched_glasses->product_name . "</td>";
    echo "<td>" . $searched_glasses->list_price . "</td>";
    echo "<td>" . $searched_glasses->CouNtry . "</td>";
    echo "</tr>";
    echo "</table>";
}
else
{
    echo "Invalid ID, Not found";
}


// if ($snlock)
// {


//     echo "<table border='1'>>";
//     echo "<tr>";
//     echo "<td> Name </td>";
//     echo "<td> Price </td>";
//     echo "<td> Country </td>";

//     echo "</tr>";
//     echo "<tr>";
//     echo "<td>" . $searched_name->product_name . "</td>";
//     echo "<td>" . $searched_name->list_price . "</td>";
//     echo "<td>" . $searched_name->CouNtry . "</td>";
//     echo "</tr>";
//     echo "</table>";
// }
// else
// {
//     echo "Invalid ID, Not found";
// }

// echo "<h5> made in USA $usa_glasses_count glasses </h5>" ;
// foreach ($usa_glasses as $glass) {
//     echo "<br/>=====================<br/>";
//     foreach ($glass as $key => $value) {
//         echo "<h5>" . $key . ":" . $value . "</h5>";
//     }
// }

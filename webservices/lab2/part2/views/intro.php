<?php

// var_dump($searched_glasses);
//object(stdClass)#23 (12) { ["id"]=> int(88) ["PRODUCT_code"]=> string(9) "NWTCFV-88" 
//["product_name"]=> string(10) "ClubMaster" ["Photo"]=> string(6) "02.png" 
//["list_price"]=> string(5) "12.50" ["reorder_level"]=> int(5)
// ["Units_In_Stock"]=> int(15) ["category"]=> string(10) "sunglasses" 
//["CouNtry"]=> string(5) "Italy" ["Rating"]=> string(4) "5.00" ["discontinued"]=> int(0) 
//["date"]=> string(19) "2018-09-28 22:51:28" } >

if ($slock == true)
{



    echo "<table border='1'>>";
    echo "<tr>";
    echo "<td> id </td>";
    echo "<td> Name </td>";
    echo "<td> Price </td>";
    echo "<td> Country </td>";
    echo "<td> Units_In_Stock </td>";
    echo "<td> Rating </td>";
    echo "<td> date </td>";
    echo "<td> Photo </td>";

    echo "</tr>";
    echo "<tr>";
    echo "<td>" . $searched_glasses->id . "</td>";
    echo "<td>" . $searched_glasses->product_name . "</td>";
    echo "<td>" . $searched_glasses->list_price . "</td>";
    echo "<td>" . $searched_glasses->CouNtry . "</td>";
    echo "<td>" . $searched_glasses->Units_In_Stock . "</td>";
    echo "<td>" . $searched_glasses->Rating . "</td>";
    echo "<td>" . $searched_glasses->date . "</td>";
    echo "<td>" .  "<img alt='hi' style='width: 50px;' src='http://localhost/php/omo/lab4/images/$searched_glasses->Photo' />" .  "</td>";


    echo "</table>";
}
else
{
    //  echo "<br>Invalid ID, Not found<br>";
}


if ($snlock == true)
{


    echo "<table border='1'>>";
    echo "<tr>";
    echo "<td> id </td>";
    echo "<td> Name </td>";
    echo "<td> Price </td>";
    echo "<td> Country </td>";
    echo "<td> Units_In_Stock </td>";
    echo "<td> Rating </td>";
    echo "<td> date </td>";
    echo "<td> Photo </td>";

    echo "</tr>";
    foreach ($searched_name as $elem)
    {
        echo "<tr>";
        echo "<td>" . $elem->id . "</td>";
        echo "<td>" . $elem->product_name . "</td>";
        echo "<td>" . $elem->list_price . "</td>";
        echo "<td>" . $elem->CouNtry . "</td>";
        echo "<td>" . $elem->Units_In_Stock . "</td>";
        echo "<td>" . $elem->Rating . "</td>";
        echo "<td>" . $elem->date . "</td>";
        echo "<td>" .  "<img alt='hi' style='width: 50px;' src='http://localhost/php/omo/lab4/images/$elem->Photo' />" .  "</td>";

        echo "</tr>";
    }


    echo "</table>";
}
else
{
    //  echo " Invalid name, Not found";
}

// echo "<h5> made in USA $usa_glasses_count glasses </h5>";
// foreach ($usa_glasses as $glass) {
//     echo "<br/>=====================<br/>";
//     foreach ($glass as $key => $value) {
//         echo "<h5>" . $key . ":" . $value . "</h5>";
//     }
// }



<?php


$fruits = array("apple", "bannana", "orange");
$fruits[] = "strawberry";

echo "Fruit: " . $fruits[3] . "<br/>";

$student = array("name" => "Ali", "age" => 12, "school" => "EBS");

echo "name: " . $student["name"] . "<br/>";
echo "age: " . $student["age"] . "<br/>";

foreach ($student as $key => $value)
{
    echo "<br/>" . $key . " - " . $value;
}

echo "<br/>";

foreach ($fruits as $key => $value)
{
    echo "<br/>" . $key . " - " . $value;
}

// Use unset() to remove a variable from memory.
// Use var_dump() to debug a variable and display its structure.

$string = "Hello my name is ahmed";
$words = explode(" ", $string);

echo "<br/><br/>number of words is: " . count($words) . "<br/>";

echo "The words after exploading are: ";
foreach ($words as $key => $value)
{
    echo " (" . $value . ") ";
}

$string2 = implode(" ", $words);

echo "<br/><br/>The string after imploding is: " . $string2;

echo "<br/><br/> Testing userInput:  <br/>";

/// visit this url to pass data to the _GET array: http://localhost/php/day2/array.php?str=Emad%20Ahmad

$string3 = isset($_GET["str"]) ? $_GET["str"] : " ";
echo "<br/><br/>The string from GET: " . $string3;


$modified_student = array_map("strtolower", $student);
echo "<br/>";
var_dump($modified_student);

// array functions always start with array_
// array_map is used by passing the name of a predefined function to be applied on each element
//ex: we passed the name of the function strtolower.

//Defining 2D array

$students = array(
    array("name" => "Ali", "age" => 12, "school" => "EBS"),
    array("name" => "Omar", "age" => 23, "school" => "MIDDLE EAST"),
    array("name" => "Mohamed", "age" => 45, "school" => "Masr"),
    array("name" => "Yahya", "age" => 33, "school" => "AUC"),
    array("name" => "Medhat", "age" => 62, "school" => "Madraset El7ayah")
);

//Printing 2D array

echo "<br/>";
$id = 0;
foreach ($students as $student)
{
    $id++;
    echo "<br/> Student " . $id . ": ";
    foreach ($student as $key => $value)
    {
        echo  " (" . $key . ": " . $value . ") ";
    }
}

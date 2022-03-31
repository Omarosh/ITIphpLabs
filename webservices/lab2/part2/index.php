<?php

//open session and loading the composer
session_start();
require_once("vendor/autoload.php");

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();
$capsule->addConnection([
  "driver" => _driver_,
  "host" => _host_,
  "database" => _database_,
  "username" => _username_,
  "password" => _password_
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$index = (isset($_GET["index"]) && is_numeric($_GET["index"]) && $_GET["index"] > 0) ? (int) $_GET["index"] : 0;
$all_records = Capsule::table("items")->skip($index)->take(_Pager_size_)->get();
$next_index = $index + _Pager_size_;
$next_link = "index.php?index=$next_index";
$previous_index = (($index - _Pager_size_) >= 0) ? $index - _Pager_size_ : 0;
$previous_link = "index.php?index=$previous_index";

//return response view
require_once("views/table.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h2>Search by id: (Hint: use numbers from 88 to 94)</h2>
  <form action="index.php">
    <label for="sid"> Enter id: </label>
    <input type="search" name="sid" id="sid">
    <input type="submit">
  </form>
  <h2> h2>Search by Name:</h2>
  <form action="index.php">
    <label for="sid"> Enter name: </label>
    <input type="search" name="name" id="sid">
    <input type="submit">
  </form>
  <hr>
</body>


</html>


<?php
/// ============== SEARCH BY ID =================

$sid = 88;
$slock = false;
$snlock = false;
if (isset($_GET["sid"]) && is_numeric($_GET["sid"]))
{
  $sid = $_GET["sid"];
  $searched_glasses = Capsule::table('items')->find($sid);

  if (isset($searched_glasses))
  {
    $slock = true;
    // var_dump($slock);
    require_once("views/intro.php");
  }
  else
  {
    $slock = false;
  }
}


// ============== SEARCH BY NAME =================

if (isset($_GET["name"]))
{
  // echo $_GET["name"] . 11111111111111111;
  $sname = $_GET["name"];
  $searched_name = Capsule::table('items')->select('*')->Where('product_name', 'LIKE', "%$sname%")->get();
  // echo "<pre>";
  // print_r($searched_name);
  // echo "<pre>";

  if (isset($searched_name))
  {
    $snlock = true;
    require_once("views/intro.php");
  }
  else
  {
    $snlock = false;
  }
}

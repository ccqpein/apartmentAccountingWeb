<?php
$session_life_time = 60 * 60;
session_set_cookie_params($session_life_time, '/');
session_start();

if (empty($_SESSION["temp"])) {
    $_SESSION["temp"] = array();
    $temp = filter_input(INPUT_POST,"this",
                         FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
}else{
    $tempArray = $_SESSION["temp"];
}

if (!isset($temp)) {
    $temp = array("name" => "", "price" => null);
}

if (!isset($_POST["action"])) {
    $action = '';
    include "./home.php";
}else{
    $action = $_POST["action"];
}

require("./model/database.php");

switch($action){
case "add":
    $temp = filter_input(INPUT_POST,"this",
                         FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
    $tempArray[] = $temp;
    $_SESSION["temp"] = $tempArray;
    include "./home.php";
    break;
case "pop last":
    unset($tempArray[count($tempArray) - 1]);
    $_SESSION["temp"] = $tempArray;
    include "./home.php";
    break;
case "query":
    include "./";
    break;
}


?>
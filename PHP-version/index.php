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

if (isset($_POST["action"])) {
    $action = $_POST["action"];
}else if (isset($_GET["action"])){
    $action = $_GET["action"];    
}else{
    $action = '';
    include "./home.php";
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
    if (!isset($tempArray) or empty($tempArray)){
        include "./home.php";
        break;
    }
    unset($tempArray[count($tempArray) - 1]);
    $_SESSION["temp"] = $tempArray;
    include "./home.php";
    break;
case "query":
    if (isset($_GET["query_count"])){
        $q_count = $_GET["query_count"];
    }

    if (isset($_GET["query_date"])){
        $q_date = $_GET["query_date"];
    }
    //echo $q_date;
    
    include "./view/query.php";
    break;
case "save":
    if (!isset($tempArray) or empty($tempArray)){
        include "./home.php";
        break;
    }
    foreach ($tempArray as $thisTemp){
        add_new_entry($thisTemp);
    }
    include "./view/succeed.php";
    $_SESSION = array();
    session_destroy();
    $tempArray = array();
    break;
}
?>
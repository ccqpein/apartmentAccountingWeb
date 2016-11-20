<?php
$session_life_time = 60 * 60;
session_set_cookie_params($lifetime, '/');
session_start();

if (empty($_SESSION["temp"])) {
    $_SESSION["temp"] = array();
    $user_data = filter_input(INPUT_POST,"user_data",
                          FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
}else{
    $user_data = $_SESSION["user_data"];
}

require("./model/database.php");




?>
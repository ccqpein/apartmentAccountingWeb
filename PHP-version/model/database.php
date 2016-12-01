<?php
$dsn = 'PHP';
$username = 'test';
$password = 'test';
$host = 'localhost';

@ $db = new mysqli($host, $username, $password, $dsn);
$CE = $db->connect_error;

if ($CE != NULL){
    echo $CE;
    echo "please check the database has be created or not, or the privilege";
    exit;
}

function add_new_entry($temp){
    global $db;
    $query = "insert into accounting
(name, price, add_time)
values
(?,?,NOW())";
    
    $statement = $db->prepare($query);
    $statement->bind_param('sd',
                           $temp["name"],
                           $temp["price"]
    );
    $success = $statement->execute();
    
    if ($success){
        return 0;
    }else{
        $error_message = $db->error;
        echo $error_message;
    }
    
    $statement->close();
}

function query_by_date($q_date = ''){
    global $db;
    $query = "select * 
from accounting
where add_time <= DATE_ADD('".$q_date." 00:00:00', INTERVAL 1 DAY) 
and add_time > '".$q_date." 00:00:00'";

    $result = $db->query($query);
    
    if ($result != false){
        return $result;
    }else{
        $error_message = $db->error;
        echo $error_message;
    }
};

function query_by_count($q_count = 5){
    global $db;
    $query = "select * 
from accounting
order by id DESC
LIMIT ".$q_count;

    $result = $db->query($query);
    
    if ($result != false){
        return $result;
    }else{
        $error_message = $db->error;
        echo $error_message;
    }
};

?>
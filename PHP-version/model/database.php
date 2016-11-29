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

function query_by_data(){
    global $db;
    $query = "select * 
from accounting";
    
    $result = $db->query($query);
    
    if ($result != false){
        return $result;
    }else{
        $error_message = $db->error;
        echo $error_message;
    }
};

function query_by_count($q_count = 10){
    global $db;
    $query = "select * 
from accounting
LIMIT ".$q_count;

    //    $statement = $db->prepare($query);
    //    $statement->bind_param('i',
                            //                           $q_count
                            //    );
    //
         //    $result = $statement->execute();    
    
    $result = $db->query($query);
    
    if ($result != false){
        return $result;
    }else{
        $error_message = $db->error;
        echo $error_message;
    }
};

?>
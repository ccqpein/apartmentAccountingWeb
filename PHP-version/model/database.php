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

function add_new_entry(){
    global $db;
    $query = "insert into accounting
(name, price, add_time)
values
(?,?,?)";
    
    $statement = $db->prepare($query);
    $statement->bind_param('sds',
                           $userdata["first_name"],
                           $userdata["last_name"],
                           $userdata["email"],
    );
    $success = $statement->execute();
    
    if ($success){
        return 0;
    }else{
        $error_message = $db->error;
        echo $error_message;
    }
    
    $statement->close();
};

function query_by_data(){};

function query_by_count(){};



?>
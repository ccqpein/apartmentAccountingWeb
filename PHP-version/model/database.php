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

function add_new_entry(){};

function query_by_data(){};

function query_by_count(){};



?>
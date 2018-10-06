<?php

function connect(){
    $connection = mysqli_connect('localhost', 'root', '', 'db_focus_ctg');

    if(!$connection){
        die('Failed to connect with DB');
    }
    
    return $connection;
}

function get_menus(){

    $connection = connect();
    $sql        = "SELECT * FROM `tbl_menus`";
    $result     = mysqli_query($connection, $sql);

    if(mysqli_num_rows($result) ){
        echo 'data exists';
    } else{
        echo 'data does not exist';
    }
    
}
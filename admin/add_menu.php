<?php

if ( isset($POST['submit']) ) {

	require_once '../database/db.php';    

    $created = add_new_menu_item($POST);

    if($created){
        header('location: index.php?success=Menu created successfully!');
    } else {
        header('location: index.php?error=Error occured while creating menu!');
    }

} else {
    header('location: index.php');
}

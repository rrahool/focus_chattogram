<?php

function connect(){
    $connection = mysqli_connect('localhost', 'root', '', 'focuscha_db_focus_ctg');

    if(!$connection){
        die('Failed to connect with DB');
    }
    
    return $connection;
}

function debug($arg){
    echo '<pre>';
    print_r($arg);
    echo '</pre>';
    exit;
}

function get_menus(){

    $connection = connect();
    $sql        = "SELECT * FROM `tbl_menus`";
    $result     = mysqli_query($connection, $sql);

    if(mysqli_num_rows($result) ){
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $menus = [];
        
       

        foreach( $rows AS $index=>$row ){
            if( $row['menu_id'] ){
                $id = $row['menu_id'];

                $menus['menu_'.$id]['submenu'][] = [
                    'id' => $row['id'],
                    'title' => $row['title'],
                    'page' => $row['page'],
                ];
            } else {
                $id = $row['id'];

                $menus['menu_'.$id] = [
                    'id' => $row['id'],
                    'title' => $row['title'],
                    'page' => $row['page'],
                ];
            }
        }

        //debug($menus);
    } 

    return $menus;
    
}

function display_menu(){
    $menus =  get_menus();

    //debug($menus);

    if(!$menus){
        return 'No menus in Database';
    }

    $html = '';
    $html .= '<ul class="menu">';
    
    foreach( $menus AS $menu ){

        if( isset($menu['submenu']) ){
            if($menu['page']){
                $html .= '<li><a href="'.$menu['page'].'">'.$menu['title'].'</a>';
            } else{
                $html .= '<li><a href="#">'.$menu['title'].'</a>';
            }

            if(is_array( $menu['submenu'] ) ){

                $html .= '<ul class="dropdown">';

                foreach( $menu['submenu'] AS $submenu ) {
                    if($submenu['page']){
                        $html .= '<li><a href="'.$submenu['page'].'">'.$submenu['title'].'</a></li>';
                    } else{
                        $html .= '<li><a href="#">'.$submenu['title'].'</a></li>';
                    }
                }

                $html .= '</ul >';

            }
        }
        else{
            if($menu['page']){
                $html .= '<li><a href="'.$menu['page'].'">'.$menu['title'].'</a></li>';
            } else{
                $html .= '<li><a href="#">'.$menu['title'].'</a></li>';
            }
        }
    }

    $html .= '</ul>';

    return $html;
}

function get_parent_menus(){
    $connection = connect();
    $sql = "SELECT * FROM `tbl_menus` WHERE `menu_id` IS NULL";

    $result = mysqli_query($connection, $sql);

    if( mysqli_num_rows($result) ){

        $menu = '';

        while( $row = mysqli_fetch_assoc($result) ){
            $menu .= '<option value="'.$row['$id'].'">'.$row['title'].'</option>';
        }

        return $menu;


    }

}

function add_new_menu_item($menu){
    $connection = connect();

    $title = $menu['menu_title'];
    $page = $menu['menu_page'];
    $id = $menu['menu_id'];
    $sql = '';

    

    if(!empty($title) AND !empty($page) AND !empty($id) ){
        $sql = "INSERT INTO `tbl_menus`(`title`, `page`, `menu_id`) VALUES ('title', 'page', 'id')";
    } else if(!empty($title) AND !empty($page) AND empty($id) ){
        $sql = "INSERT INTO `tbl_menus`(`title`, `page`) VALUES ('title', 'page')";
    } else if(!empty($title) AND empty($page) AND !empty($id) ){
        $sql = "INSERT INTO `tbl_menus`(`title`, `menu_id`) VALUES ('title', 'id')";
    } 

    mysqli_query($connection, $sql);

    if( mysqli_affected_rows($connection) ){

        return true;
    }

    return false;

}
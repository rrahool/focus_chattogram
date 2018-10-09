<?php

	require_once '../database/db.php';
	display_menu();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <header>
            <nav class="top nav">
                <?php echo display_menu() ?>
                <!--<ul class="menu">
                    <li><a href="">Home</a></li>
                    <li>
                        <a href="">Products</a>
                        <ul class="dropdown">
                            <li><a href="">Product 1</a></li>
                            <li><a href="">Product 2</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="">Services</a>
                        <ul class="dropdown">
                            <li><a href="">Services 1</a></li>
                            <li><a href="">Services 2</a></li>
                        </ul>
                    </li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                </ul>-->
            </nav>
        </header>
        <div class="info">
            <h1>Nav Menu</h1>
        </div>

        <div class="form-wrapper">
            <h3>Add Menu List Item</h3>
            <form action="add_menu.php" method="post">

                <input type="text" name="menu_title" placeholder="Menu Item Name">

                <input type="text" name="menu_page" placeholder="Page Name (optional)">
                
                <select name="menu_id">
                    <option value="">Select a parent menu (optional)</option>
                    <?= get_parent_menus(); ?>
                </select>

                <input type="submit" name="submit" value="Add Menu Item">

            </form>
        </div>


        <div class="form-wrapper">
            <h3>Delete Menu List Item</h3>
            <form action="delete_menu.php" method="post">

                <select name="menu_id">
                    <option value="">Select Something</option>
                </select>

                <input id="submit" type="submit" value="Delete Menu Item">

            </form>
        </div>
    </div>
</body>
</html>
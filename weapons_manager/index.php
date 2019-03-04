<?php
require('../database/database.php');
require('../database/weapon_db.php');
require('../database/category_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_weapons';
    }
}

if ($action == 'list_weapons') {
    // Get the current category ID
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    
    // Get weapon and category data
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $weapons = get_weapons_by_category($category_id);

    // Display the weapon list
    include('weapon_list.php');
} else if ($action == 'show_edit_form') {
    $weapon_id = filter_input(INPUT_POST, 'weapon_id', 
            FILTER_VALIDATE_INT);
    if ($weapon_id == NULL || $weapon_id == FALSE) {
        $error = "Missing or incorrect weapon id.";
        include('../errors/error.php');
    } else { 
        $weapon = get_weapon($weapon_id);
        include('editweapons.php');
    }
} else if ($action == 'update_weapon') {
    $weapon_id = filter_input(INPUT_POST, 'weapon_id', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name');
    $ammo = filter_input(INPUT_POST, 'ammo');
    $dmg = filter_input(INPUT_POST, 'dmg', FILTER_VALIDATE_INT);

    // Validate the inputs
    if ($weapon_id == NULL || $weapon_id == FALSE || $category_id == NULL || 
            $category_id == FALSE || $name == NULL || $ammo == NULL || 
            $dmg == NULL || $dmg == FALSE) {
        $error = "Invalid weapon data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_weapon($weapon_id, $category_id, $name, $ammo, $dmg);

        // Display the Weapon List page for the current category
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'delete_weapon') {
    $weapon_id = filter_input(INPUT_POST, 'weapon_id', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE ||
            $weapon_id == NULL || $weapon_id == FALSE) {
        $error = "Missing or incorrect weapon id or category id.";
        include('../errors/error.php');
    } else { 
        delete_weapon($weapon_id);
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'show_add_form') {
    $categories = get_categories();
    include('addweapons.php');
} else if ($action == 'add_weapon') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name');
    $ammo = filter_input(INPUT_POST, 'ammo');
    $dmg = filter_input(INPUT_POST, 'dmg', FILTER_VALIDATE_FLOAT);
    if ($category_id == NULL || $category_id == FALSE || $name == NULL || 
            $ammo == NULL || $dmg == NULL || $dmg == FALSE) {
        $error = "Invalid weapon data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_weapon($category_id, $name, $ammo, $dmg);
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'list_categories') {
    $categories = get_categories();
    include('category_list.php');
} else if ($action == 'add_category') {
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) {
        $error = "Invalid category name. Check name and try again.";
        include('../errors/error.php');
    } else {
        add_category($name);
        header('Location: .?action=list_categories');  // display the Category List page
    }
} else if ($action == 'delete_category') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    delete_category($category_id);
    header('Location: .?action=list_categories');      // display the Category List page
}
?>
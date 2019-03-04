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
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    $categories = get_categories();
    $category_name = get_category_name($category_id);
    $weapons = get_weapons_by_category($category_id);

    include('weapon_list.php');
} else if ($action == 'view_weapon') {
    $weapon_id = filter_input(INPUT_GET, 'weapon_id', 
            FILTER_VALIDATE_INT);   
    if ($weapon_id == NULL || $weapon_id == FALSE) {
        $error = 'Missing or incorrect weapon id.';
        include('../errors/error.php');
    } else {
        $categories = get_categories();
        $weapon = get_weapon($weapon_id);

        // Get weapon data
        $name = $weapon['weaponName'];
        $ammo = $weapon['weaponAmmo'];
        $dmg = $weapon['weaponDmg'];
        
        
        $rate = 1.7;
        $rate_amount = round($dmg * ($rate/100.0), 2);
        $gunDps = $dmg * 10;
        
        
        $shotskill = number_format($rate_amount + 1, 2);
        $dps = number_format($gunDps + 20, 2);

        // Get image URL and alternate text
        $image_filename = '../images/' . $name . '.jpg';
        $image_alt = 'Image: ' . $name . '.jpg';

        include('weapon_view.php');
    }
}
?>
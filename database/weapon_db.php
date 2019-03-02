<?php
function get_weapons() {
    global $db;
    $query = 'SELECT * FROM weapons
              ORDER BY weaponID';
    $statement = $db->prepare($query);
    $statement->execute();
    $weapons = $statement->fetchAll();
    $statement->closeCursor();
    return $weapons;
}

function get_weapons_by_category($category_id) {
    global $db;
    $query = 'SELECT * FROM weapons
              WHERE weapons.categoryID = :category_id
              ORDER BY weaponID';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $weapons = $statement->fetchAll();
    $statement->closeCursor();
    return $weapons;
}

function get_weapon($weapon_id) {
    global $db;
    $query = 'SELECT * FROM weapons
              WHERE weaponID = :weapon_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":weapon_id", $weapon_id);
    $statement->execute();
    $weapon = $statement->fetch();
    $statement->closeCursor();
    return $weapon;
}

function delete_weapon($weapon_id) {
    global $db;
    $query = 'DELETE FROM weapons
              WHERE weaponID = :weapon_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':weapon_id', $weapon_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_weapon($category_id, $name, $ammo, $dmg) {
    global $db;
    $query = 'INSERT INTO weapons
                 (categoryID, weaponName, weaponAmmo, weaponDmg)
              VALUES
                 (:category_id, :name, :ammo, :dmg)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':ammo', $ammo);
    $statement->bindValue(':dmg', $dmg);
    $statement->execute();
    $statement->closeCursor();
}

function update_weapon($weapon_id, $category_id, $name, $ammo, $dmg) {
    global $db;
    $query = 'UPDATE weapons
              SET categoryID = :category_id,
                  weaponCode = :name,
                  weaponName = :ammo,
                  listPrice = :dmg
               WHERE weaponID = :weapon_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':ammo', $ammo);
    $statement->bindValue(':dmg', $dmg);
    $statement->bindValue(':weapon_id', $weapon_id);
    $statement->execute();
    $statement->closeCursor();
}
?>
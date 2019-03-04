<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Weapon</h1>
    <form action="index.php" method="post" id="add_weapon_form">

        <input type="hidden" name="action" value="update_weapon">

        <input type="hidden" name="weapon_id"
               value="<?php echo $weapon['weaponID']; ?>">

        <label>Category ID:</label>
        <input type="category_id" name="category_id"
               value="<?php echo $weapon['categoryID']; ?>">
        <br>

        <label>Name:</label>
        <input type="input" name="code"
               value="<?php echo $weapon['weaponName']; ?>">
        <br>

        <label>Ammo:</label>
        <input type="input" name="name"
               value="<?php echo $weapon['weaponAmmo']; ?>">
        <br>

        <label>Damage:</label>
        <input type="input" name="price"
               value="<?php echo $weapon['weaponDmg']; ?>">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_weapons">View Weapon List</a></p>

</main>
<?php include '../view/footer.php'; ?>
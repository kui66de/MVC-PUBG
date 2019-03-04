<?php include '../view/header.php'; ?>
<main>

    <h1>Weapon List</h1>

    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <?php include '../view/category_nav.php'; ?>        
    </aside>

    <section>
        <!-- display a table of weapons -->
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Ammo</th>
                <th class="right">Dmg</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($weapons as $weapon) : ?>
            <tr>
                <td><?php echo $weapon['weaponName']; ?></td>
                <td><?php echo $weapon['weaponAmmo']; ?></td>
                <td class="right"><?php echo $weapon['weaponDmg']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_edit_form">
                    <input type="hidden" name="weapon_id"
                           value="<?php echo $weapon['weaponID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $weapon['categoryID']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_weapon">
                    <input type="hidden" name="weapon_id"
                           value="<?php echo $weapon['weaponID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $weapon['categoryID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Weapon</a></p>
        <p><a href="?action=list_categories">List Categories</a></p>
    </section>

</main>
<?php include '../view/footer.php'; ?>
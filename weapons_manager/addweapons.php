<?php include '../view/header.php'; ?>
<main>
    <h1>Add Weapon</h1>
    <form action="index.php" method="post" id="add_weapon_form">
        <input type="hidden" name="action" value="add_weapon">

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ( $categories as $category ) : ?>
            <option value="<?php echo $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Name:</label>
        <input type="input" name="name">
        <br>

        <label>Ammo:</label>
        <input type="input" name="ammo">
        <br>

        <label>Dmg:</label>
        <input type="input" name="dmg">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Weapon">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_weapon">View Weapon List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>
<?php include '../view/header.php'; ?>
<main>
    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <?php include '../view/header_nav.php'; ?>
    </aside>
    <section>
        <h1><?php echo $category_name; ?></h1>
        <ul class="nav">
            <!-- display links for weapons in selected category -->
            <?php foreach ($weapons as $weapon) : ?>
            <li>
                <a href="?action=view_weapon&amp;weapon_id=<?php 
                          echo $weapon['weaponID']; ?>">
                    <?php echo $weapon['weaponName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>
<?php include '../view/footer.php'; ?>
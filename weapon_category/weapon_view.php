<?php include '../view/header.php'; ?>
<main>
    <aside>
        <h1>Categories</h1>
        <?php include '../view/header_nav.php'; ?>
    </aside>
    <section>
        <h1><?php echo $name; ?></h1>
        <div id="left_column">
            <p>
                <img src="<?php echo $image_filename; ?>"
                    alt="<?php echo $image_alt; ?>">
            </p>
        </div>

        <div id="right_column">
            <p><b>Base Damage:</b> $<?php echo $dmg; ?></p>
            <p><b>Fire Rate:</b> <?php echo $rate; ?>%</p>
            <p><b>Gun DPS:</b> $<?php echo $dps; ?>
                 (Shots to kill $<?php echo $shotskill; ?>)</p>
            <form action="<?php echo '../cart' ?>" method="post">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="weapon_id"
                       value="<?php echo $weapon_id; ?>">
                <br><br>
                <input type="submit" value="Add to Favorite">
            </form>
        </div>
    </section>
</main>
<?php include '../view/footer.php'; ?>
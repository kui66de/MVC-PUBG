

<nav class="navbar">
    <center>
        <ul>
            <li><img src="images/logo1.png" id="logoimage"/></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="">Register</a></li>
            <?php foreach ($categories as $category) : ?>
                <li>
                    <a href="?category_id=<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

    </center>
</nav>
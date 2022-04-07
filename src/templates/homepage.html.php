<h1>Home page</h1>
<ul>
    <?php foreach ($links as $name => $link): ?>
        <li><a href="<?php print htmlspecialchars($link); ?>"><?php print htmlentities($name); ?></a></li>
    <?php endforeach; ?>
</ul>

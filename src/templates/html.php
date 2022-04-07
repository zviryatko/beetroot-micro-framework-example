<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=$, initial-scale=1.0">
    <title><?php print $title; ?></title>
</head>
<body>
<?php if (isset($messages)): ?>
    <ul>
        <?php foreach ($messages as $message) : ?>
            <li><?php print htmlentities($message); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php print $content; ?>
<hr>
<p><em>Page generated at <?php print $time; ?></em></p>
</body>
</html>

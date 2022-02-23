<h1>TODO List</h1>

<form action="/todos" method="POST">
    <input type="text" name="name" placeholder="Todo name" />
    <input type="checkbox" name="active" value="1" />
    <input type="submit" value="Add todo" />
</form>

<?php if (isset($variables['new_todo'])): ?>
    <p>New item added with id: <?php print $variables['new_todo']->getId(); ?></p>
<?php endif; ?>

<?php foreach ($variables['items'] as $item) : ?>
    <p><?php print $item->getName(); ?>: <?php if ($item->isActive()): ?>+<?php endif; ?></p>
<?php endforeach; ?>

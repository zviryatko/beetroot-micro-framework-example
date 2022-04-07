<h1>TODO List</h1>

<form action="/todos" method="POST">
    <input type="text" name="name" placeholder="Todo name" />
    <input type="checkbox" name="active" value="1" />
    <input type="submit" value="Add todo" />
</form>

<?php foreach ($items as $item) : ?>
    <p><?php print $item->getName(); ?><?php if ($item->isActive()): ?> (active)<?php endif; ?></p>
<?php endforeach; ?>

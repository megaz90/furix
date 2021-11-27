<?php
require 'includes/header.view.php';
?>
<h1>Home</h1>
<?php foreach ($result as $todo) : ?>

    <ul>
        <li><?= $todo->task  ?></li>
    </ul>

<?php endforeach; ?>
<?php
require 'includes/footer.view.php';
?>
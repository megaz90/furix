<?php
require 'includes/header.view.php';
?>
<h1>Post Form</h1>

<form action="/task" method="post">
    <input type="text" name="name">
    <button type="submit">Submit</button>
</form>

<?php
require 'includes/footer.view.php';
?>
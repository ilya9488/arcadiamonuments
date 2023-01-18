<?php
    $html = get_field('html');
    $css = get_field('css');
    $js = get_field('js');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Premium_Memorial</title>
</head>
<style>
    <?= $css ?>
</style>
<body>
<?= $html ?>
<scripts>
    <?= $js ?>
</scripts>
</body>
</html>

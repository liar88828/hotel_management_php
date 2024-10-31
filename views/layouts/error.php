<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('views/assets/php/links.php') ?>
    <title>ASRAMA DIKLAT - HOME</title>

</head>
<body class="bg-light">
<?php require('views/components/header.php') ?>

<main class=" container  pt-5 min-vh-100">
    <?php showMessage() ?>
    <?php /** @var mixed $content */
    echo $content; ?>
</main>

<!-- Add your JavaScript files here -->

<?php require('views/components/footer.php') ?>
<?php require('views/assets/php/swiper.php') ?>
<?php require('views/assets/php/scripts.php') ?>
</body>
</html>

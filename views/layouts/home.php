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

<main>
    <div class="container-fluid px-lg-4 mt-4">
        <?php showMessage() ?>
        <?php /** @var mixed $content */
        echo $content; ?>
    </div>
</main>

<!-- Add your JavaScript files here -->

<?php require('views/components/footer.php') ?>
<?php require('views/assets/php/swiper.php') ?>
<?php require('views/assets/php/scripts.php') ?>

</body>
</html>

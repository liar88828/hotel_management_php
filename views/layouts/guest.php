<?php getSessionGuest() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Guest Dashboard' ?> </title>
    <?php require('./views/assets/php/links.php') ?>
</head>
<body class="pt-4">
<header>
    <?php require('views/components/guest/header.php'); ?>
</header>

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

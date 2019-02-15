<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Nosso site - <?php echo $__env->yieldContent('title'); ?></title>
    <link href="<?php echo e(URL::to('http://localhost/projeto1/public/dist/css/bootstrap.css')); ?>" rel="stylesheet" type="text/css"/>
</head>
    <body>
        <div class="container">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    <script src="http://localhost/projeto1/public/js/jquery.min.js" type="text/javascript"></script>
    <script src="http://localhost/projeto1/public/dist/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
<footer>

</footer>

</html>

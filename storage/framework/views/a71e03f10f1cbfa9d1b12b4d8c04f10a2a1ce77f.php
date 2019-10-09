<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Healthy Start</title>


    <link href="<?php echo e(asset('/css/bootstrap.min.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('/css/bootstrap-slider.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('/css/icons.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('/css/bootstrap-slider.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css" >

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('/css/sticky-footer-navbar.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet">
    <style>
        <?php echo $__env->yieldContent('pageStyle'); ?>
    </style>
</head>
<body class="bg-white">
    <header>
        <?php echo $__env->yieldContent('navigation'); ?>
    </header>
    <main role="main" class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo e(asset('/js/jquery.min.js')); ?>?<?php echo e(time()); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/js/bootstrap.min.js')); ?>?<?php echo e(time()); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/js/icons.js')); ?>?<?php echo e(time()); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/js/bootstrap-slider.js')); ?>?<?php echo e(time()); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/js/combodate.js')); ?>?<?php echo e(time()); ?>" type="text/javascript"></script>

</body>
</html>

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
    <link href="<?php echo e(asset('/css/style.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css" >
        <?php echo $__env->yieldContent('css'); ?>
    


    <style>
        @media  print {#ghostery-purple-box {display:none !important}}
        
        body {
          background-image: url("<?php echo e(asset('/content/main_background.jpg')); ?>?<?php echo e(time()); ?>"); 
          background-size: cover;
        }
        <?php echo $__env->yieldContent('pageStyle'); ?>
    </style>
</head>
<body>
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
    <script src="<?php echo e(asset('/js/moment.js')); ?>?<?php echo e(time()); ?>" type="text/javascript"></script>

</body>
    <?php echo $__env->yieldContent('script'); ?>
</html>

<!--

    <link href="<?php echo e(asset('/css/extra-diet.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css" >
    
    
    <link href="<?php echo e(asset('/css/extra-sleep.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css" >
    */-->

<script>
        $(document).ready(function()){
            $('[data-toggle="tooltip"]').tooltip({'placement': 'top'});
        });
</script>

<script>
 
    $('.question').hide()
 
    $question_shown = $('.question').first().show();
 
    $('.next').click(function(){
        $('.question').hide()
        $question_shown = $question_shown.next().show();
    });
 
    $('.previous').click(function(){
        $('.question').hide()
        $question_shown = $question_shown.prev().show();
    });
</script>
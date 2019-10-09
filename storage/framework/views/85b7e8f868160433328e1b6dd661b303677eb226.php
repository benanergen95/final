<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.navAdminedit', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location = "Login";</script>
    <?php endif; ?>
    <?php if(Auth::user()->admin == 0): ?>
        <script>window.location = "Tests";</script>
    <?php endif; ?>

    <!-- Begin page content -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <div class="BOXtears">
        <h2 class="text-center">Sleep 0 page<span class="text-muted"></span></h2>
        <hr>
        <?php
            $data=DB::table('summernotes')->where("item_id","=",17)->value('content');
        ?>
        <div class="container">
            <div class="panel panel-default">
                <div class="pannel-heading">
                </div>
                <div class="panel-body">

                    <form action="<?php echo e(url('editsleep0')); ?>" method="post">
                        <div class="form-group">
                <textarea id="summernote" name="editsleep0value" class="form-control">
                  <?php echo $data; ?>

                </textarea>

                        </div>
                        <div class="form-group">
                            <!--Submit-->
                            <div class="av1">
                                <input type="submit" value="Submit" class="btn btn-success">
                            </div>
                            <?php echo csrf_field(); ?>

                        </div>
                        <?php echo $data; ?>

                    </form>
                    <script>
                        $('#summernote').summernote({
                            tabsize: 2,
                            height: 500
                        });
                    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
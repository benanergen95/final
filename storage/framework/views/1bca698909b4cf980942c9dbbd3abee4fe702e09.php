  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?> 
<?php echo $__env->make('layouts.navAdminedit', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location="Login";</script>
    <?php endif; ?>
    <?php if(Auth::user()->admin == 0): ?>
        <script>window.location="Tests";</script>
    <?php endif; ?>
    <!-- Begin page content -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>


      <div class="BOXtears">
        <h2 class="text-center">Sleep time 4 page(links)<span class="text-muted"></span></h2>

        <hr>
        <?php
    $data=DB::table('summernotes')->where("item_id","=",38)->value('content');
    $data1=DB::table('summernotes')->where("item_id","=",39)->value('content');
    $data2=DB::table('summernotes')->where("item_id","=",40)->value('content');
    $data3=DB::table('summernotes')->where("item_id","=",63)->value('content');
    ?>
        <div class="container">
         <div class="panel panel-default"> 
          <div class="pannel-heading">
          </div>
          <div class="panel-body">

            <form action="<?php echo e(url('editsleep1')); ?>" method="post" >
      <div class="jumbotron bg-gery rounded-top rounded-bottom border border-secondry mx-2">
        <h2 class="av1">Tips to help you achive your goals - Sleep <span class="text-muted"></span></h2>
        <div class="fAlert alert-colBox2" role="alert">
          <!-- Stack the columns on mobile by making one full-width and the other half-width -->
          <div class="row">
            <div class="col-12 col-md-8">Sleep well</div>
              <div class="col-12 col-md-4">
              <button type="button" class="btn btn-light" onclick=" window.open('<?php echo e($data); ?>','_blank')">Find out more</button>
            </div>
          </div>
           <div class="text-center" >
           Link:
            <input type="text" name="linksl1" class="form-control" value="<?php echo e($data); ?>">
            </div>

        </div><!--Green thing div-->

        <div class="fAlert alert-colBox" role="alert">
          <!-- Stack the columns on mobile by making one full-width and the other half-width -->
           <div class="row">
              <div class="col-12 col-md-8"> Healthy sleep habits at home</div>
             <div class="col-12 col-md-4">
                <button type="button" class="btn btn-light" onclick=" window.open('<?php echo e($data1); ?>','_blank')">Find out more</button>
            </div>
          </div>
           <div class="text-center" >
           Link:
            <input type="text" name="linksl2" class="form-control" value="<?php echo e($data1); ?>">
            </div>
        </div><!--Blue thing div-->

        <div class="fAlert alert-colBox1" role="alert">
          <!-- Stack the columns on mobile by making one full-width and the other half-width -->
          <div class="row">
              <div class="col-12 col-md-8">Kids Back on a Sleep Schedule for School</div>
                <div class="col-12 col-md-4">
                <button type="button" class="btn btn-light"  onclick=" window.open('<?php echo e($data2); ?>','_blank')">Find out more</button>
            </div>
          </div>
           <div class="text-center" >
           Link:
            <input type="text" class="form-control" name="linksl3" value="<?php echo e($data2); ?>">
            </div>
             </div>
             <textarea id="summernote" name="slp1" class="form-control">
                  <?php echo $data3; ?>

            </textarea>
             <br>
          <div class="av1"> 
             <input type="submit" value="Submit" class="btn btn-success">
          </div>


                <?php echo csrf_field(); ?>

              </div>
            </form>
                    <script>
      $('#summernote').summernote({
        tabsize: 2,
        height: 500
      });
    
    </script>      
            
            
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
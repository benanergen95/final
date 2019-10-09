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
         <!-- summernote -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>


      <div class="BOXtears">
        <h2 class="text-center">Screentime Results page<span class="text-muted"></span></h2>

        <hr>
        <?php
    $data1=DB::table('summernotes')->where("item_id","=",58)->value('content'); //welldone screen time SD
    $data2=DB::table('summernotes')->where("item_id","=",59)->value('content'); //getting there screen time SD 
    $data3=DB::table('summernotes')->where("item_id","=",60)->value('content'); // well done screen time NSD
    $data4=DB::table('summernotes')->where("item_id","=",61)->value('content'); //getting there screen time NSD
    $data5=DB::table('summernotes')->where("item_id","=",62)->value('content'); //image
    ?>
        <div class="container">
         <div class="panel panel-default"> 
          <div class="pannel-heading">
          </div>
          <div class="panel-body">
            <form action="<?php echo e(url('editscreentime5')); ?>" method="post" >
          <div class="text-center" >
           <p class="text-center"><b>If not using too much screen in school days: </b></p> 
           <input type="text" name="st1" value="<?php echo e($data1); ?>">
            </div>
            <hr>
           <div class="text-center" >
           <p class="text-center"><b>If using too much screen in school days :</b></p> 
           <input type="text" name="st2" value="<?php echo e($data2); ?>"> 
            </div>
            <hr><div class="text-center" >
           <p class="text-center"><b>If not using too much screen in non school days</b></p> 
           <input type="text" name="st3" value="<?php echo e($data3); ?>"> 
            </div>
            <hr>
            <div class="text-center" >
           <p class="text-center"><b>If  using too much screen in non school days</b></p> 
           <input type="text" name="st4" value="<?php echo e($data4); ?>"> 
            </div>
            <hr>
              <div class="row justify-content-center  text-white">
              <div class="col-4 lead bg-secondary"></div>
              <div class="col-4 lead bg-secondary">School days </div>
              <div class="col-4 lead bg-secondary">Non school days</div>
            </div>
            <div class="row justify-content-center">
              <div class="col-4 text-black lead border border-secondary" style="background-color:#e4e6e7">text if not using too much screen</div>
              <div class="col-4 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e($data1); ?></div>
              <div class="col-4 text-black lead border border-secondary" style="background-color:#e4e6e7"><?php echo e($data3); ?></div>
              <div class="col-4 text-black lead  border border-secondary" style="background-color:#e4e6e7">text using too much screen</div>
              <div class="col-4 text-black lead border border-secondary" style="background-color:#e4e6e7"><?php echo e($data2); ?></div>
              <div class="col-4 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e($data4); ?></div>
            </div>
            <hr>
              <textarea id="summernote" name="st5" class="form-control">
                  <?php echo $data5; ?>

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
  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?> 
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
        <h2 class="text-center">Sleep 2 page<span class="text-muted"></span></h2>

        <hr>
   <?php
    $data=DB::table('summernotes')->where("item_id","=",74)->value('content');
    $data2=DB::table('summernotes')->where("item_id","=",75)->value('content');
    $data3=DB::table('summernotes')->where("item_id","=",76)->value('content');
    ?>
        <div class="container">
         <div class="panel panel-default"> 
          <div class="pannel-heading">
          </div>
          <div class="panel-body">

            <form action="<?php echo e(url('editsleep4')); ?>" method="post" >
            	 <?php echo csrf_field(); ?>

              <div class="form-group">
                <textarea id="summernote" name="eslp41" class="form-control">
                  <?php echo $data; ?>

                </textarea>
          <div class="text-center"><p><b>Input</b></p></div>
              
                <textarea id="summernote2" name="eslp42" class="form-control">
                  <?php echo $data2; ?>

                </textarea>
                          <div class="text-center"><p><b>Input</b></p></div>
                 <textarea id="summernote3" name="eslp43" class="form-control">
                  <?php echo $data3; ?>

                </textarea>
                      </div>
              <div class="form-group">
                       <!--Submit-->
          <div class="av1"> 
             <input type="submit" value="Submit" class="btn btn-success">
          </div>
                <?php echo csrf_field(); ?>

              </div>
            </form>
              <?php echo $data; ?>

                  <div class="text-center"><p><b>Input</b></p></div>
              <?php echo $data2; ?>

                  <div class="text-center"><p><b>Input</b></p></div>
              <?php echo $data3; ?>

       <script>
      $('#summernote').summernote({
        tabsize: 2,
        height: 200
      });
      $('#summernote2').summernote({
        tabsize: 2,
        height: 50
      });
       $('#summernote3').summernote({
        tabsize: 2,
        height: 200
      });
    </script>
     <script>
		$('#timeSleep').combodate({
	      	value: "9:00 PM"
	    });  

	    $('#timeWake').combodate({
	    	value: "7:00 AM"
	    });  

	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
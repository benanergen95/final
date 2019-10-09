  <?php
    use App\Child;
    use App\Entries;
    use App\User;

    $child = App\Child::where('childID', Auth::user()->currentChild)->first();
    $entries = App\Entries::where('childID', Auth::user()->currentChild)->first();  
  ?>
  <?php $__env->startSection('navigation'); ?>
    <?php if(Auth::user()->admin == 1): ?>
      <?php echo $__env->make('layouts.navAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php else: ?>
      <?php echo $__env->make('layouts.navUserHome', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('script'); ?>
    <link href="<?php echo e(asset('/css/sticky-footer-navbar.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet">
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?>  

      <div class="jumbotron">
        <?php if($message = Session::get('error')): ?>
          <div class="alert alert-danger alert-block">
            <?php echo e($message); ?>

          </div>
        <?php endif; ?>
		<h2 class="av1">Hello <?php echo e(Auth::user()->fname); ?> <?php echo e(Auth::user()->lname); ?>!</h2>
    <h2 class="av1">Welcome to <?php echo e($child->CfName); ?> <?php echo e($child->ClName); ?>'s health journey.</h2>

		<div class="av1">
        	<p class="">Please Select a test</p>
        </div>
        <hr>
        <!--<div class="container">-->
        <div class="row no-gutters">
            <div class="col-3">
              <a href="Weight0" type="button" class="btn btn-primary btn-lg btn-block"><i class="fas fa-weight"></i></a>
            </div>
            <div class="col">
              <a href="Weight0" type="button" class="btn btn-primary btn-lg btn-block">Weight</a>
            </div>
            <?php if(isset($entries->height) && isset($entries->weight) && isset($entries->waist) && isset($entries->hip)): ?>
            <div class="col-3">
              <a href="Weight5" type="button" class="btn btn-outline-primary btn-lg btn-block">Tips</a>
            </div>
            <?php endif; ?>
        </div>
        <br>
        <div class="row no-gutters">
            <div class="col-3">
              <a href="Diet0" type="button" class="btn btn-success btn-lg btn-block"><i class="fas fa-apple-alt"></i></a>
            </div>
            <div class="col">
              <a href="Diet0" type="button" class="btn btn-success btn-lg btn-block">Fruit & Veggies</a>
            </div>
            <?php if(isset($entries->fruits) && isset($entries->veggies)): ?>
            <div class="col-3">
              <a href="Diet4" type="button" class="btn btn-outline-success btn-lg btn-block">Tips</a>
            </div>
            <?php endif; ?>
        </div>
        <br>
        <div class="row no-gutters">
            <div class="col-3">
              <a href="Exercise0" type="button" class="btn btn-danger btn-lg btn-block"><i class="fas fa-walking"></i></a>
            </div>
            <div class="col">
              <a href="Exercise0" type="button" class="btn btn-danger btn-lg btn-block">Exercise</a>
            </div>
            <?php if(isset($entries->exercise)): ?>
            <div class="col-3">
              <a href="Exercise3" type="button" class="btn btn-outline-danger btn-lg btn-block">Tips</a>
            </div>
            <?php endif; ?>
        </div>
        <br>
        <div class="row no-gutters">
            <div class="col-3">
              <a href="ScreenTime0" type="button" class="btn btn-info btn-lg btn-block"><i class="fas fa-tv"></i></a>
            </div>
            <div class="col">
              <a href="ScreenTime0" type="button" class="btn btn-info btn-lg btn-block">Screen time</a>
            </div>
            <?php if(isset($entries->screenTimeSD) && isset($entries->screenTimeNSD)): ?>
            <div class="col-3">
              <a href="ScreenTime5" type="button" class="btn btn-outline-info btn-lg btn-block">Tips</a>
            </div>
            <?php endif; ?>
        </div>
        <br>
        <div class="row no-gutters">
            <div class="col-3">
              <a href="Sleep0" type="button" class="btn btn-tears btn-lg btn-block"><i class="fas fa-bed"></i></a>
            </div>
            <div class="col">
              <a href="Sleep0" type="button" class="btn btn-tears btn-lg btn-block">Sleep</a>
            </div>
            <?php if(isset($entries->sleepSD) && isset($entries->sleepNSD)): ?>
            <div class="col-3">
              <a href="Sleep4" type="button" class="btn btn-outline-tears btn-lg btn-block">Tips</a>
            </div>
            <?php endif; ?>
        </div>

            
        <!--</div>-->
        <br>
        <hr> 
        <div class="">
          <p class="">Your Progress </p>
          <div class="progress bg-white border border-dark">
            <?php if(isset($entries->height) && isset($entries->weight)): ?>
              <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
            <?php endif; ?>
            <?php if(isset($entries->fruits) && isset($entries->veggies)): ?>
              <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
            <?php endif; ?>
            <?php if(isset($entries->exercise)): ?>
              <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
            <?php endif; ?>
            <?php if(isset($entries->screenTimeSD) && isset($entries->screenTimeNSD)): ?>
              <div class="progress-bar bg-info progress-bar-striped" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
            <?php endif; ?>
            <?php if(isset($entries->sleepSD) && isset($entries->sleepNSD)): ?>
              <div class="progress-bar bg-tears progress-bar-striped" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
            <?php endif; ?> 
           </div>

          </div>
      </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
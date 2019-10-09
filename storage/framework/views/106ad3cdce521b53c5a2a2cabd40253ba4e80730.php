<?php
    use App\Results;  
    use App\Child;
?>
<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location = "Login";</script>
    <?php endif; ?>

    
<?php $__env->startSection('content'); ?>
        <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?> 

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('/css/mental.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>

<form action="MentalHealth4" method="get">
<div class="question text-center">Question 1 - How often does the child feel sad?
<br>

<div>
<img src ="/content/mentalquestion.jpg">
</div>

<label class="container text-left">Never
  <input type="radio" checked="checked" name="mental" value="0">
  <span class="checkmark"></span>
</label>
<label class="container text-left">Sometimes
  <input type="radio" name="mental" value="1">
  <span class="checkmark"></span>
</label>
<label class="container text-left">Often
  <input type="radio" name="mental" value="2">
  <span class="checkmark"></span>
</label></div>

<div class ="text-center">
<input type="submit" name="submit" value="submit">Next Question</a>
<a href="MentalHealth2" class="previous">Previous Question</a>
</div>
</form>

<?php
// GETTING VALUE FOR MENTAL HEALTH
session_start();
if(isset($_GET['submit'])){
  $_session['mentalHealthButton'] = $_GET['mental'];  // Storing Selected Value In Variable
}
?>

    <?php
    // CHECKING MENTAL HEALTH VALUE OBTAINED 

        $child = App\Child::where('childID', Auth::user()->currentChild)->first();
        $mentalHealth = "1";
        if ($mentalHealth >= 13)
        {
            $mValue="Not Healthy";
        }

        elseif ($mentalHealth < 13){

            $mValue = "Healthy";
        }
        
    ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
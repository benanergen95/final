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

            <style>
a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
}
.previous {
  background-color: #f1f1f1;
  color: black;
}

.next {
  background-color: #1569C7;
  color: white;
}

.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

.container:hover input ~ .checkmark {
  background-color: #ccc;
}

.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

.container input:checked ~ .checkmark:after {
  display: block;
}

.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
</style>

<?php
// GETTING VALUE FOR MENTAL HEALTH
session_start();

if(isset($_GET['mental'])){
  $_SESSION['mentalHealthButton'] = $_SESSION['mentalHealthButton'] + $_GET['mental'];
}

if (isset($_SESSION['mentalHealthButton'])) {
  echo '';
}
$child = App\Results::where('childID', Auth::user()->currentChild)->first();
$link = mysqli_connect("localhost", "root", "", "test");
$test = Auth::user()->currentChild;

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$yr = $_SESSION['mentalHealthButton'];
$sql = "UPDATE results SET MentalScore=$yr WHERE childID = $test";
if(mysqli_query($link, $sql)){
echo "";
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
session_destroy()
?>
<div class="text-center">
  <h3>Please Click Finish To Finalise The Test.</h3>
</div>
<br>
<div>
<img src ="/content/mentalquestion.jpg">
</div>
<div class="av1">
                <input type="submit" value="Next" class="btn btn-primary btn-lg" button onclick="location.href = 'MentalHealth20'" type="button">Finish
                <a href="MentalHealth19" class="previous">Previous Question</a>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
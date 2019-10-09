
  <?php
    use App\Child;
    use App\Entries;
    use App\User;
    use App\Results;

    $entries = App\Entries::where('childID', Auth::user()->currentChild)->first();
    $results = App\Results::where('childID', Auth::user()->currentChild)->first();

  ?>
  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('script'); ?>
    <link href="<?php echo e(asset('/css/sticky-footer-navbar.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet">
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?>
    <?php if(!isset(Auth::user()->email)): ?>
          <script>window.location="Login";</script>
    <?php endif; ?>

    <!--Check if all questionnaire has been answered-->
    <?php if(empty($entries->height) || empty($entries->weight) || empty($entries->waist) || empty($entries->hip) || empty($entries->fruits) || empty($entries->veggies) || empty($entries->exercise) || empty($entries->screenTimeSD) || empty($entries->screenTimeNSD) || empty($entries->sleepSD) || empty($entries->sleepNSD)): ?>
          <script>window.location="ResultDenied";</script>
    <?php endif; ?>
    <!---->



      <div class="BOXtears">
		    <h2 class="av1">Results<span class="text-muted"></span></h2>

        <hr>
        <h3 class="text-left text-success">Your Childs results</h3>
        <div class="parMain">
          <div class="row justify-content-center  text-white">
              <div class="col-6 lead bg-secondary">Test</div>
              <div class="col-6 lead bg-secondary">Result</div>
            </div>
            <div class="row justify-content-center">
              <!-- Weight result-->
              <div class="col-6 text-black lead border border-secondary" style="background-color:#e4e6e7">Weight Body Mass Index</div>
              <div class="col-6 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e($results->RBmi == 0 ? "Under Weight" : ($results->RBmi == 1 ? "Normal Weight" : "Overweight")); ?></div>
              <!--Fruit & Veggies result -->
              <div class="col-6 text-black lead border border-secondary" style="background-color:#e4e6e7">Fruit Intake</div>
              <div class="col-6 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e($results->RfruitsIntake == 0 ? "Enough" : "Not Enough"); ?></div>
              <div class="col-6 text-black lead border border-secondary" style="background-color:#e4e6e7">Veggies Intake</div>
              <div class="col-6 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e($results->RveggiesIntake == 0 ? "Enough" : "Not Enough"); ?></div>
              <!-- Exercise result-->
              <div class="col-6 text-black lead border border-secondary" style="background-color:#e4e6e7">Exercise</div>
              <div class="col-6 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e($results->Rexercise == 0 ? "Enough" : "Not Enough"); ?></div>
              <!-- Screen time result-->
              <div class="col-6 text-black lead border border-secondary" style="background-color:#e4e6e7">Screen time School Days</div>
              <div class="col-6 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e($results->RscreentimeSD == 0 ? "Enough Screen time" : "Too much"); ?></div>
              <div class="col-6 text-black lead border border-secondary" style="background-color:#e4e6e7">Screen time Non-School Days</div>
              <div class="col-6 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e($results->RscreentimeNSD == 0 ? "Enough Screen time" : "Too much"); ?></div>
              <!-- Sleep result-->
              <div class="col-6 text-black lead border border-secondary" style="background-color:#e4e6e7">Sleep School Days</div>
              <div class="col-6 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e($results->RStimeSD == 0 ? "Enough Sleep" : ($results->RStimeSD == 1 ? "Less than Enough" : "More than Enough")); ?></div>
              <div class="col-6 text-black lead border border-secondary" style="background-color:#e4e6e7">Sleep Non-School Days</div>
              <div class="col-6 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e($results->RStimeNSD == 0 ? "Enough Sleep" : ($results->RStimeNSD == 1 ? "Less than Enough" : "More than Enough")); ?></div>
            </div>
        </div>
        <br>
       
        <hr>
          <div class="av1"> 
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
              Email Results
            </button>
            <a href="Tests" type="button" class="btn btn-primary">Tests</a>
          </div>
          <hr>
      </div>

      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Email The Results/Resourcess</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="">Please select which email account you would like to send the email to.</p>
<form action="<?php echo e(url('send')); ?>">
                      <button  value="submit" type="submit" class="btn btn-primary btn-sm">Use my account Email</button>
</form>


            <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Or alternatively enter the email address you would like to send the results to.</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email@domain.com">
              </div>
              
            </form> 
            </div>
           <div class="modal-footer">
            <button  type="button" class="btn btn-success">Send Results</button>
           </div>
        </div>
       </div>
     </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
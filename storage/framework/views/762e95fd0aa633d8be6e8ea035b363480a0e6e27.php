  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?> 
      <div class="jumbotron">
		    <h2 class="av1">Tips to help you achive your goals - Fruits & Veggies <span class="text-muted"></span></h2>
        <div class="fAlert alert-colBox2" role="alert">
          <!-- Stack the columns on mobile by making one full-width and the other half-width -->
          <div class="row">
            <div class="col-12 col-md-8">Eat More Fruit and Veggies</div>
            <div class="col-6 col-md-4"><button type="button" class="btn btn-light" onclick="location.href ='https://www.healthykids.nsw.gov.au/kids-teens/eat-more-fruit-and-vegies.aspx'">Find out more</button></div>
          </div>
        </div><!--Green thing div-->

        <div class="fAlert alert-colBox" role="alert">
          <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
              <div class="col-12 col-md-8">Eat Fewer Snacks and Select Healthier Alternatives</div>
              <div class="col-6 col-md-4"><button type="button" class="btn btn-light" onclick="location.href ='https://www.healthykids.nsw.gov.au/kids-teens/eat-fewer-snacks-and-select-healthier-alternatives.aspx'">Find out more</button></div>
            </div>
        </div><!--Blue thing div-->

        <div class="fAlert alert-colBox1" role="alert">
          <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
              <div class="col-12 col-md-8">Less juice, more water</div>
              <div class="col-6 col-md-4"><button type="button" class="btn btn-light" onclick="location.href ='https://www.healthykids.nsw.gov.au/kids-teens/choose-water-as-a-drink-kids.aspx'">Find out more</button></div>
            </div>
         </div><!--red thing div-->

        <div class="text-center">
        <img src="<?php echo e(asset('/content/Diet-Result.jpg')); ?>?<?php echo e(time()); ?>" class="rounded img-fluid" alt="Good weight" width="500px">
        </div>

        <hr>
        <div class="parMainL">
          <p class="">Once you have looked over the tips please proceed to the next test</p>
          <a href="Tests" type="button" class="btn btn-primary">Next Test</a>
          <hr>
        </div>
        <br>
          <div class="av1"> 
          </div>
      </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
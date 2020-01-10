<?php $__env->startSection('content'); ?>


<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-12">
                <h4 class="text-themecolor">Directory Monthly View Counter</h4>
            </div>
            </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body row">
                        
                       
           
                        <div class="table-responsive col-md-6">
                            
                            <table class="table table-bordered" style="">
                                
                            
                            <tbody>
                         <?php if(count($helps) > 0): ?>
                         <?php $__currentLoopData = $helps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $help): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                           
                            <tr><th style="text-transform: uppercase;">Title</th><td class="" ><?php echo e($help->company); ?></td></tr>
                            <tr><th style="text-transform: uppercase;">Year</th><td class=""> <?php echo e($help->old_year); ?>,<?php echo e($help->year); ?> </td></tr>
                            <tr><th style="text-transform: uppercase;">Current Month</th><td class=""> <?php echo e(date('F')); ?></td></tr>
                            </table>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>  
                            </div>
                            
                            <div class="table-responsive col-md-6">
                            <table class="table table-bordered" style="margin-top: -18px;">
                                
                            
                            <tbody>
                                
                         <?php if(count($helps) > 0): ?>
                         <?php $__currentLoopData = $helps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $help): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            
                            <?php $countchkold = 0;
                            $k=0;
                            
                            echo '<tr><th style="text-transform: uppercase; font-weight: bold; border: none;">MONTH </th><th class="" style=" border: none; font-weight: bold;">NO. OF VIEWS</th></tr>';
                            
                            
                            $arrayofmonth = json_decode($help->json_arraydata,true);
                            
                            foreach($arrayofmonth as $key => $monthnames){
                                $oldyeardatastr = 'old_year_'.$monthnames;
                                $k = $k + $help->$monthnames;
                                echo '<tr><th style="text-transform: uppercase;font-weight:normal; ">'.$monthnames.' - '.$help->$oldyeardatastr.'</th><td class=""><div style="font-weight:normal; width: fit-content; margin: 0px auto; padding:5px 10px; ">'.$help->$monthnames.'</div></td></tr>';
                                
                            }
                            
                            echo '<tr style="background-color: #efefef;"><th style="text-transform: uppercase; font-weight: bold;">Total Views: </th><td class=""><div style="font-weight:bold; width: fit-content; margin: 0px auto; padding:5px 10px; text-align: center;">'.$k.'</div></td></tr>';
                            
                            /*for ($m=12; $m>=1; $m--) {
                                 $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
                                 $oldyeardatastr = 'old_year_'.$month;
                                 if($month == date('F')){
                                     $countchkold = 1;
                                     $k = $k + $help->$month;
                                     echo '<tr><th style="text-transform: uppercase;font-weight:normal; color:red;">'.$month.' - '.$help->$oldyeardatastr.'</th><td class=""><div style="font-weight:normal; width: fit-content; margin: 0px auto; padding:5px 10px; color:red;">'.$help->$month.'</div></td></tr>';
                                 }else{
                                      echo '<tr><th style="text-transform: uppercase;font-weight:normal; ">'.$month.' - '.$help->$oldyeardatastr.'</th><td class=""><div style="font-weight:normal; width: fit-content; margin: 0px auto; padding:5px 10px;">'.$help->$month.'</div></td></tr>';
                                 }
                                 
                                 
                                 }
                                 echo '<tr style="background-color: #efefef;"><th style="text-transform: uppercase; font-weight: bold;">Total Views: </th><td class=""><div style="font-weight:bold; width: fit-content; margin: 0px auto; padding:5px 10px; text-align: center;">'.$k.'</div></td></tr>';*/
                            ?>
                            
                                    
                                
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php else: ?>
                        
                            <tr><td colspan="15">No record found !..</td></tr>

                            <?php endif; ?>  
                                
                                </tbody>
                            </table>
                          

                        </div>
                        


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>












<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/profiles/viewer.blade.php ENDPATH**/ ?>
<div class="row form-row">
    <div class="col-12 required-key">
	    <label class="required-label">* - Required</label>
	</div>
    <div class="col-12">
        <div class="form-group <?php echo e($errors->has('bid_title') ? 'has-error' : ''); ?>">
        <label for="bid_title" class="required"><?php echo e(trans('proposals.bid_title')); ?></label>
            <input class="form-control" name="bid_title" type="text" id="bid_title" value="<?php echo e(old('bid_title', optional($proposal)->bid_title)); ?>" maxlength="255" placeholder="<?php echo e(trans('proposals.bid_title__placeholder')); ?>" required>
            <?php echo $errors->first('bid_title', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    
    <div class="col-12">
        <div class="form-group <?php echo e($errors->has('bid_decription') ? 'has-error' : ''); ?>">
        <label for="bid_decription" class="required"><?php echo e(trans('proposals.bid_decription')); ?></label>
            <textarea class="form-control" name="bid_description" cols="50" rows="10" id="bid_decription" placeholder="bid description" required><?php echo e(old('bid_description', optional($proposal)->bid_description)); ?></textarea>
            <?php echo $errors->first('bid_decription', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    
    <div class="col-12">
    		<div class="form-group <?php echo e($errors->has('files') ? 'has-error' : ''); ?>">
    			<label for="files" style="margin-bottom:15px;">Add Project Files:</label>
    			<input id="proposal-files" type="file" name="files[]" class="form-control" multiple>
    			<?php echo $errors->first('files', '<p class="help-block">:message</p>'); ?>

    		</div>
    	</div>
        <?php if(!empty($files) && $files != '[]' && $files && isset($files)): ?>
        <div class="col-12">
            <label class="">Remove Project Files:</label>
        </div>
        <?php endif; ?>
     
			<?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div id="<?php echo e($file->id); ?>" class="col-12" style="margin:20px 0 40px;float:left;padding-right:10px;">
					    <?php
					    if($file->file_type == 'pdf'){
					        $src = '/app/public/storage/company/images/PDF-icon-small-231x300.png';
					    } else {
					        $src = $file->file_path;
					    }
					    ?>
					    <div style="width:100%;padding:10px;"><img width="100%" src="<?php echo e($src); ?>"></div>
					    
						<div style="width:100%;padding:10px;"><?php echo e($file->file_name); ?></div>
						<div style="text-align: center;width: 100%;margin-top: 10px;"><a style="color:#fff;" data-id="<?php echo e($file->id); ?>" class="btn btn-red delete-file" href="">Remove</a></div>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-12 form-group <?php echo e($errors->has('trade') ? 'has-error' : ''); ?>">
    			<label for="trade" class="required">Trade</label>
    			<div class="">
    				<select name="trade[]" id="trade" class="form-control" multiple required>
    					<?php 
                     $trades = DB::table('categories_helps')->get();
                     if($proposal != null) {
                     if(!isset($proposal->trade)){ 
                     $trades_arr = explode(',', $trades->trade);
                     } else {
                     $trades_arr = explode(',', $proposal->trade);
                     }
                     } else {
                        $trades_arr = array();
                        }
                     ?>
    					<?php $__currentLoopData = $trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    					<option value="<?php echo e($trade->title); ?>" <?php if(in_array($trade->title, $trades_arr)): ?> selected <?php endif; ?>><?php echo e($trade->title); ?></option>
    					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    				</select>
        </div>
    </div>
</div>
<?php /**PATH /home/bidhub/bidhub/resources/views/proposals/form.blade.php ENDPATH**/ ?>
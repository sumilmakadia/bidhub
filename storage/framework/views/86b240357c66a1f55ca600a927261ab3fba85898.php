<?php if(is_field_translatable($dataTypeContent, $row)): ?>
    <span class="language-label js-language-label"></span>
    <input type="hidden"
           data-i18n="true"
           name="<?php echo e($row->field); ?>_i18n"
           id="<?php echo e($row->field); ?>_i18n"
           value="<?php echo e(get_field_translations($dataTypeContent, $row->field)); ?>">
<?php endif; ?>
<?php /**PATH /home/bidhub/bidhub/vendor/tcg/voyager/src/../resources/views/multilingual/input-hidden-bread-edit-add.blade.php ENDPATH**/ ?>
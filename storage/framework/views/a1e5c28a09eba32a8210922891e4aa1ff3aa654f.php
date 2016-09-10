<?php if(session()->has('flash_notification.message')): ?>
<div class="container">
<div class="alert alert-<?php echo e(session()->get('flash_notification.level')); ?>">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<?php echo session()->get('flash_notification.message'); ?>

</div>
</div>
<?php endif; ?>
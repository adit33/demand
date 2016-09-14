<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">User</div>
                <div class="panel-body">
                <a type="button" href="<?php echo route('user.create'); ?>" class="btn btn-primary">Add User</a><hr>
                  <?php echo $dataTable->table(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo $dataTable->scripts(); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
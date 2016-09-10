<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create Role</div>
                <div class="panel-body">
                   <?php echo Form::model($role,['url' => route('role.update',$role->id),'method'=>'PUT']); ?>

			          <?php echo $__env->make('backend.role._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			       <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
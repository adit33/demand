<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create User</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('user.store')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <?php echo $__env->make('layouts.partial._flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <div class="form-group<?php echo e($errors->has('nik') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">NIK (Nomor Induk Karyawan)</label>

                            <div class="col-md-6">
                                <?php echo Form::text('nik',null,['class'=>'form-control','required autofocus']); ?>


                                <?php if($errors->has('nik')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nik')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                         <div class="form-group<?php echo e($errors->has('nama') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <?php echo Form::text('nama',null,['class'=>'form-control','required autofocus']); ?>


                                <?php if($errors->has('nama')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nama')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Konfirmasi Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password_confirmation')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
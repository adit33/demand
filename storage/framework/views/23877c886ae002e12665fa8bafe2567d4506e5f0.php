<div class="form-group <?php echo $errors->has('nama_role') ? 'has-error' : ''; ?>">
  <?php echo Form::label('nama_role', 'Nama role'); ?>

  <?php echo Form::text('nama_role',null,['class'=>'form-control']); ?>

  <?php echo $errors->first('nama_role', '<p class="help-block">:message</p>'); ?>

</div>

<?php if(isset($permission_role)): ?>

<div class="form-group">
<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	<?php $checked = in_array($permission->id, $permission_role->pluck('id')->toArray()); ?>
	<?php echo Form::checkbox('nama_permission[]',$permission->nama_permission,$checked); ?><?php echo $permission->nama_permission; ?><br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</div>

<?php else: ?>
<div class="form-group">
	  <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	  <input type="checkbox" name="nama_permission[]" value="<?php echo $permission->nama_permission; ?>"><?php echo $permission->nama_permission; ?></input><br>
	  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</div>

<?php endif; ?>

<?php echo Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']); ?>


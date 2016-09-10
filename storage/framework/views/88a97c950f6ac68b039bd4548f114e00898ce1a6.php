<div class="form-group <?php echo $errors->has('nama_permission') ? 'has-error' : ''; ?>">
  <?php echo Form::label('nama_permission', 'Nama Permission'); ?>

  <?php echo Form::text('nama_permission',null,['class'=>'form-control']); ?>

  <?php echo $errors->first('nama_permission', '<p class="help-block">:message</p>'); ?>

</div>

<?php echo Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']); ?>


<div class="form-group {!! $errors->has('nama_permission') ? 'has-error' : '' !!}">
  {!! Form::label('nama_permission', 'Nama Permission') !!}
  {!! Form::text('nama_permission',null,['class'=>'form-control']) !!}
  {!! $errors->first('nama_permission', '<p class="help-block">:message</p>') !!}
</div>

{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}

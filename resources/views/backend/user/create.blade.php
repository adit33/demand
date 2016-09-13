@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create User</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('user.store') }}">
                        {{ csrf_field() }}

                        @include('layouts.partial._flash')

                        <div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">NIK (Nomor Induk Karyawan)</label>

                            <div class="col-md-6">
                                {!! Form::text('nik',null,['class'=>'form-control','required autofocus']) !!}

                                @if ($errors->has('nik'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nik') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                {!! Form::text('nama',null,['class'=>'form-control','required autofocus']) !!}

                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Konfirmasi Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama_role') ? ' has-error' : '' }}">
                            <label for="role_id" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
                                {!! Form::select('nama_role',App\Models\Role::pluck('nama_role','nama_role'),null,['class'=>'form-control','placeholder'=>'Pilih Role']) !!}

                                @if ($errors->has('nama_role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_role') }}</strong>
                                    </span>
                                @endif
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
@endsection
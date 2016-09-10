@extends('backend.layout.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create Permission</div>
                <div class="panel-body">
                   {!! Form::open(['route' => 'permission.store'])!!}
			          @include('backend.permission._form')
			       {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush
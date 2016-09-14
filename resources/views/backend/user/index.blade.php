@extends('backend.layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">User</div>
                <div class="panel-body">
                <a type="button" href="{!! route('user.create') !!}" class="btn btn-primary">Add User</a><hr>
                  {!! $dataTable->table() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
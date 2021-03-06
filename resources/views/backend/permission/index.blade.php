@extends('backend.layout.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Permission</div>
                <div class="panel-body">
                	<a href="{{ route('permission.create') }}" class="btn btn-primary">Add Permission</a>
                	<hr>                    
					{!! $dataTable->table(['class'=>'table table-striped table-bordered dataTable no-footer']) !!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')
{!! $dataTable->scripts() !!}
@endpush
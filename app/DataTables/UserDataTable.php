<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\Datatables\Services\DataTable;

use URL,Form,Crypt;

class UserDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        $query=$this->query();
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', function($query){
                return '<a href="'.URL::to('user/'.Crypt::encrypt($query->nik).'/edit').'" class="btn btn-info btn-xs">Edit</a>'

                .
                Form::model($query, ['route' => ['user.destroy', $query->nik], 'method' => 'delete', 'class' => 'form-inline'] ).
                Form::submit('delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']).''.Form::close().''
                ;
            })
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = User::select('*');

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->ajax('')
                    ->addAction(['width' => '150px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'nik',
            'nama',
            // add your columns
            'created_at',
            'updated_at',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'userdatatables_' . time();
    }
}

<?php

namespace App\DataTables;

use App\Models\Role;
use Yajra\Datatables\Services\DataTable;
use URL,Form;
class RoleDataTable extends DataTable
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
                return '<a href="'.URL::to('role/'.$query->id.'/edit/').'" class="btn btn-primary btn-xs">Edit</a>' .Form::open([
            "method" => "DELETE",
            "id"=>"form-delete",
            "route" => ["role.destroy", $query->id],
            "style" => "display:inline"
            ])
            .Form::submit('delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']).'';
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
        $query = Role::select('*');

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
            'nama_role',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'roledatatables_' . time();
    }
}

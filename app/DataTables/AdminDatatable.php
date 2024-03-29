<?php

namespace App\DataTables;

use App\Admin;
use Yajra\DataTables\Services\DataTable;

class AdminDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('checkbox', 'admin.admins.btn.checkbox')
            ->addColumn('edit', 'admin.admins.btn.edit')
            ->addColumn('delete', 'admin.admins.btn.delete')
            ->rawColumns([
                'edit',
                'delete',
                'checkbox',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Admin::query();
    }
   

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                   // ->addAction(['width' => '80px'])
                   // ->parameters($this->getBuilderParameters());
                    ->parameters([

                        'dom'=>'Blfrtip',
                        'lengthMenu'=>[[10,25,50,100], [10, 25, 50, trans('admin.all_record')]],
                        'buttons'=>[
                                ['extend'=>'print', 'className'=>'btn btn-primary', 'text'=>'<i class="fa fa-print"></i>'.' '.trans('admin.print')],
                                ['extend'=>'csv', 'className'=>'btn btn-info', 'text'=>'<i class="fa fa-file"></i>'.' '.trans('admin.csv')],
                                ['extend'=>'excel', 'className'=>'btn btn-success', 'text'=>'<i class="fa fa-file"></i>'.' '.trans('admin.excel')],
                                ['extend'=>'reload', 'className'=>'btn btn-default', 'text'=>'<i class="fa fa-refresh"></i>'.' '.trans('admin.refresh')],
                                
                        ],
                        'initComplete'=>'function () {
                                            this.api().columns([2,3,4]).every(function () {
                                                var column = this;
                                                var input = document.createElement("input");
                                                $(input).appendTo($(column.footer()).empty())
                                                .on("keyup", function () {
                                                    column.search($(this).val(), false, false, true).draw();
                                                });
                                            });
                                        }',

                        'language'=>  datatable_lang(),

                      
                  

                    ]);
    } 

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        

        return [
          [
            'name'          =>'checkbox',
            'data'          =>'checkbox',
            'title'         =>'<input type="checkbox" class="check_all" onclick="check_all()" />',
            'exportable'    =>false,
            'printable'     =>false,
            'orderable'     =>false,
            'searchable'    =>false,

          ],[
            'name'  =>'id',
            'data'  =>'id',
            'title' =>'#',
          ],[
            'name'  =>'first_name',
            'data'  =>'first_name',
            'title' =>trans('admin.first_name'),
          ],[
            'name'  =>'last_name',
            'data'  =>'last_name',
            'title' =>trans('admin.last_name'),
          ],[
            'name'  =>'email',
            'data'  =>'email',
            'title' =>trans('admin.admin_email'),
          ],[
            'name'  =>'created_at',
            'data'  =>'created_at',
            'title' =>trans('admin.created_at'),
          ],[
            'name'  =>'updated_at',
            'data'  =>'updated_at',
            'title' =>trans('admin.updated_at'),
          ],[
            'name'          =>'edit',
            'data'          =>'edit',
            'title'         =>trans('admin.edit'),
            'exportable'    =>false,
            'printable'     =>false,
            'orderable'     =>false,
            'searchable'    =>false,
          ],[
            'name'          =>'delete',
            'data'          =>'delete',
            'title'         =>trans('admin.delete'),
            'exportable'    =>false,
            'printable'     =>false,
            'orderable'     =>false,
            'searchable'    =>false,
          ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin_' . date('YmdHis');
    }
}

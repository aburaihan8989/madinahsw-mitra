<?php

namespace Modules\Report\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Modules\Report\Entities\Activity;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ActivityDataTable extends DataTable
{

    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->editColumn('date_activity', function($model){
                $formatDate = date('d-m-Y',strtotime($model->date_activity));
                return $formatDate;
            })
            ->addColumn('agent_name', function ($data) {
                return $data->agent_code . ' | ' . $data->agent_name;
            })
            ->addColumn('action', function ($data) {
                return view('reports::activity.partials.actions', compact('data'));
            });
    }

    public function query(Activity $model) {
        return $model->newQuery()->where('agent_id',  auth()->user()->agent_id);
    }


    public function html() {
        return $this->builder()
            ->setTableId('activities-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-md-3'l><'col-md-5 mb-2'B><'col-md-4'f>> .
                                'tr' .
                                <'row'<'col-md-5'i><'col-md-7 mt-2'p>>")
            ->orderBy(2)
            ->buttons(
                Button::make('excel')
                    ->text('<i class="bi bi-file-earmark-excel-fill"></i> Excel'),
                Button::make('print')
                    ->text('<i class="bi bi-printer-fill"></i> Print'),
                Button::make('reset')
                    ->text('<i class="bi bi-x-circle"></i> Reset'),
                Button::make('reload')
                    ->text('<i class="bi bi-arrow-repeat"></i> Reload')
            );
    }

    protected function getColumns() {
        return [
            Column::make('row_number')
                ->title('No')
                ->render('meta.row + meta.settings._iDisplayStart + 1;')
                ->width(50)
                ->orderable(false)
                ->searchable(false)
                ->className('text-center align-middle'),

            Column::make('reference')
                ->title('ID Reference')
                ->className('text-center align-middle'),

            Column::make('date_activity')
                ->title('Activity Date')
                ->className('text-center align-middle'),

            Column::computed('agent_name')
                ->title('Agent Name')
                ->className('text-center align-middle'),

            Column::make('detail_activity')
                ->title('Activity Details')
                ->className('text-center align-middle'),

            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->className('text-center align-middle'),

            Column::make('created_at')
                ->visible(false)
        ];
    }

    protected function filename(): string {
        return 'Activity_' . date('YmdHis');
    }
}

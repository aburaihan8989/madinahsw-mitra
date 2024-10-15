<?php

namespace Modules\Study\DataTables;


use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Modules\Study\Entities\Surat;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SuratsDataTable extends DataTable
{

    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($data) {
                return view('study::surat.partials.actions', compact('data'));
            });
    }

    public function query(Surat $model) {
        return $model->newQuery();
    }

    public function html() {
        return $this->builder()
            ->setTableId('surats-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-md-3'l><'col-md-5 mb-2'B><'col-md-4'f>> .
                                       'tr' .
                                 <'row'<'col-md-5'i><'col-md-7 mt-2'p>>")
            ->orderBy(1)
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

            Column::make('surat_code')
                ->title('Kode Surat')
                ->width(300)
                ->className('text-center align-middle'),

            Column::make('surat_name')
                ->title('Nama Surat')
                ->className('text-center align-middle'),

            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(300)
                ->className('text-center align-middle'),

            Column::make('created_at')
                ->visible(false)
        ];
    }

    protected function filename(): string {
        return 'Surats_' . date('YmdHis');
    }
}

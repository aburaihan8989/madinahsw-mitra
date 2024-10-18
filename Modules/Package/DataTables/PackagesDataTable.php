<?php

namespace Modules\Package\DataTables;


use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Modules\Package\Entities\Package;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PackagesDataTable extends DataTable
{

    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->editColumn('package_date', function($data){
                $formatDate = date('d-m-Y',strtotime($data->package_date));
                return $formatDate;
            })
            ->editColumn('package_day', function($data){
                $formatData = $data->package_day . ' Hari';
                return $formatData;
            })
            ->addColumn('tambah_jamaah', function ($data) {
                return view('package::packages.partials.actions-customer', compact('data'));
            })
            ->addColumn('package_status', function ($data) {
                return view('package::packages.partials.status', compact('data'));
            })
            ->addColumn('action', function ($data) {
                return view('package::packages.partials.actions', compact('data'));
            });
    }

    public function query(Package $model) {
        if (auth()->user()->id == 1) {
            return $model->newQuery();
        } else {
            return $model->newQuery()->where('mitra_id', auth()->user()->id);
        }
    }

    public function html() {
        return $this->builder()
            ->setTableId('packages-table')
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
            Column::make('id')
                ->visible(false),

            Column::make('row_number')
                ->title('No')
                ->render('meta.row + meta.settings._iDisplayStart + 1;')
                ->width(50)
                ->orderable(false)
                ->searchable(false)
                ->className('text-center align-middle'),

            Column::make('package_code')
                ->title('Kode Keberangkatan')
                ->width(120)
                ->className('text-center align-middle'),

            Column::make('package_name')
                ->title('Nama Keberangkatan')
                ->className('text-center align-middle'),

            Column::make('package_date')
                ->title('Tanggal Keberangkatan')
                ->width(120)
                ->className('text-center align-middle'),

            Column::make('package_day')
                ->title('Jumlah Hari')
                ->width(120)
                ->className('text-center align-middle'),

            Column::make('package_status')
                ->title('Status')
                ->width(100)
                ->className('text-center align-middle'),

            Column::make('tambah_jamaah')
                ->title('Data Manifest')
                ->width(150)
                ->className('text-center align-middle'),

            Column::make('mitra_name')
                ->title('Register By')
                ->className('text-center align-middle'),

            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->className('text-center align-middle'),

            Column::make('created_at')
                ->visible(false)
        ];
    }

    protected function filename(): string {
        return 'Packages_' . date('YmdHis');
    }
}

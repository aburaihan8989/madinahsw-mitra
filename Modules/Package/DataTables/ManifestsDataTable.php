<?php

namespace Modules\Package\DataTables;


use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Modules\People\Entities\Customer;
use Modules\Package\Entities\Manifest;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ManifestsDataTable extends DataTable
{

    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->addColumn('customer_code', function ($data) {
                return Customer::findOrFail($data->customer_id)->customer_kode;
            })
            ->addColumn('customer_ktp_name', function ($data) {
                return Customer::findOrFail($data->customer_id)->customer_ktp_name;
            })
            ->addColumn('customer_paspor_name', function ($data) {
                return Customer::findOrFail($data->customer_id)->customer_paspor_name;
            })
            ->addColumn('customer_paspor_number', function ($data) {
                return Customer::findOrFail($data->customer_id)->customer_paspor_number;
            })
            ->editColumn('customer_paspor_expired', function($model){
                $formatDate = date('d-m-Y',strtotime(Customer::findOrFail($model->customer_id)->customer_paspor_tgl_habis));
                return $formatDate;
            })
            ->addColumn('visa', function ($data) {
                return view('package::manifests.partials.status-visa', compact('data'));
            })
            ->addColumn('siskopatuh', function ($data) {
                return view('package::manifests.partials.status-siskopatuh', compact('data'));
            })
            ->addColumn('hotel', function ($data) {
                return view('package::manifests.partials.status-hotel', compact('data'));
            })
            ->addColumn('action', function ($data) {
                return view('package::manifests.partials.actions', compact('data'));
            });
    }

    public function query(Manifest $model) {
        return $model->newQuery()->where('package_id', request()->route('id'));
    }

    public function html() {
        return $this->builder()
            ->setTableId('manifests-table')
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

            Column::make('customer_code')
                ->title('Kode Jamaah')
                ->width(120)
                ->className('text-center align-middle'),

            Column::make('customer_ktp_name')
                ->title('Nama Jamaah (KTP)')
                ->className('text-center align-middle'),

            Column::make('customer_paspor_name')
                ->title('Nama Jamaah (PASPOR)')
                ->className('text-center align-middle'),

            Column::make('customer_paspor_number')
                ->title('Nomor Paspor')
                ->width(120)
                ->className('text-center align-middle'),

            Column::make('customer_paspor_expired')
                ->title('Expired Paspor')
                ->width(120)
                ->className('text-center align-middle'),

            Column::computed('visa')
                ->title('Visa')
                ->className('text-center'),

            Column::computed('siskopatuh')
                ->title('Siskopatuh')
                ->className('text-center'),

            Column::computed('hotel')
                ->title('Hotel')
                ->className('text-center'),

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
        return 'Manifests_' . date('YmdHis');
    }
}

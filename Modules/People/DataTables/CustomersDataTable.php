<?php

namespace Modules\People\DataTables;


use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Modules\People\Entities\Customer;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CustomersDataTable extends DataTable
{

    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->addColumn('customer_ktp_gender', function ($data) {
                return $data->customer_ktp_gender == 'L' ? 'Laki-Laki' : 'Perempuan';
            })
            ->addColumn('action', function ($data) {
                return view('people::customers.partials.actions', compact('data'));
            });
    }

    public function query(Customer $model) {
        if (auth()->user()->id == 1) {
            return $model->newQuery();
        } else {
            return $model->newQuery()->where('mitra_id', auth()->user()->id);
        }
    }

    public function html() {
        return $this->builder()
            ->setTableId('customers-table')
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

            Column::make('customer_kode')
                ->title('Kode Jamaah')
                ->className('text-center align-middle'),

            Column::make('customer_ktp_nik')
                ->title('NIK Jamaah')
                ->className('text-center align-middle'),

            Column::make('customer_ktp_name')
                ->title('Nama Jamaah')
                ->className('text-center align-middle'),

            Column::make('customer_phone')
                ->title('Kontak Jamaah')
                ->className('text-center align-middle'),

            Column::make('customer_ktp_gender')
                ->title('Jenis Kelamin')
                ->className('text-center align-middle'),

            Column::make('customer_ktp_city')
                ->title('Kota / Kabupaten')
                ->className('text-center align-middle'),

            Column::make('mitra_name')
                ->title('Nama Mitra')
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
        return 'Customers_' . date('YmdHis');
    }
}

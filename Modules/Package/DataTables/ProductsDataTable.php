<?php

namespace Modules\Package\DataTables;


use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Modules\Package\Entities\Product;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductsDataTable extends DataTable
{

    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->addColumn('product_cost', function ($data) {
                return format_currency2($data->product_cost);
            })
            ->addColumn('product_price1', function ($data) {
                return format_currency2($data->product_price1);
            })
            ->addColumn('product_price2', function ($data) {
                return format_currency2($data->product_price2);
            })
            // ->addColumn('product_price3', function ($data) {
            //     return format_currency2($data->product_price3);
            // })
            ->addColumn('product_category', function ($data) {
                return $data->product_category == '1' ? 'Visa' : ($data->product_category == '2' ? 'Hotel' : 'Siskopatuh');
            })
            ->addColumn('product_active', function ($data) {
                return view('package::products.partials.status', compact('data'));
            })
            ->addColumn('action', function ($data) {
                return view('package::products.partials.actions', compact('data'));
            });
    }

    public function query(Product $model) {
        return $model->newQuery();
    }

    public function html() {
        return $this->builder()
            ->setTableId('products-table')
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

            Column::make('product_code')
                ->title('Kode Layanan')
                ->width(100)
                ->className('text-center align-middle'),

            Column::make('product_name')
                ->title('Nama Layanan')
                ->className('text-center align-middle'),

            Column::computed('product_cost')
                ->title('Harga Dasar')
                ->width(100)
                ->className('text-center align-middle'),

            Column::computed('product_price1')
                ->title('Harga < 35 Pax')
                ->width(130)
                ->className('text-center align-middle'),

            Column::computed('product_price2')
                ->title('Harga > 35 Pax')
                ->width(130)
                ->className('text-center align-middle'),

            Column::computed('product_category')
                ->title('Kategori')
                ->width(120)
                ->className('text-center align-middle'),

            Column::computed('product_active')
                ->title('Status')
                ->width(120)
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
        return 'Products_' . date('YmdHis');
    }
}

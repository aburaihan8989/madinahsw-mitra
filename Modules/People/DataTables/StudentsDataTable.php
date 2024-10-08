<?php

namespace Modules\People\DataTables;


use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Modules\People\Entities\Student;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StudentsDataTable extends DataTable
{

    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->addColumn('student_gender', function ($data) {
                return $data->student_gender == 'L' ? 'Laki-Laki' : 'Perempuan';
            })
            ->addColumn('student_active', function ($data) {
                return view('people::students.partials.status', compact('data'));
            })
            ->addColumn('action', function ($data) {
                return view('people::students.partials.actions', compact('data'));
            });
    }

    public function query(Student $model) {
        return $model->newQuery();
    }

    public function html() {
        return $this->builder()
            ->setTableId('students-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-md-3'l><'col-md-5 mb-2'B><'col-md-4'f>> .
                                       'tr' .
                                 <'row'<'col-md-5'i><'col-md-7 mt-2'p>>")
            ->orderBy(0)
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

            Column::make('student_kode')
                ->title('Kode Siswa')
                ->className('text-center align-middle'),

            Column::make('student_nis')
                ->title('NIS Siswa')
                ->className('text-center align-middle'),

            Column::make('student_name')
                ->title('Nama Siswa')
                ->className('text-center align-middle'),

            Column::make('student_phone')
                ->title('Kontak Siswa')
                ->className('text-center align-middle'),

            Column::make('student_gender')
                ->title('Gender')
                ->className('text-center align-middle'),

            Column::make('student_city')
                ->title('Kota / Kabupaten')
                ->className('text-center align-middle'),

            Column::make('student_active')
                ->title('Status')
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
        return 'Students_' . date('YmdHis');
    }
}

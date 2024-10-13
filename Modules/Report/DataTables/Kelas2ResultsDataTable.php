<?php

namespace Modules\Report\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Modules\Study\Entities\Studie;
use Modules\People\Entities\Student;
use Modules\People\Entities\Teacher;
use Modules\Report\Entities\Kelas2Result;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class Kelas2ResultsDataTable extends DataTable
{

    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->editColumn('kelas2_result_date', function($model){
                $formatDate = date('d-m-Y',strtotime($model->kelas2_result_date));
                return $formatDate;
            })
            ->addColumn('kelas2_result_student_id', function ($data) {
                return Student::findOrFail($data->kelas2_result_student_id)->student_kode . ' | ' . Student::findOrFail($data->kelas2_result_student_id)->student_name;
            })
            ->addColumn('kelas2_result_teacher_id', function ($data) {
                return Teacher::findOrFail($data->kelas2_result_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($data->kelas2_result_teacher_id)->teacher_name;
            })
            ->addColumn('kelas2_result_studi_id', function ($data) {
                return Studie::findOrFail($data->kelas2_result_studi_id)->studi_code . ' | ' . Studie::findOrFail($data->kelas2_result_studi_id)->studi_name;
            })
            ->addColumn('action', function ($data) {
                return view('report::kelas2-result.partials.actions', compact('data'));
            });
    }

    public function query(Kelas2Result $model) {
        return $model->newQuery();
        // return $model->newQuery()->where('agent_id',  auth()->user()->agent_id);
    }


    public function html() {
        return $this->builder()
            ->setTableId('kelas2-results-table')
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

            Column::make('kelas2_result_code')
                ->title('Kode Result')
                ->className('text-center align-middle'),

            Column::make('kelas2_result_date')
                ->title('Tanggal Result')
                ->className('text-center align-middle'),

            Column::make('kelas2_result_student_name')
                ->title('Nama Siswa')
                ->className('text-center align-middle'),

            Column::make('kelas2_result_studi_name')
                ->title('Nama Pelajaran')
                ->className('text-center align-middle'),

            Column::make('kelas2_result_teacher_name')
                ->title('Nama Pengajar')
                ->className('text-center align-middle'),

            Column::make('kelas2_result_book1')
                ->title('Nama IQRA')
                ->className('text-center align-middle'),

            Column::make('kelas2_result_book2')
                ->title('Halaman')
                ->className('text-center align-middle'),

            Column::make('kelas2_result_value1')
                ->title('Nilai Pagi')
                ->className('text-center align-middle'),

            Column::make('kelas2_result_value2')
                ->title('Nilai Siang')
                ->className('text-center align-middle'),

            Column::make('kelas2_result_value3')
                ->title('Nilai Sore')
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
        return 'Kelas2Results_' . date('YmdHis');
    }
}

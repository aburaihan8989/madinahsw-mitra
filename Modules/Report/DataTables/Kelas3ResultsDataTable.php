<?php

namespace Modules\Report\DataTables;

use Modules\Study\Entities\Juz;
use Modules\Study\Entities\Surat;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Modules\Study\Entities\Studie;
use Modules\People\Entities\Student;
use Modules\People\Entities\Teacher;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Modules\Report\Entities\Kelas3Result;

class Kelas3ResultsDataTable extends DataTable
{

    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->editColumn('kelas3_result_date', function($model){
                $formatDate = date('d-m-Y',strtotime($model->kelas3_result_date));
                return $formatDate;
            })
            ->addColumn('kelas3_result_book1', function ($data) {
                return Juz::findOrFail($data->kelas3_result_book1)->juz_name;
            })
            ->addColumn('kelas3_result_book2', function ($data) {
                return Surat::findOrFail($data->kelas3_result_book2)->surat_name;
            })
            ->addColumn('kelas3_result_student_id', function ($data) {
                return Student::findOrFail($data->kelas3_result_student_id)->student_kode . ' | ' . Student::findOrFail($data->kelas3_result_student_id)->student_name;
            })
            ->addColumn('kelas3_result_teacher_id', function ($data) {
                return Teacher::findOrFail($data->kelas3_result_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($data->kelas3_result_teacher_id)->teacher_name;
            })
            ->addColumn('kelas3_result_studi_id', function ($data) {
                return Studie::findOrFail($data->kelas3_result_studi_id)->studi_code . ' | ' . Studie::findOrFail($data->kelas3_result_studi_id)->studi_name;
            })
            ->addColumn('action', function ($data) {
                return view('report::kelas3-result.partials.actions', compact('data'));
            });
    }

    public function query(Kelas3Result $model) {
        return $model->newQuery();
        // return $model->newQuery()->where('agent_id',  auth()->user()->agent_id);
    }


    public function html() {
        return $this->builder()
            ->setTableId('kelas3-results-table')
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

            Column::make('kelas3_result_code')
                ->title('Kode Result')
                ->className('text-center align-middle'),

            Column::make('kelas3_result_date')
                ->title('Tanggal Result')
                ->className('text-center align-middle'),

            Column::make('kelas3_result_student_name')
                ->title('Nama Siswa')
                ->className('text-center align-middle'),

            Column::make('kelas3_result_studi_name')
                ->title('Nama Pelajaran')
                ->className('text-center align-middle'),

            Column::make('kelas3_result_teacher_name')
                ->title('Nama Pengajar')
                ->className('text-center align-middle'),

            Column::make('kelas3_result_book1')
                ->title('Nama Juz')
                ->className('text-center align-middle'),

            Column::make('kelas3_result_book2')
                ->title('Nama Surat')
                ->className('text-center align-middle'),

            Column::make('kelas3_result_book3')
                ->title('Halaman')
                ->className('text-center align-middle'),

            Column::make('kelas3_result_value1')
                ->title('Nilai Pagi')
                ->className('text-center align-middle'),

            Column::make('kelas3_result_value2')
                ->title('Nilai Siang')
                ->className('text-center align-middle'),

            Column::make('kelas3_result_value3')
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
        return 'Kelas3Results_' . date('YmdHis');
    }
}

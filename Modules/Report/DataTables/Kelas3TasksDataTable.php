<?php

namespace Modules\Report\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Modules\Study\Entities\Studie;
use Modules\People\Entities\Student;
use Modules\People\Entities\Teacher;
use Modules\Report\Entities\Kelas3Task;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class Kelas3TasksDataTable extends DataTable
{

    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->editColumn('kelas3_task_date', function($model){
                $formatDate = date('d-m-Y',strtotime($model->kelas3_task_date));
                return $formatDate;
            })
            ->addColumn('kelas3_task_student_id', function ($data) {
                return Student::findOrFail($data->kelas3_task_student_id)->student_kode . ' | ' . Student::findOrFail($data->kelas3_task_student_id)->student_name;
            })
            ->addColumn('kelas3_task_teacher_id', function ($data) {
                return Teacher::findOrFail($data->kelas3_task_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($data->kelas3_task_teacher_id)->teacher_name;
            })
            ->addColumn('kelas3_task_studi_id', function ($data) {
                return Studie::findOrFail($data->kelas3_task_studi_id)->studi_code . ' | ' . Studie::findOrFail($data->kelas3_task_studi_id)->studi_name;
            })
            ->addColumn('kelas3_task_active', function ($data) {
                return view('report::kelas3-task.partials.status', compact('data'));
            })
            ->addColumn('kelas3_task_input_pagi', function ($data) {
                return view('report::kelas3-task.partials.actions-pagi', compact('data'));
            })
            ->addColumn('kelas3_task_input_siang', function ($data) {
                return view('report::kelas3-task.partials.actions-siang', compact('data'));
            })
            ->addColumn('kelas3_task_input_sore', function ($data) {
                return view('report::kelas3-task.partials.actions-sore', compact('data'));
            })
            ->addColumn('action', function ($data) {
                return view('report::kelas3-task.partials.actions', compact('data'));
            });
    }

    public function query(Kelas3Task $model) {
        return $model->newQuery()->where('kelas3_task_active', 1);
        // return $model->newQuery()->where('agent_id',  auth()->user()->agent_id);
    }


    public function html() {
        return $this->builder()
            ->setTableId('kelas3-tasks-table')
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

            Column::make('kelas3_task_code')
                ->title('Kode Daftar')
                ->className('text-center align-middle'),

            Column::make('kelas3_task_date')
                ->title('Tanggal Terdaftar')
                ->className('text-center align-middle'),

            Column::make('kelas3_task_student_name')
                ->title('Nama Siswa')
                ->className('text-center align-middle'),

            Column::make('kelas3_task_studi_name')
                ->title('Nama Pelajaran')
                ->className('text-center align-middle'),

            Column::make('kelas3_task_teacher_name')
                ->title('Nama Pengajar')
                ->className('text-center align-middle'),

            Column::make('kelas3_task_input_pagi')
                ->title('Nilai Pagi')
                ->className('text-center align-middle'),

            Column::make('kelas3_task_input_siang')
                ->title('Nilai Siang')
                ->className('text-center align-middle'),

            Column::make('kelas3_task_input_sore')
                ->title('Nilai Sore')
                ->className('text-center align-middle'),

            Column::make('kelas3_task_active')
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
        return 'Kelas3Tasks_' . date('YmdHis');
    }
}

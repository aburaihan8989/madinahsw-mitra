<?php

namespace Modules\Report\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Modules\Study\Entities\Studie;
use Modules\People\Entities\Student;
use Modules\People\Entities\Teacher;
use Modules\Report\Entities\Report1Task;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class Report12TasksDataTable extends DataTable
{

    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->editColumn('report1task_date', function($model){
                $formatDate = date('d-m-Y',strtotime($model->report1task_date));
                return $formatDate;
            })
            ->addColumn('report1task_student_id', function ($data) {
                return Student::findOrFail($data->report1task_student_id)->student_kode . ' | ' . Student::findOrFail($data->report1task_student_id)->student_name;
            })
            ->addColumn('report1task_teacher_id', function ($data) {
                return Teacher::findOrFail($data->report1task_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($data->report1task_teacher_id)->teacher_name;
            })
            ->addColumn('report1task_studi_id', function ($data) {
                return Studie::findOrFail($data->report1task_studi_id)->studi_code . ' | ' . Studie::findOrFail($data->report1task_studi_id)->studi_name;
            })
            ->addColumn('report1task_active', function ($data) {
                return view('report::report1.partials.status', compact('data'));
            })
            ->addColumn('input_pagi', function ($data) {
                return view('report::report1.partials.actions-pagi', compact('data'));
            })
            ->addColumn('input_siang', function ($data) {
                return view('report::report1.partials.actions-siang', compact('data'));
            })
            ->addColumn('action', function ($data) {
                return view('report::report1.partials.actions-riwayat', compact('data'));
            });
    }

    public function query(Report1Task $model) {
        return $model->newQuery()->where('report1task_active', '<>', 1);
        // return $model->newQuery()->where('agent_id',  auth()->user()->agent_id);
    }


    public function html() {
        return $this->builder()
            ->setTableId('report1-tasks-table')
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

            Column::make('report1task_code')
                ->title('Kode Daftar')
                ->className('text-center align-middle'),

            Column::make('report1task_date')
                ->title('Tanggal Terdaftar')
                ->className('text-center align-middle'),

            Column::make('report1task_student_name')
                ->title('Nama Siswa')
                ->className('text-center align-middle'),

            Column::make('report1task_studi_name')
                ->title('Nama Pelajaran')
                ->className('text-center align-middle'),

            Column::make('report1task_teacher_name')
                ->title('Nama Pengajar')
                ->className('text-center align-middle'),

            // Column::make('input_pagi')
            //     ->title('Nilai Pagi')
            //     ->className('text-center align-middle'),

            // Column::make('input_siang')
            //     ->title('Nilai Siang')
            //     ->className('text-center align-middle'),

            Column::make('report1task_active')
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
        return 'Report1Tasks_' . date('YmdHis');
    }
}

<?php

namespace Modules\Report\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Study\Entities\Studie;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Modules\People\Entities\Student;
use Modules\People\Entities\Teacher;
use Modules\Report\Entities\Kelas3Task;
use Illuminate\Contracts\Support\Renderable;
use Modules\Report\DataTables\Kelas3TasksDataTable;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Exp;
use Modules\Report\DataTables\Kelas3RiwayatTasksDataTable;

class Kelas3TasksController extends Controller
{

    public function index(Kelas3TasksDataTable $dataTable) {
        // abort_if(Gate::denies('access_report'), 403);

        return $dataTable->render('report::kelas3-task.index');
    }


    public function riwayat(Kelas3RiwayatTasksDataTable $dataTable) {
        // abort_if(Gate::denies('access_report'), 403);

        return $dataTable->render('report::kelas3-task.riwayat');
    }


    public function create() {
        // abort_if(Gate::denies('create_report'), 403);

        return view('report::kelas3-task.create');
    }


    public function store(Request $request) {
        // abort_if(Gate::denies('create_report'), 403);

        $request->validate([
            // 'kelas3_task_date'          => 'required',
            // 'kelas3_task_end_date'      => 'required',
            // 'kelas3_task_student_id'    => 'required',
            // 'kelas3_task_student_name'  => 'required',
            // 'kelas3_task_teacher_id'    => 'required',
            // 'kelas3_task_teacher_name'  => 'required',
            // 'kelas3_task_studi_id'      => 'required',
            // 'kelas3_task_studi_name'    => 'required',
            // 'kelas3_task_class_id'      => 'required',
            // 'kelas3_task_active'        => 'required',
            // 'kelas3_task_note'          => 'required',
        ]);

        $kelas3_task = Kelas3Task::create([
            'kelas3_task_date'          => $request->kelas3_task_date,
            'kelas3_task_student_id'    => $request->kelas3_task_student_id,
            'kelas3_task_student_name'  => Student::findOrFail($request->kelas3_task_student_id)->student_kode . ' | ' . Student::findOrFail($request->kelas3_task_student_id)->student_name,
            'kelas3_task_teacher_id'    => $request->kelas3_task_teacher_id,
            'kelas3_task_teacher_name'  => Teacher::findOrFail($request->kelas3_task_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->kelas3_task_teacher_id)->teacher_name,
            'kelas3_task_studi_id'      => $request->kelas3_task_studi_id,
            'kelas3_task_studi_name'    => Studie::findOrFail($request->kelas3_task_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->kelas3_task_studi_id)->studi_name,
            'kelas3_task_class_id'      => '3',
            'kelas3_task_active'        => $request->kelas3_task_active,
            'kelas3_task_note'          => $request->kelas3_task_note
        ]);

        toast('Daftar Kelas Siswa Created!', 'success');

        return redirect()->route('kelas3-task.index');
    }


    public function edit(Kelas3Task $kelas3_task) {
        // abort_if(Gate::denies('edit_report'), 403);

        return view('report::kelas3-task.edit', compact('kelas3_task'));
    }


    public function update(Request $request, Kelas3Task $kelas3_task) {
        // abort_if(Gate::denies('update_report'), 403);

        $request->validate([
            // 'kelas3_task_date'          => 'required',
            // 'kelas3_task_end_date'      => 'required',
            // 'kelas3_task_student_id'    => 'required',
            // 'kelas3_task_student_name'  => 'required',
            // 'kelas3_task_teacher_id'    => 'required',
            // 'kelas3_task_teacher_name'  => 'required',
            // 'kelas3_task_studi_id'      => 'required',
            // 'kelas3_task_studi_name'    => 'required',
            // 'kelas3_task_class_id'      => 'required',
            // 'kelas3_task_active'        => 'required',
            // 'kelas3_task_note'          => 'required',
        ]);

        if ($request->kelas3_task_active == 1) {
            $kelas3_task->update([
                'kelas3_task_date'          => $request->kelas3_task_date,
                'kelas3_task_student_id'    => $request->kelas3_task_student_id,
                'kelas3_task_student_name'  => Student::findOrFail($request->kelas3_task_student_id)->student_kode . ' | ' . Student::findOrFail($request->kelas3_task_student_id)->student_name,
                'kelas3_task_teacher_id'    => $request->kelas3_task_teacher_id,
                'kelas3_task_teacher_name'  => Teacher::findOrFail($request->kelas3_task_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->kelas3_task_teacher_id)->teacher_name,
                'kelas3_task_studi_id'      => $request->kelas3_task_studi_id,
                'kelas3_task_studi_name'    => Studie::findOrFail($request->kelas3_task_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->kelas3_task_studi_id)->studi_name,
                'kelas3_task_class_id'      => '3',
                'kelas3_task_active'        => $request->kelas3_task_active,
                'kelas3_task_note'          => $request->kelas3_task_note
            ]);
        } else {
            $kelas3_task->update([
                'kelas3_task_date'          => $request->kelas3_task_date,
                'kelas3_task_end_date'      => Carbon::now()->format('Y-m-d'),
                'kelas3_task_student_id'    => $request->kelas3_task_student_id,
                'kelas3_task_student_name'  => Student::findOrFail($request->kelas3_task_student_id)->student_kode . ' | ' . Student::findOrFail($request->kelas3_task_student_id)->student_name,
                'kelas3_task_teacher_id'    => $request->kelas3_task_teacher_id,
                'kelas3_task_teacher_name'  => Teacher::findOrFail($request->kelas3_task_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->kelas3_task_teacher_id)->teacher_name,
                'kelas3_task_studi_id'      => $request->kelas3_task_studi_id,
                'kelas3_task_studi_name'    => Studie::findOrFail($request->kelas3_task_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->kelas3_task_studi_id)->studi_name,
                'kelas3_task_class_id'      => '3',
                'kelas3_task_active'        => $request->kelas3_task_active,
                'kelas3_task_note'          => $request->kelas3_task_note
            ]);
        }

        toast('Daftar Kelas Siswa Updated!', 'info');

        return redirect()->route('kelas3-task.index');
    }


    public function show(Kelas3Task $kelas3_task) {
        // abort_if(Gate::denies('show_report'), 403);

        return view('report::kelas3-task.show', compact('kelas3_task'));
    }


    // public function destroy(Report1Task $report1) {
    //     // abort_if(Gate::denies('delete_report'), 403);

    //     $report1->delete();

    //     toast('Daftar Siswa Deleted!', 'warning');

    //     return redirect()->route('report1.index');
    // }

}

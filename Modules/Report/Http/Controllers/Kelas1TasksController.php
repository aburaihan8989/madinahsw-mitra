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
use Modules\Report\Entities\Kelas1Task;
use Illuminate\Contracts\Support\Renderable;
use Modules\Report\DataTables\Kelas1TasksDataTable;
use Modules\Report\DataTables\Kelas1RiwayatTasksDataTable;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Exp;

class Kelas1TasksController extends Controller
{

    public function index(Kelas1TasksDataTable $dataTable) {
        // abort_if(Gate::denies('access_report'), 403);

        return $dataTable->render('report::kelas1-task.index');
    }


    public function riwayat(Kelas1RiwayatTasksDataTable $dataTable) {
        // abort_if(Gate::denies('access_report'), 403);

        return $dataTable->render('report::kelas1-task.riwayat');
    }


    public function create() {
        // abort_if(Gate::denies('create_report'), 403);

        return view('report::kelas1-task.create');
    }


    public function store(Request $request) {
        // abort_if(Gate::denies('create_report'), 403);

        $request->validate([
            // 'kelas1_task_date'          => 'required',
            // 'kelas1_task_end_date'      => 'required',
            // 'kelas1_task_student_id'    => 'required',
            // 'kelas1_task_student_name'  => 'required',
            // 'kelas1_task_teacher_id'    => 'required',
            // 'kelas1_task_teacher_name'  => 'required',
            // 'kelas1_task_studi_id'      => 'required',
            // 'kelas1_task_studi_name'    => 'required',
            // 'kelas1_task_class_id'      => 'required',
            // 'kelas1_task_active'        => 'required',
            // 'kelas1_task_note'          => 'required',
        ]);

        $kelas1_task = Kelas1Task::create([
            'kelas1_task_date'          => $request->kelas1_task_date,
            'kelas1_task_student_id'    => $request->kelas1_task_student_id,
            'kelas1_task_student_name'  => Student::findOrFail($request->kelas1_task_student_id)->student_kode . ' | ' . Student::findOrFail($request->kelas1_task_student_id)->student_name,
            'kelas1_task_teacher_id'    => $request->kelas1_task_teacher_id,
            'kelas1_task_teacher_name'  => Teacher::findOrFail($request->kelas1_task_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->kelas1_task_teacher_id)->teacher_name,
            'kelas1_task_studi_id'      => $request->kelas1_task_studi_id,
            'kelas1_task_studi_name'    => Studie::findOrFail($request->kelas1_task_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->kelas1_task_studi_id)->studi_name,
            'kelas1_task_class_id'      => '1',
            'kelas1_task_active'        => $request->kelas1_task_active,
            'kelas1_task_note'          => $request->kelas1_task_note
        ]);

        toast('Daftar Kelas Siswa Created!', 'success');

        return redirect()->route('kelas1-task.index');
    }


    public function edit(Kelas1Task $kelas1_task) {
        // abort_if(Gate::denies('edit_report'), 403);

        return view('report::kelas1-task.edit', compact('kelas1_task'));
    }


    public function update(Request $request, Kelas1Task $kelas1_task) {
        // abort_if(Gate::denies('update_report'), 403);

        $request->validate([
            // 'kelas1_task_date'          => 'required',
            // 'kelas1_task_end_date'      => 'required',
            // 'kelas1_task_student_id'    => 'required',
            // 'kelas1_task_student_name'  => 'required',
            // 'kelas1_task_teacher_id'    => 'required',
            // 'kelas1_task_teacher_name'  => 'required',
            // 'kelas1_task_studi_id'      => 'required',
            // 'kelas1_task_studi_name'    => 'required',
            // 'kelas1_task_class_id'      => 'required',
            // 'kelas1_task_active'        => 'required',
            // 'kelas1_task_note'          => 'required',
        ]);

        if ($request->kelas1_task_active == 1) {
            $kelas1_task->update([
                'kelas1_task_date'          => $request->kelas1_task_date,
                'kelas1_task_student_id'    => $request->kelas1_task_student_id,
                'kelas1_task_student_name'  => Student::findOrFail($request->kelas1_task_student_id)->student_kode . ' | ' . Student::findOrFail($request->kelas1_task_student_id)->student_name,
                'kelas1_task_teacher_id'    => $request->kelas1_task_teacher_id,
                'kelas1_task_teacher_name'  => Teacher::findOrFail($request->kelas1_task_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->kelas1_task_teacher_id)->teacher_name,
                'kelas1_task_studi_id'      => $request->kelas1_task_studi_id,
                'kelas1_task_studi_name'    => Studie::findOrFail($request->kelas1_task_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->kelas1_task_studi_id)->studi_name,
                'kelas1_task_class_id'      => '1',
                'kelas1_task_active'        => $request->kelas1_task_active,
                'kelas1_task_note'          => $request->kelas1_task_note
                ]);
        } else {
            $kelas1_task->update([
                'kelas1_task_date'          => $request->kelas1_task_date,
                'kelas1_task_end_date'      => Carbon::now()->format('Y-m-d'),
                'kelas1_task_student_id'    => $request->kelas1_task_student_id,
                'kelas1_task_student_name'  => Student::findOrFail($request->kelas1_task_student_id)->student_kode . ' | ' . Student::findOrFail($request->kelas1_task_student_id)->student_name,
                'kelas1_task_teacher_id'    => $request->kelas1_task_teacher_id,
                'kelas1_task_teacher_name'  => Teacher::findOrFail($request->kelas1_task_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->kelas1_task_teacher_id)->teacher_name,
                'kelas1_task_studi_id'      => $request->kelas1_task_studi_id,
                'kelas1_task_studi_name'    => Studie::findOrFail($request->kelas1_task_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->kelas1_task_studi_id)->studi_name,
                'kelas1_task_class_id'      => '1',
                'kelas1_task_active'        => $request->kelas1_task_active,
                'kelas1_task_note'          => $request->kelas1_task_note
            ]);
        }

        toast('Daftar Kelas Siswa Updated!', 'info');

        return redirect()->route('kelas1-task.index');
    }


    public function show(Kelas1Task $kelas1_task) {
        // abort_if(Gate::denies('show_report'), 403);

        return view('report::kelas1-task.show', compact('kelas1_task'));
    }


    // public function destroy(Report1Task $report1) {
    //     // abort_if(Gate::denies('delete_report'), 403);

    //     $report1->delete();

    //     toast('Daftar Siswa Deleted!', 'warning');

    //     return redirect()->route('report1.index');
    // }

}

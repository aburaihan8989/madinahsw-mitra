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
use Modules\Report\Entities\Kelas2Task;
use Illuminate\Contracts\Support\Renderable;
use Modules\Report\DataTables\Kelas2TasksDataTable;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Exp;
use Modules\Report\DataTables\Kelas2RiwayatTasksDataTable;

class Kelas2TasksController extends Controller
{

    public function index(Kelas2TasksDataTable $dataTable) {
        // abort_if(Gate::denies('access_report'), 403);

        return $dataTable->render('report::kelas2-task.index');
    }


    public function riwayat(Kelas2RiwayatTasksDataTable $dataTable) {
        // abort_if(Gate::denies('access_report'), 403);

        return $dataTable->render('report::kelas2-task.riwayat');
    }


    public function create() {
        // abort_if(Gate::denies('create_report'), 403);

        return view('report::kelas2-task.create');
    }


    public function store(Request $request) {
        // abort_if(Gate::denies('create_report'), 403);

        $request->validate([
            // 'kelas2_task_date'          => 'required',
            // 'kelas2_task_end_date'      => 'required',
            // 'kelas2_task_student_id'    => 'required',
            // 'kelas2_task_student_name'  => 'required',
            // 'kelas2_task_teacher_id'    => 'required',
            // 'kelas2_task_teacher_name'  => 'required',
            // 'kelas2_task_studi_id'      => 'required',
            // 'kelas2_task_studi_name'    => 'required',
            // 'kelas2_task_class_id'      => 'required',
            // 'kelas2_task_active'        => 'required',
            // 'kelas2_task_note'          => 'required',
        ]);

        $kelas2_task = Kelas2Task::create([
            'kelas2_task_date'          => $request->kelas2_task_date,
            'kelas2_task_student_id'    => $request->kelas2_task_student_id,
            'kelas2_task_student_name'  => Student::findOrFail($request->kelas2_task_student_id)->student_kode . ' | ' . Student::findOrFail($request->kelas2_task_student_id)->student_name,
            'kelas2_task_teacher_id'    => $request->kelas2_task_teacher_id,
            'kelas2_task_teacher_name'  => Teacher::findOrFail($request->kelas2_task_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->kelas2_task_teacher_id)->teacher_name,
            'kelas2_task_studi_id'      => $request->kelas2_task_studi_id,
            'kelas2_task_studi_name'    => Studie::findOrFail($request->kelas2_task_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->kelas2_task_studi_id)->studi_name,
            'kelas2_task_class_id'      => '2',
            'kelas2_task_active'        => $request->kelas2_task_active,
            'kelas2_task_note'          => $request->kelas2_task_note
        ]);

        toast('Daftar Kelas Siswa Created!', 'success');

        return redirect()->route('kelas2-task.index');
    }


    public function edit(Kelas2Task $kelas2_task) {
        // abort_if(Gate::denies('edit_report'), 403);

        return view('report::kelas2-task.edit', compact('kelas2_task'));
    }


    public function update(Request $request, Kelas2Task $kelas2_task) {
        // abort_if(Gate::denies('update_report'), 403);

        $request->validate([
            // 'kelas2_task_date'          => 'required',
            // 'kelas2_task_end_date'      => 'required',
            // 'kelas2_task_student_id'    => 'required',
            // 'kelas2_task_student_name'  => 'required',
            // 'kelas2_task_teacher_id'    => 'required',
            // 'kelas2_task_teacher_name'  => 'required',
            // 'kelas2_task_studi_id'      => 'required',
            // 'kelas2_task_studi_name'    => 'required',
            // 'kelas2_task_class_id'      => 'required',
            // 'kelas2_task_active'        => 'required',
            // 'kelas2_task_note'          => 'required',
        ]);

        if ($request->kelas2_task_active == 1) {
            $kelas2_task->update([
                'kelas2_task_date'          => $request->kelas2_task_date,
                'kelas2_task_student_id'    => $request->kelas2_task_student_id,
                'kelas2_task_student_name'  => Student::findOrFail($request->kelas2_task_student_id)->student_kode . ' | ' . Student::findOrFail($request->kelas2_task_student_id)->student_name,
                'kelas2_task_teacher_id'    => $request->kelas2_task_teacher_id,
                'kelas2_task_teacher_name'  => Teacher::findOrFail($request->kelas2_task_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->kelas2_task_teacher_id)->teacher_name,
                'kelas2_task_studi_id'      => $request->kelas2_task_studi_id,
                'kelas2_task_studi_name'    => Studie::findOrFail($request->kelas2_task_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->kelas2_task_studi_id)->studi_name,
                'kelas2_task_class_id'      => '2',
                'kelas2_task_active'        => $request->kelas2_task_active,
                'kelas2_task_note'          => $request->kelas2_task_note
            ]);
        } else {
            $kelas2_task->update([
                'kelas2_task_date'          => $request->kelas2_task_date,
                'kelas2_task_end_date'      => Carbon::now()->format('Y-m-d'),
                'kelas2_task_student_id'    => $request->kelas2_task_student_id,
                'kelas2_task_student_name'  => Student::findOrFail($request->kelas2_task_student_id)->student_kode . ' | ' . Student::findOrFail($request->kelas2_task_student_id)->student_name,
                'kelas2_task_teacher_id'    => $request->kelas2_task_teacher_id,
                'kelas2_task_teacher_name'  => Teacher::findOrFail($request->kelas2_task_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->kelas2_task_teacher_id)->teacher_name,
                'kelas2_task_studi_id'      => $request->kelas2_task_studi_id,
                'kelas2_task_studi_name'    => Studie::findOrFail($request->kelas2_task_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->kelas2_task_studi_id)->studi_name,
                'kelas2_task_class_id'      => '2',
                'kelas2_task_active'        => $request->kelas2_task_active,
                'kelas2_task_note'          => $request->kelas2_task_note
            ]);
        }

        toast('Daftar Kelas Siswa Updated!', 'info');

        return redirect()->route('kelas2-task.index');
    }


    public function show(Kelas2Task $kelas2_task) {
        // abort_if(Gate::denies('show_report'), 403);

        return view('report::kelas2-task.show', compact('kelas2_task'));
    }


    // public function destroy(Report1Task $report1) {
    //     // abort_if(Gate::denies('delete_report'), 403);

    //     $report1->delete();

    //     toast('Daftar Siswa Deleted!', 'warning');

    //     return redirect()->route('report1.index');
    // }

}

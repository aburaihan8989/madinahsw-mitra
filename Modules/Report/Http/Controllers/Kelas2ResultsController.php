<?php

namespace Modules\Report\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Study\Entities\Studie;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Modules\People\Entities\Student;
use Modules\People\Entities\Teacher;
use Modules\Report\Entities\Kelas2Task;
use Modules\Report\Entities\Kelas2Result;
use Illuminate\Contracts\Support\Renderable;
use Modules\Report\DataTables\Kelas2ResultsDataTable;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Exp;

class Kelas2ResultsController extends Controller
{

    public function index(Kelas2ResultsDataTable $dataTable) {
        // abort_if(Gate::denies('access_report'), 403);

        return $dataTable->render('report::kelas2-result.index');
    }


    public function pagi_create($id) {
        // abort_if(Gate::denies('create_report'), 403);
        $kelas2_result = Kelas2Task::findOrFail($id);

        return view('report::kelas2-result.pagi-create', compact('kelas2_result'));
    }


    public function pagi_store(Request $request) {
        // abort_if(Gate::denies('create_report'), 403);

        $request->validate([
            // 'kelas2_result_task_id'       => 'required',
            // 'kelas2_result_code'          => 'required',
            // 'kelas2_result_date'          => 'required|unique:kelas2_results',
            // 'kelas2_result_time'          => 'required',
            // 'kelas2_result_student_id'    => 'required',
            // 'kelas2_result_student_name'  => 'required',
            // 'kelas2_result_teacher_id'    => 'required',
            // 'kelas2_result_teacher_name'  => 'required',
            // 'kelas2_result_studi_id'      => 'required',
            // 'kelas2_result_studi_name'    => 'required',
            // 'kelas2_result_class_id'      => 'required',
            // 'kelas2_result_book1'         => 'required',
            // 'kelas2_result_book2'         => 'required',
            // 'kelas2_result_value1'        => 'required',
            // 'kelas2_result_value2'        => 'required',
            // 'kelas2_result_value3'        => 'required',
            // 'kelas2_result_value4'        => 'required',
            // 'kelas2_result_note'          => 'required',
        ]);

        $kelas2_result = Kelas2Result::create([
            'kelas2_result_task_id'       => $request->kelas2_result_task_id,
            'kelas2_result_date'          => $request->kelas2_result_date,
            'kelas2_result_student_id'    => $request->kelas2_result_student_id,
            'kelas2_result_student_name'  => Student::findOrFail($request->kelas2_result_student_id)->student_kode . ' | ' . Student::findOrFail($request->kelas2_result_student_id)->student_name,
            'kelas2_result_teacher_id'    => $request->kelas2_result_teacher_id,
            'kelas2_result_teacher_name'  => Teacher::findOrFail($request->kelas2_result_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->kelas2_result_teacher_id)->teacher_name,
            'kelas2_result_studi_id'      => $request->kelas2_result_studi_id,
            'kelas2_result_studi_name'    => Studie::findOrFail($request->kelas2_result_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->kelas2_result_studi_id)->studi_name,
            'kelas2_result_class_id'      => $request->kelas2_result_class_id,
            'kelas2_result_book1'         => $request->kelas2_result_book1,
            'kelas2_result_book2'         => $request->kelas2_result_book2,
            'kelas2_result_value1'        => $request->kelas2_result_value1,
            'kelas2_result_waktu'         => $request->kelas2_result_waktu,
            'kelas2_result_note'          => $request->kelas2_result_note
        ]);

        toast('Input Nilai Pagi Siswa Created!', 'success');

        return redirect()->route('kelas2-task.index');
    }


    public function siang_create($id) {
        // abort_if(Gate::denies('create_report'), 403);
        $kelas2_result = Kelas2Task::findOrFail($id);

        return view('report::kelas2-result.siang-create', compact('kelas2_result'));
    }


    public function siang_store(Request $request) {
        // abort_if(Gate::denies('create_report'), 403);

        $request->validate([
            // 'kelas2_result_task_id'       => 'required',
            // 'kelas2_result_code'          => 'required',
            // 'kelas2_result_date'          => 'required|unique:kelas2_results',
            // 'kelas2_result_time'          => 'required',
            // 'kelas2_result_student_id'    => 'required',
            // 'kelas2_result_student_name'  => 'required',
            // 'kelas2_result_teacher_id'    => 'required',
            // 'kelas2_result_teacher_name'  => 'required',
            // 'kelas2_result_studi_id'      => 'required',
            // 'kelas2_result_studi_name'    => 'required',
            // 'kelas2_result_class_id'      => 'required',
            // 'kelas2_result_book1'         => 'required',
            // 'kelas2_result_book2'         => 'required',
            // 'kelas2_result_value1'        => 'required',
            // 'kelas2_result_value2'        => 'required',
            // 'kelas2_result_value3'        => 'required',
            // 'kelas2_result_value4'        => 'required',
            // 'kelas2_result_note'          => 'required',
        ]);

        $kelas2_result = Kelas2Result::create([
            'kelas2_result_task_id'       => $request->kelas2_result_task_id,
            'kelas2_result_date'          => $request->kelas2_result_date,
            'kelas2_result_student_id'    => $request->kelas2_result_student_id,
            'kelas2_result_student_name'  => Student::findOrFail($request->kelas2_result_student_id)->student_kode . ' | ' . Student::findOrFail($request->kelas2_result_student_id)->student_name,
            'kelas2_result_teacher_id'    => $request->kelas2_result_teacher_id,
            'kelas2_result_teacher_name'  => Teacher::findOrFail($request->kelas2_result_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->kelas2_result_teacher_id)->teacher_name,
            'kelas2_result_studi_id'      => $request->kelas2_result_studi_id,
            'kelas2_result_studi_name'    => Studie::findOrFail($request->kelas2_result_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->kelas2_result_studi_id)->studi_name,
            'kelas2_result_class_id'      => $request->kelas2_result_class_id,
            'kelas2_result_book1'         => $request->kelas2_result_book1,
            'kelas2_result_book2'         => $request->kelas2_result_book2,
            'kelas2_result_value2'        => $request->kelas2_result_value2,
            'kelas2_result_waktu'         => $request->kelas2_result_waktu,
            'kelas2_result_note'          => $request->kelas2_result_note
        ]);

        toast('Input Nilai Siang Siswa Created!', 'success');

        return redirect()->route('kelas2-task.index');
    }


    public function sore_create($id) {
        // abort_if(Gate::denies('create_report'), 403);
        $kelas2_result = Kelas2Task::findOrFail($id);

        return view('report::kelas2-result.sore-create', compact('kelas2_result'));
    }


    public function sore_store(Request $request) {
        // abort_if(Gate::denies('create_report'), 403);

        $request->validate([
            // 'kelas2_result_task_id'       => 'required',
            // 'kelas2_result_code'          => 'required',
            // 'kelas2_result_date'          => 'required|unique:kelas2_results',
            // 'kelas2_result_time'          => 'required',
            // 'kelas2_result_student_id'    => 'required',
            // 'kelas2_result_student_name'  => 'required',
            // 'kelas2_result_teacher_id'    => 'required',
            // 'kelas2_result_teacher_name'  => 'required',
            // 'kelas2_result_studi_id'      => 'required',
            // 'kelas2_result_studi_name'    => 'required',
            // 'kelas2_result_class_id'      => 'required',
            // 'kelas2_result_book1'         => 'required',
            // 'kelas2_result_book2'         => 'required',
            // 'kelas2_result_value1'        => 'required',
            // 'kelas2_result_value2'        => 'required',
            // 'kelas2_result_value3'        => 'required',
            // 'kelas2_result_value4'        => 'required',
            // 'kelas2_result_note'          => 'required',
        ]);

        $kelas2_result = Kelas2Result::create([
            'kelas2_result_task_id'       => $request->kelas2_result_task_id,
            'kelas2_result_date'          => $request->kelas2_result_date,
            'kelas2_result_student_id'    => $request->kelas2_result_student_id,
            'kelas2_result_student_name'  => Student::findOrFail($request->kelas2_result_student_id)->student_kode . ' | ' . Student::findOrFail($request->kelas2_result_student_id)->student_name,
            'kelas2_result_teacher_id'    => $request->kelas2_result_teacher_id,
            'kelas2_result_teacher_name'  => Teacher::findOrFail($request->kelas2_result_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->kelas2_result_teacher_id)->teacher_name,
            'kelas2_result_studi_id'      => $request->kelas2_result_studi_id,
            'kelas2_result_studi_name'    => Studie::findOrFail($request->kelas2_result_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->kelas2_result_studi_id)->studi_name,
            'kelas2_result_class_id'      => $request->kelas2_result_class_id,
            'kelas2_result_book1'         => $request->kelas2_result_book1,
            'kelas2_result_book2'         => $request->kelas2_result_book2,
            'kelas2_result_value3'        => $request->kelas2_result_value3,
            'kelas2_result_waktu'         => $request->kelas2_result_waktu,
            'kelas2_result_note'          => $request->kelas2_result_note
        ]);

        toast('Input Nilai Sore Siswa Created!', 'success');

        return redirect()->route('kelas2-task.index');
    }


    public function edit(Kelas2Result $kelas2_result) {
        // abort_if(Gate::denies('edit_report'), 403);

        return view('report::kelas2-result.edit', compact('kelas2_result'));
    }


    public function update(Request $request, Kelas2Result $kelas2_result) {
        // abort_if(Gate::denies('update_report'), 403);

        $request->validate([
            // 'kelas2_result_task_id'       => 'required',
            // 'kelas2_result_code'          => 'required',
            // 'kelas2_result_date'          => 'required|unique:kelas2_results',
            // 'kelas2_result_time'          => 'required',
            // 'kelas2_result_student_id'    => 'required',
            // 'kelas2_result_student_name'  => 'required',
            // 'kelas2_result_teacher_id'    => 'required',
            // 'kelas2_result_teacher_name'  => 'required',
            // 'kelas2_result_studi_id'      => 'required',
            // 'kelas2_result_studi_name'    => 'required',
            // 'kelas2_result_class_id'      => 'required',
            // 'kelas2_result_book1'         => 'required',
            // 'kelas2_result_book2'         => 'required',
            // 'kelas2_result_value1'        => 'required',
            // 'kelas2_result_value2'        => 'required',
            // 'kelas2_result_value3'        => 'required',
            // 'kelas2_result_value4'        => 'required',
            // 'kelas2_result_note'          => 'required',
        ]);

        $kelas2_result->update([
            'kelas2_result_task_id'       => $request->kelas2_result_task_id,
            'kelas2_result_date'          => $request->kelas2_result_date,
            'kelas2_result_student_id'    => $request->kelas2_result_student_id,
            'kelas2_result_student_name'  => Student::findOrFail($request->kelas2_result_student_id)->student_kode . ' | ' . Student::findOrFail($request->kelas2_result_student_id)->student_name,
            'kelas2_result_teacher_id'    => $request->kelas2_result_teacher_id,
            'kelas2_result_teacher_name'  => Teacher::findOrFail($request->kelas2_result_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->kelas2_result_teacher_id)->teacher_name,
            'kelas2_result_studi_id'      => $request->kelas2_result_studi_id,
            'kelas2_result_studi_name'    => Studie::findOrFail($request->kelas2_result_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->kelas2_result_studi_id)->studi_name,
            'kelas2_result_class_id'      => $request->kelas2_result_class_id,
            'kelas2_result_book1'         => $request->kelas2_result_book1,
            'kelas2_result_book2'         => $request->kelas2_result_book2,
            'kelas2_result_value1'        => $request->kelas2_result_value1,
            'kelas2_result_value2'        => $request->kelas2_result_value2,
            'kelas2_result_value3'        => $request->kelas2_result_value3,
            'kelas2_result_waktu'         => $request->kelas2_result_waktu,
            'kelas2_result_note'          => $request->kelas2_result_note
        ]);

        if ($request->kelas2_result_waktu == 1) {
            toast('Edit Nilai Pagi Siswa Updated!', 'success');
        } elseif ($request->kelas2_result_waktu == 2) {
            toast('Edit Nilai Siang Siswa Updated!', 'success');
        } else {
            toast('Edit Nilai Sore Siswa Updated!', 'success');
        }

        return redirect()->route('kelas2-result.index');
    }


    public function show(Kelas2Result $kelas2_result) {
        // abort_if(Gate::denies('show_report'), 403);

        return view('report::kelas2-result.show', compact('kelas2_result'));
    }


    // public function destroy(Report1Task $report1) {
    //     // abort_if(Gate::denies('delete_report'), 403);

    //     $report1->delete();

    //     toast('Daftar Siswa Deleted!', 'warning');

    //     return redirect()->route('result1.index');
    // }

}

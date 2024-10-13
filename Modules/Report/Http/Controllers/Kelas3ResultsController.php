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
use Modules\Report\Entities\Kelas3Task;
use Modules\Report\Entities\Kelas3Result;
use Illuminate\Contracts\Support\Renderable;
use Modules\Report\DataTables\Kelas3ResultsDataTable;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Exp;

class Kelas3ResultsController extends Controller
{

    public function index(Kelas3ResultsDataTable $dataTable) {
        // abort_if(Gate::denies('access_report'), 403);

        return $dataTable->render('report::kelas3-result.index');
    }


    public function pagi_create($id) {
        // abort_if(Gate::denies('create_report'), 403);
        $kelas3_result = Kelas3Task::findOrFail($id);

        return view('report::kelas3-result.pagi-create', compact('kelas3_result'));
    }


    public function pagi_store(Request $request) {
        // abort_if(Gate::denies('create_report'), 403);

        $request->validate([
            // 'kelas3_result_task_id'       => 'required',
            // 'kelas3_result_code'          => 'required',
            // 'kelas3_result_date'          => 'required|unique:kelas3_results',
            // 'kelas3_result_time'          => 'required',
            // 'kelas3_result_student_id'    => 'required',
            // 'kelas3_result_student_name'  => 'required',
            // 'kelas3_result_teacher_id'    => 'required',
            // 'kelas3_result_teacher_name'  => 'required',
            // 'kelas3_result_studi_id'      => 'required',
            // 'kelas3_result_studi_name'    => 'required',
            // 'kelas3_result_class_id'      => 'required',
            // 'kelas3_result_book1'         => 'required',
            // 'kelas3_result_book2'         => 'required',
            // 'kelas3_result_book3'         => 'required',
            // 'kelas3_result_value1'        => 'required',
            // 'kelas3_result_value2'        => 'required',
            // 'kelas3_result_value3'        => 'required',
            // 'kelas3_result_value4'        => 'required',
            // 'kelas3_result_note'          => 'required',
        ]);

        $kelas3_result = Kelas3Result::create([
            'kelas3_result_task_id'       => $request->kelas3_result_task_id,
            'kelas3_result_date'          => $request->kelas3_result_date,
            'kelas3_result_student_id'    => $request->kelas3_result_student_id,
            'kelas3_result_student_name'  => Student::findOrFail($request->kelas3_result_student_id)->student_kode . ' | ' . Student::findOrFail($request->kelas3_result_student_id)->student_name,
            'kelas3_result_teacher_id'    => $request->kelas3_result_teacher_id,
            'kelas3_result_teacher_name'  => Teacher::findOrFail($request->kelas3_result_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->kelas3_result_teacher_id)->teacher_name,
            'kelas3_result_studi_id'      => $request->kelas3_result_studi_id,
            'kelas3_result_studi_name'    => Studie::findOrFail($request->kelas3_result_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->kelas3_result_studi_id)->studi_name,
            'kelas3_result_class_id'      => $request->kelas3_result_class_id,
            'kelas3_result_book1'         => $request->kelas3_result_book1,
            'kelas3_result_book2'         => $request->kelas3_result_book2,
            'kelas3_result_book3'         => $request->kelas3_result_book3,
            'kelas3_result_value1'        => $request->kelas3_result_value1,
            'kelas3_result_waktu'         => $request->kelas3_result_waktu,
            'kelas3_result_note'          => $request->kelas3_result_note
        ]);

        toast('Input Nilai Pagi Siswa Created!', 'success');

        return redirect()->route('kelas3-task.index');
    }


    public function siang_create($id) {
        // abort_if(Gate::denies('create_report'), 403);
        $kelas3_result = Kelas3Task::findOrFail($id);

        return view('report::kelas3-result.siang-create', compact('kelas3_result'));
    }


    public function siang_store(Request $request) {
        // abort_if(Gate::denies('create_report'), 403);

        $request->validate([
            // 'kelas3_result_task_id'       => 'required',
            // 'kelas3_result_code'          => 'required',
            // 'kelas3_result_date'          => 'required|unique:kelas3_results',
            // 'kelas3_result_time'          => 'required',
            // 'kelas3_result_student_id'    => 'required',
            // 'kelas3_result_student_name'  => 'required',
            // 'kelas3_result_teacher_id'    => 'required',
            // 'kelas3_result_teacher_name'  => 'required',
            // 'kelas3_result_studi_id'      => 'required',
            // 'kelas3_result_studi_name'    => 'required',
            // 'kelas3_result_class_id'      => 'required',
            // 'kelas3_result_book1'         => 'required',
            // 'kelas3_result_book2'         => 'required',
            // 'kelas3_result_book3'         => 'required',
            // 'kelas3_result_value1'        => 'required',
            // 'kelas3_result_value2'        => 'required',
            // 'kelas3_result_value3'        => 'required',
            // 'kelas3_result_value4'        => 'required',
            // 'kelas3_result_note'          => 'required',
        ]);

        $kelas3_result = Kelas3Result::create([
            'kelas3_result_task_id'       => $request->kelas3_result_task_id,
            'kelas3_result_date'          => $request->kelas3_result_date,
            'kelas3_result_student_id'    => $request->kelas3_result_student_id,
            'kelas3_result_student_name'  => Student::findOrFail($request->kelas3_result_student_id)->student_kode . ' | ' . Student::findOrFail($request->kelas3_result_student_id)->student_name,
            'kelas3_result_teacher_id'    => $request->kelas3_result_teacher_id,
            'kelas3_result_teacher_name'  => Teacher::findOrFail($request->kelas3_result_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->kelas3_result_teacher_id)->teacher_name,
            'kelas3_result_studi_id'      => $request->kelas3_result_studi_id,
            'kelas3_result_studi_name'    => Studie::findOrFail($request->kelas3_result_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->kelas3_result_studi_id)->studi_name,
            'kelas3_result_class_id'      => $request->kelas3_result_class_id,
            'kelas3_result_book1'         => $request->kelas3_result_book1,
            'kelas3_result_book2'         => $request->kelas3_result_book2,
            'kelas3_result_book3'         => $request->kelas3_result_book3,
            'kelas3_result_value2'        => $request->kelas3_result_value2,
            'kelas3_result_waktu'         => $request->kelas3_result_waktu,
            'kelas3_result_note'          => $request->kelas3_result_note
        ]);

        toast('Input Nilai Siang Siswa Created!', 'success');

        return redirect()->route('kelas3-task.index');
    }


    public function sore_create($id) {
        // abort_if(Gate::denies('create_report'), 403);
        $kelas3_result = Kelas3Task::findOrFail($id);

        return view('report::kelas3-result.sore-create', compact('kelas3_result'));
    }


    public function sore_store(Request $request) {
        // abort_if(Gate::denies('create_report'), 403);

        $request->validate([
            // 'kelas3_result_task_id'       => 'required',
            // 'kelas3_result_code'          => 'required',
            // 'kelas3_result_date'          => 'required|unique:kelas3_results',
            // 'kelas3_result_time'          => 'required',
            // 'kelas3_result_student_id'    => 'required',
            // 'kelas3_result_student_name'  => 'required',
            // 'kelas3_result_teacher_id'    => 'required',
            // 'kelas3_result_teacher_name'  => 'required',
            // 'kelas3_result_studi_id'      => 'required',
            // 'kelas3_result_studi_name'    => 'required',
            // 'kelas3_result_class_id'      => 'required',
            // 'kelas3_result_book1'         => 'required',
            // 'kelas3_result_book2'         => 'required',
            // 'kelas3_result_book3'         => 'required',
            // 'kelas3_result_value1'        => 'required',
            // 'kelas3_result_value2'        => 'required',
            // 'kelas3_result_value3'        => 'required',
            // 'kelas3_result_value4'        => 'required',
            // 'kelas3_result_note'          => 'required',
        ]);

        $kelas3_result = Kelas3Result::create([
            'kelas3_result_task_id'       => $request->kelas3_result_task_id,
            'kelas3_result_date'          => $request->kelas3_result_date,
            'kelas3_result_student_id'    => $request->kelas3_result_student_id,
            'kelas3_result_student_name'  => Student::findOrFail($request->kelas3_result_student_id)->student_kode . ' | ' . Student::findOrFail($request->kelas3_result_student_id)->student_name,
            'kelas3_result_teacher_id'    => $request->kelas3_result_teacher_id,
            'kelas3_result_teacher_name'  => Teacher::findOrFail($request->kelas3_result_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->kelas3_result_teacher_id)->teacher_name,
            'kelas3_result_studi_id'      => $request->kelas3_result_studi_id,
            'kelas3_result_studi_name'    => Studie::findOrFail($request->kelas3_result_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->kelas3_result_studi_id)->studi_name,
            'kelas3_result_class_id'      => $request->kelas3_result_class_id,
            'kelas3_result_book1'         => $request->kelas3_result_book1,
            'kelas3_result_book2'         => $request->kelas3_result_book2,
            'kelas3_result_book3'         => $request->kelas3_result_book3,
            'kelas3_result_value3'        => $request->kelas3_result_value3,
            'kelas3_result_waktu'         => $request->kelas3_result_waktu,
            'kelas3_result_note'          => $request->kelas3_result_note
        ]);

        toast('Input Nilai Sore Siswa Created!', 'success');

        return redirect()->route('kelas3-task.index');
    }


    public function edit(Kelas3Result $kelas3_result) {
        // abort_if(Gate::denies('edit_report'), 403);

        return view('report::kelas3-result.edit', compact('kelas3_result'));
    }


    public function update(Request $request, Kelas3Result $kelas3_result) {
        // abort_if(Gate::denies('update_report'), 403);

        $request->validate([
            // 'kelas3_result_task_id'       => 'required',
            // 'kelas3_result_code'          => 'required',
            // 'kelas3_result_date'          => 'required|unique:kelas3_results',
            // 'kelas3_result_time'          => 'required',
            // 'kelas3_result_student_id'    => 'required',
            // 'kelas3_result_student_name'  => 'required',
            // 'kelas3_result_teacher_id'    => 'required',
            // 'kelas3_result_teacher_name'  => 'required',
            // 'kelas3_result_studi_id'      => 'required',
            // 'kelas3_result_studi_name'    => 'required',
            // 'kelas3_result_class_id'      => 'required',
            // 'kelas3_result_book1'         => 'required',
            // 'kelas3_result_book2'         => 'required',
            // 'kelas3_result_book3'         => 'required',
            // 'kelas3_result_value1'        => 'required',
            // 'kelas3_result_value2'        => 'required',
            // 'kelas3_result_value3'        => 'required',
            // 'kelas3_result_value4'        => 'required',
            // 'kelas3_result_note'          => 'required',
        ]);

        $kelas3_result->update([
            'kelas3_result_task_id'       => $request->kelas3_result_task_id,
            'kelas3_result_date'          => $request->kelas3_result_date,
            'kelas3_result_student_id'    => $request->kelas3_result_student_id,
            'kelas3_result_student_name'  => Student::findOrFail($request->kelas3_result_student_id)->student_kode . ' | ' . Student::findOrFail($request->kelas3_result_student_id)->student_name,
            'kelas3_result_teacher_id'    => $request->kelas3_result_teacher_id,
            'kelas3_result_teacher_name'  => Teacher::findOrFail($request->kelas3_result_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->kelas3_result_teacher_id)->teacher_name,
            'kelas3_result_studi_id'      => $request->kelas3_result_studi_id,
            'kelas3_result_studi_name'    => Studie::findOrFail($request->kelas3_result_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->kelas3_result_studi_id)->studi_name,
            'kelas3_result_class_id'      => $request->kelas3_result_class_id,
            'kelas3_result_book1'         => $request->kelas3_result_book1,
            'kelas3_result_book2'         => $request->kelas3_result_book2,
            'kelas3_result_book3'         => $request->kelas3_result_book3,
            'kelas3_result_value1'        => $request->kelas3_result_value1,
            'kelas3_result_value2'        => $request->kelas3_result_value2,
            'kelas3_result_value3'        => $request->kelas3_result_value3,
            'kelas3_result_waktu'         => $request->kelas3_result_waktu,
            'kelas3_result_note'          => $request->kelas3_result_note
        ]);

        if ($request->kelas3_result_waktu == 1) {
            toast('Edit Nilai Pagi Siswa Updated!', 'success');
        } elseif ($request->kelas3_result_waktu == 2) {
            toast('Edit Nilai Siang Siswa Updated!', 'success');
        } else {
            toast('Edit Nilai Sore Siswa Updated!', 'success');
        }

        return redirect()->route('kelas3-result.index');
    }


    public function show(Kelas3Result $kelas3_result) {
        // abort_if(Gate::denies('show_report'), 403);

        return view('report::kelas3-result.show', compact('kelas3_result'));
    }


    // public function destroy(Report1Task $report1) {
    //     // abort_if(Gate::denies('delete_report'), 403);

    //     $report1->delete();

    //     toast('Daftar Siswa Deleted!', 'warning');

    //     return redirect()->route('result1.index');
    // }

}

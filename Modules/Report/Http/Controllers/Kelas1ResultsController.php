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
use Modules\Report\Entities\Kelas1Task;
use Modules\Report\Entities\Kelas1Result;
use Illuminate\Contracts\Support\Renderable;
use Modules\Report\DataTables\Kelas1ResultsDataTable;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Exp;

class Kelas1ResultsController extends Controller
{

    public function index(Kelas1ResultsDataTable $dataTable) {
        // abort_if(Gate::denies('access_report'), 403);

        return $dataTable->render('report::kelas1-result.index');
    }


    public function pagi_create($id) {
        // abort_if(Gate::denies('create_report'), 403);
        $kelas1_result = Kelas1Task::findOrFail($id);
        $result_kemarin = Kelas1Result::where('kelas1_result_student_id', '=', $kelas1_result->kelas1_task_student_id)->where('kelas1_result_waktu', '=', 1)->latest()->first();

        return view('report::kelas1-result.pagi-create', compact('kelas1_result','result_kemarin'));
    }


    public function pagi_store(Request $request) {
        // abort_if(Gate::denies('create_report'), 403);

        $request->validate([
            // 'kelas1_result_id'            => 'required',
            // 'kelas1_result_code'          => 'required',
            // 'kelas1_result_date'          => 'required|unique:kelas1_results',
            // 'kelas1_result_time'          => 'required',
            // 'kelas1_result_student_id'    => 'required',
            // 'kelas1_result_student_name'  => 'required',
            // 'kelas1_result_teacher_id'    => 'required',
            // 'kelas1_result_teacher_name'  => 'required',
            // 'kelas1_result_studi_id'      => 'required',
            // 'kelas1_result_studi_name'    => 'required',
            // 'kelas1_result_class_id'      => 'required',
            // 'kelas1_result_book1'         => 'required',
            // 'kelas1_result_book2'         => 'required',
            // 'kelas1_result_value1'        => 'required',
            // 'kelas1_result_value2'        => 'required',
            // 'kelas1_result_value3'        => 'required',
            // 'kelas1_result_value4'        => 'required',
            // 'kelas1_result_note'          => 'required',
        ]);

        $kelas1_result = Kelas1Result::create([
            'kelas1_result_task_id'          => $request->kelas1_result_task_id,
            'kelas1_result_date'             => $request->kelas1_result_date,
            'kelas1_result_student_id'       => $request->kelas1_result_student_id,
            'kelas1_result_student_name'     => Student::findOrFail($request->kelas1_result_student_id)->student_kode . ' | ' . Student::findOrFail($request->kelas1_result_student_id)->student_name,
            'kelas1_result_teacher_id'       => $request->kelas1_result_teacher_id,
            'kelas1_result_teacher_name'     => Teacher::findOrFail($request->kelas1_result_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->kelas1_result_teacher_id)->teacher_name,
            'kelas1_result_studi_id'         => $request->kelas1_result_studi_id,
            'kelas1_result_studi_name'       => Studie::findOrFail($request->kelas1_result_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->kelas1_result_studi_id)->studi_name,
            'kelas1_result_class_id'         => $request->kelas1_result_class_id,
            'kelas1_result_book1'            => $request->kelas1_result_book1,
            'kelas1_result_book2'            => $request->kelas1_result_book2,
            'kelas1_result_value1'           => $request->kelas1_result_value1,
            'kelas1_result_waktu'            => $request->kelas1_result_waktu,
            'kelas1_result_note'             => $request->kelas1_result_note
        ]);

        toast('Input Nilai Pagi Siswa Created!', 'success');

        return redirect()->route('kelas1-task.index');
    }


    public function siang_create($id) {
        // abort_if(Gate::denies('create_report'), 403);
        $kelas1_result = Kelas1Task::findOrFail($id);
        $result_kemarin = Kelas1Result::where('kelas1_result_student_id', '=', $kelas1_result->kelas1_task_student_id)->where('kelas1_result_waktu', '=', 2)->latest()->first();

        return view('report::kelas1-result.siang-create', compact('kelas1_result','result_kemarin'));
    }


    public function siang_store(Request $request) {
        // abort_if(Gate::denies('create_report'), 403);

        $request->validate([
            // 'kelas1_result_id'            => 'required',
            // 'kelas1_result_code'          => 'required',
            // 'kelas1_result_date'          => 'required|unique:kelas1_results',
            // 'kelas1_result_time'          => 'required',
            // 'kelas1_result_student_id'    => 'required',
            // 'kelas1_result_student_name'  => 'required',
            // 'kelas1_result_teacher_id'    => 'required',
            // 'kelas1_result_teacher_name'  => 'required',
            // 'kelas1_result_studi_id'      => 'required',
            // 'kelas1_result_studi_name'    => 'required',
            // 'kelas1_result_class_id'      => 'required',
            // 'kelas1_result_book1'         => 'required',
            // 'kelas1_result_book2'         => 'required',
            // 'kelas1_result_value1'        => 'required',
            // 'kelas1_result_value2'        => 'required',
            // 'kelas1_result_value3'        => 'required',
            // 'kelas1_result_value4'        => 'required',
            // 'kelas1_result_note'          => 'required',
        ]);

        $kelas1_result = Kelas1Result::create([
            'kelas1_result_task_id'          => $request->kelas1_result_task_id,
            'kelas1_result_date'             => $request->kelas1_result_date,
            'kelas1_result_student_id'       => $request->kelas1_result_student_id,
            'kelas1_result_student_name'     => Student::findOrFail($request->kelas1_result_student_id)->student_kode . ' | ' . Student::findOrFail($request->kelas1_result_student_id)->student_name,
            'kelas1_result_teacher_id'       => $request->kelas1_result_teacher_id,
            'kelas1_result_teacher_name'     => Teacher::findOrFail($request->kelas1_result_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->kelas1_result_teacher_id)->teacher_name,
            'kelas1_result_studi_id'         => $request->kelas1_result_studi_id,
            'kelas1_result_studi_name'       => Studie::findOrFail($request->kelas1_result_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->kelas1_result_studi_id)->studi_name,
            'kelas1_result_class_id'         => $request->kelas1_result_class_id,
            'kelas1_result_book1'            => $request->kelas1_result_book1,
            'kelas1_result_book2'            => $request->kelas1_result_book2,
            'kelas1_result_value2'           => $request->kelas1_result_value2,
            'kelas1_result_waktu'            => $request->kelas1_result_waktu,
            'kelas1_result_note'             => $request->kelas1_result_note
        ]);

        toast('Input Nilai Siang Siswa Created!', 'success');

        return redirect()->route('kelas1-task.index');
    }


    public function edit(Kelas1Result $kelas1_result) {
        // abort_if(Gate::denies('edit_report'), 403);

        return view('report::kelas1-result.edit', compact('kelas1_result'));
    }


    public function update(Request $request, Kelas1Result $kelas1_result) {
        // abort_if(Gate::denies('update_report'), 403);

        $request->validate([
            // 'kelas1_result_id'            => 'required',
            // 'kelas1_result_code'          => 'required',
            // 'kelas1_result_date'          => 'required|unique:kelas1_results',
            // 'kelas1_result_time'          => 'required',
            // 'kelas1_result_student_id'    => 'required',
            // 'kelas1_result_student_name'  => 'required',
            // 'kelas1_result_teacher_id'    => 'required',
            // 'kelas1_result_teacher_name'  => 'required',
            // 'kelas1_result_studi_id'      => 'required',
            // 'kelas1_result_studi_name'    => 'required',
            // 'kelas1_result_class_id'      => 'required',
            // 'kelas1_result_book1'         => 'required',
            // 'kelas1_result_book2'         => 'required',
            // 'kelas1_result_value1'        => 'required',
            // 'kelas1_result_value2'        => 'required',
            // 'kelas1_result_value3'        => 'required',
            // 'kelas1_result_value4'        => 'required',
            // 'kelas1_result_note'          => 'required',
        ]);

        $kelas1_result->update([
            'kelas1_result_task_id'          => $request->kelas1_result_task_id,
            'kelas1_result_date'             => $request->kelas1_result_date,
            'kelas1_result_student_id'       => $request->kelas1_result_student_id,
            'kelas1_result_student_name'     => Student::findOrFail($request->kelas1_result_student_id)->student_kode . ' | ' . Student::findOrFail($request->kelas1_result_student_id)->student_name,
            'kelas1_result_teacher_id'       => $request->kelas1_result_teacher_id,
            'kelas1_result_teacher_name'     => Teacher::findOrFail($request->kelas1_result_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->kelas1_result_teacher_id)->teacher_name,
            'kelas1_result_studi_id'         => $request->kelas1_result_studi_id,
            'kelas1_result_studi_name'       => Studie::findOrFail($request->kelas1_result_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->kelas1_result_studi_id)->studi_name,
            'kelas1_result_class_id'         => $request->kelas1_result_class_id,
            'kelas1_result_book1'            => $request->kelas1_result_book1,
            'kelas1_result_book2'            => $request->kelas1_result_book2,
            'kelas1_result_value1'           => $request->kelas1_result_value1,
            'kelas1_result_value2'           => $request->kelas1_result_value2,
            'kelas1_result_waktu'            => $request->kelas1_result_waktu,
            'kelas1_result_note'             => $request->kelas1_result_note
        ]);

        if ($request->kelas1_result_waktu == 1) {
            toast('Edit Nilai Pagi Siswa Updated!', 'success');
        } else {
            toast('Edit Nilai Siang Siswa Updated!', 'success');
        }

        return redirect()->route('kelas1-result.index');
    }


    public function show(Kelas1Result $kelas1_result) {
        // abort_if(Gate::denies('show_report'), 403);

        return view('report::kelas1-result.show', compact('kelas1_result'));
    }


    // public function destroy(Report1Task $report1) {
    //     // abort_if(Gate::denies('delete_report'), 403);

    //     $report1->delete();

    //     toast('Daftar Siswa Deleted!', 'warning');

    //     return redirect()->route('result1.index');
    // }

}

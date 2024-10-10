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
use Modules\Report\Entities\Report1Task;
use Modules\Report\Entities\Report1Result;
use Illuminate\Contracts\Support\Renderable;
use Modules\Report\DataTables\Report1ResultsDataTable;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Exp;

class Report1ResultsController extends Controller
{

    public function index(Report1ResultsDataTable $dataTable) {
        // abort_if(Gate::denies('access_report'), 403);

        return $dataTable->render('report::result1.index');
    }


    public function pagi_create($id) {
        // abort_if(Gate::denies('create_report'), 403);
        $report1task = Report1Task::findOrFail($id);

        return view('report::result1.pagi-create', compact('report1task'));
    }


    public function pagi_store(Request $request) {
        // abort_if(Gate::denies('create_report'), 403);

        $request->validate([
            // 'report1_id'            => 'required',
            // 'report1_code'          => 'required',
            // 'report1_date'          => 'required|unique:report1_results',
            // 'report1_time'          => 'required',
            // 'report1_student_id'    => 'required',
            // 'report1_student_name'  => 'required',
            // 'report1_teacher_id'    => 'required',
            // 'report1_teacher_name'  => 'required',
            // 'report1_studi_id'      => 'required',
            // 'report1_studi_name'    => 'required',
            // 'report1_class_id'      => 'required',
            // 'report1_book1'         => 'required',
            // 'report1_book2'         => 'required',
            // 'report1_value1'        => 'required',
            // 'report1_value2'        => 'required',
            // 'report1_value3'        => 'required',
            // 'report1_value4'        => 'required',
            // 'report1_note'          => 'required',
        ]);

        $report1result = Report1Result::create([
            'report1_id'            => $request->report1_id,
            'report1_date'          => $request->report1_date,
            'report1_student_id'    => $request->report1_student_id,
            'report1_student_name'  => Student::findOrFail($request->report1_student_id)->student_kode . ' | ' . Student::findOrFail($request->report1_student_id)->student_name,
            'report1_teacher_id'    => $request->report1_teacher_id,
            'report1_teacher_name'  => Teacher::findOrFail($request->report1_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->report1_teacher_id)->teacher_name,
            'report1_studi_id'      => $request->report1_studi_id,
            'report1_studi_name'    => Studie::findOrFail($request->report1_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->report1_studi_id)->studi_name,
            'report1_class_id'      => $request->report1_class_id,
            'report1_book1'         => $request->report1_book1,
            'report1_book2'         => $request->report1_book2,
            'report1_value1'        => $request->report1_value1,
            'report1_waktu'         => $request->report1_waktu,
            'report1_note'          => $request->report1_note
        ]);

        toast('Input Nilai Pagi Siswa Created!', 'success');

        return redirect()->route('report1.index');
    }


    public function siang_create($id) {
        // abort_if(Gate::denies('create_report'), 403);
        $report1task = Report1Task::findOrFail($id);

        return view('report::result1.siang-create', compact('report1task'));
    }


    public function siang_store(Request $request) {
        // abort_if(Gate::denies('create_report'), 403);

        $request->validate([
            // 'report1_id'            => 'required',
            // 'report1_code'          => 'required',
            // 'report1_date'          => 'required|unique:report1_results',
            // 'report1_time'          => 'required',
            // 'report1_student_id'    => 'required',
            // 'report1_student_name'  => 'required',
            // 'report1_teacher_id'    => 'required',
            // 'report1_teacher_name'  => 'required',
            // 'report1_studi_id'      => 'required',
            // 'report1_studi_name'    => 'required',
            // 'report1_class_id'      => 'required',
            // 'report1_book1'         => 'required',
            // 'report1_book2'         => 'required',
            // 'report1_value1'        => 'required',
            // 'report1_value2'        => 'required',
            // 'report1_value3'        => 'required',
            // 'report1_value4'        => 'required',
            // 'report1_note'          => 'required',
        ]);

        $report1result = Report1Result::create([
            'report1_id'            => $request->report1_id,
            'report1_date'          => $request->report1_date,
            'report1_student_id'    => $request->report1_student_id,
            'report1_student_name'  => Student::findOrFail($request->report1_student_id)->student_kode . ' | ' . Student::findOrFail($request->report1_student_id)->student_name,
            'report1_teacher_id'    => $request->report1_teacher_id,
            'report1_teacher_name'  => Teacher::findOrFail($request->report1_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->report1_teacher_id)->teacher_name,
            'report1_studi_id'      => $request->report1_studi_id,
            'report1_studi_name'    => Studie::findOrFail($request->report1_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->report1_studi_id)->studi_name,
            'report1_class_id'      => $request->report1_class_id,
            'report1_book1'         => $request->report1_book1,
            'report1_book2'         => $request->report1_book2,
            'report1_value2'        => $request->report1_value2,
            'report1_waktu'         => $request->report1_waktu,
            'report1_note'          => $request->report1_note
        ]);

        toast('Input Nilai Siang Siswa Created!', 'success');

        return redirect()->route('report1.index');
    }


    public function edit(Report1Result $report1result) {
        // abort_if(Gate::denies('edit_report'), 403);

        return view('report::result1.edit', compact('report1result'));
    }


    public function update(Request $request, Report1Result $report1result) {
        // abort_if(Gate::denies('update_report'), 403);

        $request->validate([
            // 'report1_id'            => 'required',
            // 'report1_code'          => 'required',
            // 'report1_date'          => 'required|unique:report1_results',
            // 'report1_time'          => 'required',
            // 'report1_student_id'    => 'required',
            // 'report1_student_name'  => 'required',
            // 'report1_teacher_id'    => 'required',
            // 'report1_teacher_name'  => 'required',
            // 'report1_studi_id'      => 'required',
            // 'report1_studi_name'    => 'required',
            // 'report1_class_id'      => 'required',
            // 'report1_book1'         => 'required',
            // 'report1_book2'         => 'required',
            // 'report1_value1'        => 'required',
            // 'report1_value2'        => 'required',
            // 'report1_value3'        => 'required',
            // 'report1_value4'        => 'required',
            // 'report1_note'          => 'required',
        ]);

        $report1result->update([
            'report1_id'            => $request->report1_id,
            'report1_date'          => $request->report1_date,
            'report1_student_id'    => $request->report1_student_id,
            'report1_student_name'  => Student::findOrFail($request->report1_student_id)->student_kode . ' | ' . Student::findOrFail($request->report1_student_id)->student_name,
            'report1_teacher_id'    => $request->report1_teacher_id,
            'report1_teacher_name'  => Teacher::findOrFail($request->report1_teacher_id)->teacher_kode . ' | ' . Teacher::findOrFail($request->report1_teacher_id)->teacher_name,
            'report1_studi_id'      => $request->report1_studi_id,
            'report1_studi_name'    => Studie::findOrFail($request->report1_studi_id)->studi_code . ' | ' . Studie::findOrFail($request->report1_studi_id)->studi_name,
            'report1_class_id'      => $request->report1_class_id,
            'report1_book1'         => $request->report1_book1,
            'report1_book2'         => $request->report1_book2,
            'report1_value1'        => $request->report1_value1,
            'report1_value3'        => $request->report1_value3,
            'report1_waktu'         => $request->report1_waktu,
            'report1_note'          => $request->report1_note
        ]);

        toast('Edit Nilai Pagi Siswa Created!', 'success');

        return redirect()->route('report1result.index');
    }


    public function show(Report1Result $report1result) {
        // abort_if(Gate::denies('show_report'), 403);

        return view('report::result1.show', compact('report1result'));
    }


    // public function destroy(Report1Task $report1) {
    //     // abort_if(Gate::denies('delete_report'), 403);

    //     $report1->delete();

    //     toast('Daftar Siswa Deleted!', 'warning');

    //     return redirect()->route('result1.index');
    // }

}

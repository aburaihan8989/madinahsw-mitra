<?php

namespace Modules\Report\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Modules\Report\Entities\Report1Task;
use Illuminate\Contracts\Support\Renderable;
use Modules\Report\DataTables\Report1TasksDataTable;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Exp;

class Report1ResultsController extends Controller
{

    public function index(Report1TasksDataTable $dataTable) {
        // abort_if(Gate::denies('access_report'), 403);

        return $dataTable->render('report::report1.index');
    }


    public function create() {
        // abort_if(Gate::denies('create_report'), 403);

        return view('report::report1.create');
    }


    public function store(Request $request) {
        // abort_if(Gate::denies('create_report'), 403);

        $request->validate([
            // 'report1task_date'        => 'required',
            // 'report1task_student_id'  => 'required',
            // 'report1task_teacher_id'  => 'required',
            // 'report1task_studi_id'    => 'required',
            // 'report1task_class_id'    => 'required',
            // 'report1task_active'      => 'required',
            // 'report1task_note'        => 'required',
        ]);

        $report1task = Report1Task::create([
            'report1task_date'          => $request->report1task_date,
            'report1task_student_id'    => $request->report1task_student_id,
            'report1task_teacher_id'    => $request->report1task_teacher_id,
            'report1task_studi_id'      => $request->report1task_studi_id,
            'report1task_class_id'      => '1',
            'report1task_active'        => $request->report1task_active,
            'report1task_note'          => $request->report1task_note
        ]);

        toast('Daftar Siswa Created!', 'success');

        return redirect()->route('report1.index');
    }


    public function edit(Report1Task $report1) {
        // abort_if(Gate::denies('edit_report'), 403);

        return view('report::report1.edit', compact('report1'));
    }


    public function update(Request $request, Report1Task $report1) {
        // abort_if(Gate::denies('update_report'), 403);

        $request->validate([
            // 'report1task_date'        => 'required',
            // 'report1task_student_id'  => 'required',
            // 'report1task_teacher_id'  => 'required',
            // 'report1task_studi_id'    => 'required',
            // 'report1task_class_id'    => 'required',
            // 'report1task_active'      => 'required',
            // 'report1task_note'        => 'required',
        ]);

        $report1->update([
            'report1task_date'          => $request->report1task_date,
            'report1task_student_id'    => $request->report1task_student_id,
            'report1task_teacher_id'    => $request->report1task_teacher_id,
            'report1task_studi_id'      => $request->report1task_studi_id,
            'report1task_class_id'      => '1',
            'report1task_active'        => $request->report1task_active,
            'report1task_note'          => $request->report1task_note
        ]);

        toast('Daftar Siswa Updated!', 'info');

        return redirect()->route('report1.index');
    }


    public function show(Report1Task $report1) {
        // abort_if(Gate::denies('show_report'), 403);

        return view('report::report1.show', compact('report1'));
    }


    public function destroy(Report1Task $report1) {
        // abort_if(Gate::denies('delete_report'), 403);

        $report1->delete();

        toast('Daftar Siswa Deleted!', 'warning');

        return redirect()->route('report1.index');
    }

}

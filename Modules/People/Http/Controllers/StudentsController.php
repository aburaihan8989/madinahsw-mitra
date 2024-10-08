<?php

namespace Modules\People\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Upload\Entities\Upload;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Modules\People\Entities\Student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\Renderable;
use Modules\People\DataTables\StudentsDataTable;

class StudentsController extends Controller
{

    public function index(StudentsDataTable $dataTable) {
        abort_if(Gate::denies('access_customers'), 403);

        return $dataTable->render('people::students.index');
    }


    public function create() {
        abort_if(Gate::denies('create_customers'), 403);

        return view('people::students.create');
    }


    public function store(Request $request) {
        abort_if(Gate::denies('create_customers'), 403);

        $request->validate([
            // 'student_nis'        => 'required|max:255',
            // 'student_nisn'       => 'required|max:255',
            // 'student_nik'        => 'required|max:255',
            // 'student_name'       => 'required|max:255',
            // 'student_gender'     => 'required',
            // 'student_place'      => 'required|max:255',
            // 'student_birth'      => 'required',
            // 'student_join'       => 'required',
            // 'student_level'      => 'required',
            // 'student_phone'      => 'required',
            // 'student_email'      => 'required|email|max:255',
            // 'student_city'       => 'required|max:255',
            // 'student_address'    => 'required',
            // 'student_active'     => 'required',
            // 'student_wali1'      => 'required|max:255',
            // 'student_wali2'      => 'required|max:255',
            // 'class_id'           => 'required',
        ]);

        $student = Student::create([
            'student_nis'     => $request->student_nis,
            'student_nisn'    => $request->student_nisn,
            'student_nik'     => $request->student_nik,
            'student_name'    => $request->student_name,
            'student_gender'  => $request->student_gender,
            'student_place'   => $request->student_place,
            'student_birth'   => $request->student_birth,
            'student_join'    => $request->student_join,
            'student_level'   => $request->student_level,
            'student_phone'   => $request->student_phone,
            'student_email'   => $request->student_email,
            'student_city'    => $request->student_city,
            'student_address' => $request->student_address,
            'student_active'  => $request->student_active,
            'student_wali1'   => $request->student_wali1,
            'student_wali2'   => $request->student_wali2,
            'class_id'        => $request->class_id
        ]);

        if ($request->has('document')) {
            foreach ($request->input('document') as $file) {
                $student->addMedia(Storage::path('temp/dropzone/' . $file))->toMediaCollection('students');
            }
        }

        toast('Data Siswa Created!', 'success');

        return redirect()->route('students.index');
    }


    public function show(Student $student) {
        abort_if(Gate::denies('show_customers'), 403);

        return view('people::students.show', compact('student'));
    }


    public function edit(Student $student) {
        abort_if(Gate::denies('edit_customers'), 403);

        return view('people::students.edit', compact('student'));
    }


    public function update(Request $request, Student $student) {
        abort_if(Gate::denies('update_customers'), 403);

        $request->validate([
            // 'student_nis'        => 'required|max:255',
            // 'student_nisn'       => 'required|max:255',
            // 'student_nik'        => 'required|max:255',
            // 'student_name'       => 'required|max:255',
            // 'student_gender'     => 'required',
            // 'student_place'      => 'required|max:255',
            // 'student_birth'      => 'required',
            // 'student_join'       => 'required',
            // 'student_level'      => 'required',
            // 'student_phone'      => 'required',
            // 'student_email'      => 'required|email|max:255',
            // 'student_city'       => 'required|max:255',
            // 'student_address'    => 'required',
            // 'student_active'     => 'required',
            // 'student_wali1'      => 'required|max:255',
            // 'student_wali2'      => 'required|max:255',
            // 'class_id'           => 'required',
        ]);

        $student->update([
            'student_nis'     => $request->student_nis,
            'student_nisn'    => $request->student_nisn,
            'student_nik'     => $request->student_nik,
            'student_name'    => $request->student_name,
            'student_gender'  => $request->student_gender,
            'student_place'   => $request->student_place,
            'student_birth'   => $request->student_birth,
            'student_join'    => $request->student_join,
            'student_level'   => $request->student_level,
            'student_phone'   => $request->student_phone,
            'student_email'   => $request->student_email,
            'student_city'    => $request->student_city,
            'student_address' => $request->student_address,
            'student_active'  => $request->student_active,
            'student_wali1'   => $request->student_wali1,
            'student_wali2'   => $request->student_wali2,
            'class_id'        => $request->class_id
        ]);

        if ($request->has('document')) {
            if (count($student->getMedia('students')) > 0) {
                foreach ($student->getMedia('students') as $media) {
                    if (!in_array($media->file_name, $request->input('document', []))) {
                        $media->delete();
                    }
                }
            }

            $media = $student->getMedia('students')->pluck('file_name')->toArray();

            foreach ($request->input('document', []) as $file) {
                if (count($media) === 0 || !in_array($file, $media)) {
                    $student->addMedia(Storage::path('temp/dropzone/' . $file))->toMediaCollection('students');
                }
            }
        }

        toast('Data Siswa Updated!', 'info');

        return redirect()->route('students.index');
    }


    public function destroy(Student $student) {
        abort_if(Gate::denies('delete_customers'), 403);

        $student->delete();

        toast('Data Siswa Deleted!', 'warning');

        return redirect()->route('students.index');
    }


}

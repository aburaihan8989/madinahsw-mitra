<?php

namespace Modules\People\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Upload\Entities\Upload;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Modules\People\Entities\Teacher;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\Renderable;
use Modules\People\DataTables\TeachersDataTable;

class TeachersController extends Controller
{

    public function index(TeachersDataTable $dataTable) {
        abort_if(Gate::denies('access_customers'), 403);

        return $dataTable->render('people::teachers.index');
    }


    public function create() {
        abort_if(Gate::denies('create_customers'), 403);

        return view('people::teachers.create');
    }


    public function store(Request $request) {
        abort_if(Gate::denies('create_customers'), 403);

        $request->validate([
            // 'teacher_nip'        => 'required|max:255',
            // 'teacher_nips'       => 'required|max:255',
            // 'teacher_nik'        => 'required|max:255',
            // 'teacher_name'       => 'required|max:255',
            // 'teacher_gender'     => 'required',
            // 'teacher_place'      => 'required|max:255',
            // 'teacher_birth'      => 'required',
            // 'teacher_join'       => 'required',
            // 'teacher_level'      => 'required',
            // 'teacher_phone'      => 'required',
            // 'teacher_email'      => 'required|email|max:255',
            // 'teacher_city'       => 'required|max:255',
            // 'teacher_address'    => 'required',
            // 'teacher_family'     => 'required',
            // 'teacher_anak'       => 'required|max:255',
            // 'teacher_active'     => 'required',
        ]);

        $teacher = Teacher::create([
            'teacher_nip'     => $request->teacher_nip,
            'teacher_nips'    => $request->teacher_nips,
            'teacher_nik'     => $request->teacher_nik,
            'teacher_name'    => $request->teacher_name,
            'teacher_gender'  => $request->teacher_gender,
            'teacher_place'   => $request->teacher_place,
            'teacher_birth'   => $request->teacher_birth,
            'teacher_join'    => $request->teacher_join,
            'teacher_level'   => $request->teacher_level,
            'teacher_phone'   => $request->teacher_phone,
            'teacher_email'   => $request->teacher_email,
            'teacher_city'    => $request->teacher_city,
            'teacher_address' => $request->teacher_address,
            'teacher_family'  => $request->teacher_family,
            'teacher_anak'    => $request->teacher_anak,
            'teacher_active'  => $request->teacher_active
        ]);

        if ($request->has('document')) {
            foreach ($request->input('document') as $file) {
                $teacher->addMedia(Storage::path('temp/dropzone/' . $file))->toMediaCollection('teachers');
            }
        }

        toast('Data Pengajar Created!', 'success');

        return redirect()->route('teachers.index');
    }


    public function show(Teacher $teacher) {
        abort_if(Gate::denies('show_customers'), 403);

        return view('people::teachers.show', compact('teacher'));
    }


    public function edit(Teacher $teacher) {
        abort_if(Gate::denies('edit_customers'), 403);

        return view('people::teachers.edit', compact('teacher'));
    }


    public function update(Request $request, Teacher $teacher) {
        abort_if(Gate::denies('update_customers'), 403);

        $request->validate([
            // 'teacher_nip'        => 'required|max:255',
            // 'teacher_nips'       => 'required|max:255',
            // 'teacher_nik'        => 'required|max:255',
            // 'teacher_name'       => 'required|max:255',
            // 'teacher_gender'     => 'required',
            // 'teacher_place'      => 'required|max:255',
            // 'teacher_birth'      => 'required',
            // 'teacher_join'       => 'required',
            // 'teacher_level'      => 'required',
            // 'teacher_phone'      => 'required',
            // 'teacher_email'      => 'required|email|max:255',
            // 'teacher_city'       => 'required|max:255',
            // 'teacher_address'    => 'required',
            // 'teacher_family'     => 'required',
            // 'teacher_anak'       => 'required|max:255',
            // 'teacher_active'     => 'required',
        ]);

        $teacher->update([
            'teacher_nip'     => $request->teacher_nip,
            'teacher_nips'    => $request->teacher_nips,
            'teacher_nik'     => $request->teacher_nik,
            'teacher_name'    => $request->teacher_name,
            'teacher_gender'  => $request->teacher_gender,
            'teacher_place'   => $request->teacher_place,
            'teacher_birth'   => $request->teacher_birth,
            'teacher_join'    => $request->teacher_join,
            'teacher_level'   => $request->teacher_level,
            'teacher_phone'   => $request->teacher_phone,
            'teacher_email'   => $request->teacher_email,
            'teacher_city'    => $request->teacher_city,
            'teacher_address' => $request->teacher_address,
            'teacher_family'  => $request->teacher_family,
            'teacher_anak'    => $request->teacher_anak,
            'teacher_active'  => $request->teacher_active
        ]);

        if ($request->has('document')) {
            if (count($teacher->getMedia('teachers')) > 0) {
                foreach ($teacher->getMedia('teachers') as $media) {
                    if (!in_array($media->file_name, $request->input('document', []))) {
                        $media->delete();
                    }
                }
            }

            $media = $teacher->getMedia('teachers')->pluck('file_name')->toArray();

            foreach ($request->input('document', []) as $file) {
                if (count($media) === 0 || !in_array($file, $media)) {
                    $teacher->addMedia(Storage::path('temp/dropzone/' . $file))->toMediaCollection('teachers');
                }
            }
        }

        toast('Data Pengajar Updated!', 'info');

        return redirect()->route('teachers.index');
    }


    public function destroy(Teacher $teacher) {
        abort_if(Gate::denies('delete_customers'), 403);

        $teacher->delete();

        toast('Data Pengajar Deleted!', 'warning');

        return redirect()->route('teachers.index');
    }


}

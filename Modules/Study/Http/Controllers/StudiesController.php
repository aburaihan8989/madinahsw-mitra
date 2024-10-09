<?php

namespace Modules\Study\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Upload\Entities\Upload;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Modules\Study\Entities\Studie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\Renderable;
use Modules\Study\DataTables\StudiesDataTable;

class StudiesController extends Controller
{

    public function index(StudiesDataTable $dataTable) {
        abort_if(Gate::denies('access_customers'), 403);

        return $dataTable->render('study::studi.index');
    }


    public function create() {
        abort_if(Gate::denies('create_customers'), 403);

        return view('study::studi.create');
    }


    public function store(Request $request) {
        abort_if(Gate::denies('create_customers'), 403);

        $request->validate([
            // 'studi_code'   => 'required|max:255',
            // 'studi_name'   => 'required|max:255',
        ]);

        $studi = Studie::create([
            'studi_code'     => $request->studi_code,
            'studi_name'     => $request->studi_name
        ]);

        if ($request->has('document')) {
            foreach ($request->input('document') as $file) {
                $studi->addMedia(Storage::path('temp/dropzone/' . $file))->toMediaCollection('studies');
            }
        }

        toast('Data Pelajaran Created!', 'success');

        return redirect()->route('studies.index');
    }


    public function show(Studie $study) {
        abort_if(Gate::denies('show_customers'), 403);

        return view('study::studi.show', compact('study'));
    }


    public function edit(Studie $study) {
        abort_if(Gate::denies('edit_customers'), 403);

        return view('study::studi.edit', compact('study'));
    }


    public function update(Request $request, Studie $study) {
        abort_if(Gate::denies('update_customers'), 403);

        $request->validate([
            // 'studi_code'   => 'required|max:255',
            // 'studi_name'   => 'required|max:255',
        ]);

        $study->update([
            'studi_code'     => $request->studi_code,
            'studi_name'     => $request->studi_name
        ]);

        if ($request->has('document')) {
            if (count($studi->getMedia('studies')) > 0) {
                foreach ($studi->getMedia('studies') as $media) {
                    if (!in_array($media->file_name, $request->input('document', []))) {
                        $media->delete();
                    }
                }
            }

            $media = $studi->getMedia('studies')->pluck('file_name')->toArray();

            foreach ($request->input('document', []) as $file) {
                if (count($media) === 0 || !in_array($file, $media)) {
                    $studi->addMedia(Storage::path('temp/dropzone/' . $file))->toMediaCollection('studies');
                }
            }
        }

        toast('Data Pelajaran Updated!', 'info');

        return redirect()->route('studies.index');
    }


    public function destroy(Studie $study) {
        abort_if(Gate::denies('delete_customers'), 403);

        $study->delete();

        toast('Data Pelajaran Deleted!', 'warning');

        return redirect()->route('studies.index');
    }


}

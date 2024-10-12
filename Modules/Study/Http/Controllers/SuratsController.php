<?php

namespace Modules\Study\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Upload\Entities\Upload;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Modules\Study\Entities\Surat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\Renderable;
use Modules\Study\DataTables\SuratsDataTable;

class SuratsController extends Controller
{

    public function index(SuratsDataTable $dataTable) {
        abort_if(Gate::denies('access_customers'), 403);

        return $dataTable->render('study::surat.index');
    }


    public function create() {
        abort_if(Gate::denies('create_customers'), 403);

        return view('study::surat.create');
    }


    public function store(Request $request) {
        abort_if(Gate::denies('create_customers'), 403);

        $request->validate([
            // 'surat_code'  => 'required|max:255',
            // 'surat_name'  => 'required|max:255',
        ]);

        $surat = Surat::create([
            'surat_code'  => $request->surat_code,
            'surat_name'  => $request->surat_name
        ]);

        toast('Data Surat Created!', 'success');

        return redirect()->route('surats.index');
    }


    public function show(Surat $surat) {
        abort_if(Gate::denies('show_customers'), 403);

        return view('study::surat.show', compact('surat'));
    }


    public function edit(Surat $surat) {
        abort_if(Gate::denies('edit_customers'), 403);

        return view('study::surat.edit', compact('surat'));
    }


    public function update(Request $request, Surat $surat) {
        abort_if(Gate::denies('update_customers'), 403);

        $request->validate([
            // 'surat_code'  => 'required|max:255',
            // 'surat_name'  => 'required|max:255',
        ]);

        $surat->update([
            'surat_code'  => $request->surat_code,
            'surat_name'  => $request->surat_name
        ]);

        toast('Data Surat Updated!', 'info');

        return redirect()->route('surats.index');
    }


    public function destroy(Surat $juz) {
        abort_if(Gate::denies('delete_customers'), 403);

        $surat->delete();

        toast('Data Surat Deleted!', 'warning');

        return redirect()->route('surats.index');
    }


}

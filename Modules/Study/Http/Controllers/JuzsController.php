<?php

namespace Modules\Study\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Upload\Entities\Upload;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Modules\Study\Entities\Juz;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\Renderable;
use Modules\Study\DataTables\JuzsDataTable;

class JuzsController extends Controller
{

    public function index(JuzsDataTable $dataTable) {
        abort_if(Gate::denies('access_customers'), 403);

        return $dataTable->render('study::juz.index');
    }


    public function create() {
        abort_if(Gate::denies('create_customers'), 403);

        return view('study::juz.create');
    }


    public function store(Request $request) {
        abort_if(Gate::denies('create_customers'), 403);

        $request->validate([
            // 'juz_code'      => 'required|max:255',
            // 'juz_name'      => 'required|max:255',
        ]);

        $juz = Juz::create([
            'juz_code'       => $request->juz_code,
            'juz_name'       => $request->juz_name
        ]);

        toast('Data Juz Created!', 'success');

        return redirect()->route('juzs.index');
    }


    public function show(Juz $juz) {
        abort_if(Gate::denies('show_customers'), 403);

        return view('study::juz.show', compact('juz'));
    }


    public function edit(Juz $juz) {
        abort_if(Gate::denies('edit_customers'), 403);

        return view('study::juz.edit', compact('juz'));
    }


    public function update(Request $request, Juz $juz) {
        abort_if(Gate::denies('update_customers'), 403);

        $request->validate([
            // 'juz_code'      => 'required|max:255',
            // 'juz_name'      => 'required|max:255',
        ]);

        $juz->update([
            'juz_code'       => $request->juz_code,
            'juz_name'       => $request->juz_name
        ]);

        toast('Data Juz Updated!', 'info');

        return redirect()->route('juzs.index');
    }


    public function destroy(Juz $juz) {
        abort_if(Gate::denies('delete_customers'), 403);

        $juz->delete();

        toast('Data Juz Deleted!', 'warning');

        return redirect()->route('juzs.index');
    }


}

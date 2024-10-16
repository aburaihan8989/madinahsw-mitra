<?php

namespace Modules\Package\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Upload\Entities\Upload;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Modules\Package\Entities\Package;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\Renderable;
use Modules\Package\DataTables\PackagesDataTable;

class PackagesController extends Controller
{

    public function index(PackagesDataTable $dataTable) {
        abort_if(Gate::denies('access_customers'), 403);

        return $dataTable->render('package::packages.index');
    }


    public function create() {
        abort_if(Gate::denies('create_customers'), 403);

        return view('package::packages.create');
    }


    public function store(Request $request) {
        abort_if(Gate::denies('create_customers'), 403);

        $request->validate([
            // 'package_name'      => 'required|max:255',
            // 'package_date'      => 'required',
            // 'package_day'       => 'required',
            // 'package_status'    => 'required',
            // 'package_note'      => 'required',
        ]);

        $package = Package::create([
            'mitra_id'           => auth()->user()->id,
            'package_name'       => $request->package_name,
            'package_date'       => $request->package_date,
            'package_day'        => $request->package_day,
            'package_status'     => $request->package_status,
            'package_note'       => $request->package_note
        ]);

        if ($request->has('document')) {
            foreach ($request->input('document') as $file) {
                $studi->addMedia(Storage::path('temp/dropzone/' . $file))->toMediaCollection('packages');
            }
        }

        toast('Data Keberangkatan Created!', 'success');

        return redirect()->route('packages.index');
    }


    public function show(Package $package) {
        abort_if(Gate::denies('show_customers'), 403);

        return view('package::packages.show', compact('package'));
    }


    public function edit(Package $package) {
        abort_if(Gate::denies('edit_customers'), 403);

        return view('package::packages.edit', compact('package'));
    }


    public function update(Request $request, Package $package) {
        abort_if(Gate::denies('update_customers'), 403);

        $request->validate([
            // 'package_name'      => 'required|max:255',
            // 'package_date'      => 'required',
            // 'package_day'       => 'required',
            // 'package_status'    => 'required',
            // 'package_note'      => 'required',
        ]);

        $package->update([
            'mitra_id'           => $request->mitra_id,
            'package_name'       => $request->package_name,
            'package_date'       => $request->package_date,
            'package_day'        => $request->package_day,
            'package_status'     => $request->package_status,
            'package_note'       => $request->package_note
        ]);

        if ($request->has('document')) {
            if (count($package->getMedia('packages')) > 0) {
                foreach ($package->getMedia('packages') as $media) {
                    if (!in_array($media->file_name, $request->input('document', []))) {
                        $media->delete();
                    }
                }
            }

            $media = $package->getMedia('packages')->pluck('file_name')->toArray();

            foreach ($request->input('document', []) as $file) {
                if (count($media) === 0 || !in_array($file, $media)) {
                    $package->addMedia(Storage::path('temp/dropzone/' . $file))->toMediaCollection('packages');
                }
            }
        }

        toast('Data Keberangkatan Updated!', 'info');

        return redirect()->route('packages.index');
    }


    public function destroy(Package $package) {
        abort_if(Gate::denies('delete_customers'), 403);

        $package->delete();

        toast('Data Keberangkatan Deleted!', 'warning');

        return redirect()->route('packages.index');
    }


}

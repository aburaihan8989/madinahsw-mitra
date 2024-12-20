<?php

namespace Modules\Package\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Upload\Entities\Upload;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Modules\Package\Entities\Package;
use Modules\People\Entities\Customer;
use Modules\Package\Entities\Manifest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\Renderable;
use Modules\Package\DataTables\ManifestsDataTable;

class ManifestsController extends Controller
{

    public function index(ManifestsDataTable $dataTable, $id) {
        abort_if(Gate::denies('access_customers'), 403);

        $package = Package::findOrFail($id);

        return $dataTable->render('package::manifests.index', compact('package'));
    }


    public function create($id) {
        abort_if(Gate::denies('create_customers'), 403);

        $package = Package::findOrFail($id);

        return view('package::manifests.create', compact('package'));
    }


    public function store(Request $request) {
        abort_if(Gate::denies('create_customers'), 403);

        $request->validate([
            // 'customer_ktp_nik'             => 'required|max:255',
            // 'customer_ktp_name'            => 'required|max:255',
            // 'customer_phone'               => 'required',
            // 'customer_email'               => 'required|email|max:255',
            // 'customer_ktp_city'            => 'required|max:255',
            // 'customer_ktp_gender'          => 'required',
            // 'customer_ktp_tmp_lahir'       => 'required|max:255',
            // 'customer_ktp_tgl_lahir'       => 'required',
            // 'customer_ktp_alamat'          => 'required',
            // 'customer_paspor_name'         => 'required',
            // 'customer_paspor_number'       => 'required',
            // 'customer_paspor_tgl_habis'    => 'required',
        ]);

        // $customer = Customer::create([
        //     'mitra_id'                     => auth()->user()->id,
        //     'mitra_name'                   => auth()->user()->name,
        //     'customer_ktp_nik'             => $request->customer_ktp_nik,
        //     'customer_ktp_name'            => $request->customer_ktp_name,
        //     'customer_phone'               => $request->customer_phone,
        //     'customer_email'               => $request->customer_email,
        //     'customer_ktp_city'            => $request->customer_ktp_city,
        //     'customer_ktp_gender'          => $request->customer_ktp_gender,
        //     'customer_ktp_tmp_lahir'       => $request->customer_ktp_tmp_lahir,
        //     'customer_ktp_tgl_lahir'       => $request->customer_ktp_tgl_lahir,
        //     'customer_ktp_alamat'          => $request->customer_ktp_alamat,
        //     'customer_note'                => $request->customer_note,
        //     'customer_paspor_name'         => $request->customer_paspor_name,
        //     'customer_paspor_number'       => $request->customer_paspor_number,
        //     'customer_paspor_tgl_habis'    => $request->customer_paspor_tgl_habis
        // ]);

        // if ($request->has('document')) {
        //     foreach ($request->input('document', []) as $file) {
        //         $customer->addMedia(Storage::path('temp/dropzone/' . $file))->toMediaCollection('customers');
        //     }

        //     foreach ($request->input('document1', []) as $file1) {
        //         $customer->addMedia(Storage::path('temp/dropzone/' . $file1))->toMediaCollection('ktp');
        //     }

        //     foreach ($request->input('document2', []) as $file2) {
        //         $customer->addMedia(Storage::path('temp/dropzone/' . $file2))->toMediaCollection('kk');
        //     }

        //     foreach ($request->input('document3', []) as $file3) {
        //         $customer->addMedia(Storage::path('temp/dropzone/' . $file3))->toMediaCollection('paspor');
        //     }

        //     foreach ($request->input('document4', []) as $file4) {
        //         $customer->addMedia(Storage::path('temp/dropzone/' . $file4))->toMediaCollection('vaksin');
        //     }
        // }

        $manifest = Manifest::create([
            'mitra_id'                   => auth()->user()->id,
            'mitra_name'                 => auth()->user()->name,
            'package_id'                 => $request->package_id,
            'customer_id'                => $request->customer_id,
            'customer_kode'              => Customer::findOrFail($request->customer_id)->customer_kode,
            'customer_ktp_name'          => Customer::findOrFail($request->customer_id)->customer_ktp_name,
            'customer_paspor_name'       => Customer::findOrFail($request->customer_id)->customer_paspor_name,
            'customer_paspor_number'     => Customer::findOrFail($request->customer_id)->customer_paspor_number,
            'visa'                       => $request->visa,
            'siskopatuh'                 => $request->siskopatuh,
            'hotel'                      => $request->hotel
        ]);

        toast('Data Manifest Jamaah Created!', 'success');

        return redirect()->route('manifests.index', $request->package_id);
    }


    public function show($id) {
        abort_if(Gate::denies('show_customers'), 403);

        $manifest = Manifest::findOrFail($id);
        $customer = Customer::findOrFail($manifest->customer_id);
        $package = Package::findOrFail($manifest->package_id);

        return view('package::manifests.show', compact('manifest','customer','package'));
    }


    public function edit($id) {
        abort_if(Gate::denies('edit_customers'), 403);

        $manifest = Manifest::findOrFail($id);
        $customer = Customer::findOrFail($manifest->customer_id);
        $package = Package::findOrFail($manifest->package_id);

        return view('package::manifests.edit', compact('manifest','customer','package'));
    }


    public function update(Request $request) {
        abort_if(Gate::denies('edit_customers'), 403);

        $request->validate([
            // 'customer_ktp_nik'             => 'required|max:255',
            // 'customer_ktp_name'            => 'required|max:255',
            // 'customer_phone'               => 'required',
            // 'customer_email'               => 'required|email|max:255',
            // 'customer_ktp_city'            => 'required|max:255',
            // 'customer_ktp_gender'          => 'required',
            // 'customer_ktp_tmp_lahir'       => 'required|max:255',
            // 'customer_ktp_tgl_lahir'       => 'required',
            // 'customer_ktp_alamat'          => 'required',
            // 'customer_paspor_name'         => 'required',
            // 'customer_paspor_number'       => 'required',
            // 'customer_paspor_tgl_habis'    => 'required',
        ]);

        $manifest = Manifest::findOrFail($request->id);
        $customer = Customer::findOrFail($manifest->customer_id);

        $customer->update([
            'mitra_id'                     => $request->mitra_id,
            'mitra_name'                   => $request->mitra_name,
            'customer_ktp_nik'             => $request->customer_ktp_nik,
            'customer_ktp_name'            => $request->customer_ktp_name,
            'customer_phone'               => $request->customer_phone,
            'customer_email'               => $request->customer_email,
            'customer_ktp_city'            => $request->customer_ktp_city,
            'customer_ktp_gender'          => $request->customer_ktp_gender,
            'customer_ktp_tmp_lahir'       => $request->customer_ktp_tmp_lahir,
            'customer_ktp_tgl_lahir'       => $request->customer_ktp_tgl_lahir,
            'customer_ktp_alamat'          => $request->customer_ktp_alamat,
            'customer_note'                => $request->customer_note,
            'customer_paspor_name'         => $request->customer_paspor_name,
            'customer_paspor_number'       => $request->customer_paspor_number,
            'customer_paspor_imigrasi'     => $request->customer_paspor_imigrasi,
            'customer_paspor_tgl_aktif'    => $request->customer_paspor_tgl_aktif,
            'customer_paspor_tgl_habis'    => $request->customer_paspor_tgl_habis
        ]);

        if ($request->has('document')) {
            if (count($customer->getMedia('customers')) > 0) {
                foreach ($customer->getMedia('customers') as $media) {
                    if (!in_array($media->file_name, $request->input('document', []))) {
                        $media->delete();
                    }
                }
            }

            $media = $customer->getMedia('customers')->pluck('file_name')->toArray();

            foreach ($request->input('document', []) as $file) {
                if (count($media) === 0 || !in_array($file, $media)) {
                    $customer->addMedia(Storage::path('temp/dropzone/' . $file))->toMediaCollection('customers');
                }
            }

            //

            if (count($customer->getMedia('ktp')) > 0) {
                foreach ($customer->getMedia('ktp') as $media1) {
                    if (!in_array($media1->file_name, $request->input('document1', []))) {
                        $media1->delete();
                    }
                }
            }

            $media1 = $customer->getMedia('ktp')->pluck('file_name')->toArray();

            foreach ($request->input('document1', []) as $file1) {
                if (count($media1) === 0 || !in_array($file1, $media1)) {
                    $customer->addMedia(Storage::path('temp/dropzone/' . $file1))->toMediaCollection('ktp');
                }
            }

            //

            if (count($customer->getMedia('kk')) > 0) {
                foreach ($customer->getMedia('kk') as $media2) {
                    if (!in_array($media2->file_name, $request->input('document2', []))) {
                        $media2->delete();
                    }
                }
            }

            $media2 = $customer->getMedia('kk')->pluck('file_name')->toArray();

            foreach ($request->input('document2', []) as $file2) {
                if (count($media2) === 0 || !in_array($file2, $media2)) {
                    $customer->addMedia(Storage::path('temp/dropzone/' . $file2))->toMediaCollection('kk');
                }
            }

            //

            if (count($customer->getMedia('paspor')) > 0) {
                foreach ($customer->getMedia('paspor') as $media3) {
                    if (!in_array($media3->file_name, $request->input('document3', []))) {
                        $media3->delete();
                    }
                }
            }

            $media3 = $customer->getMedia('paspor')->pluck('file_name')->toArray();

            foreach ($request->input('document3', []) as $file3) {
                if (count($media3) === 0 || !in_array($file3, $media3)) {
                    $customer->addMedia(Storage::path('temp/dropzone/' . $file3))->toMediaCollection('paspor');
                }
            }

            //

            if (count($customer->getMedia('vaksin')) > 0) {
                foreach ($customer->getMedia('vaksin') as $media4) {
                    if (!in_array($media4->file_name, $request->input('document4', []))) {
                        $media4->delete();
                    }
                }
            }

            $media4 = $customer->getMedia('vaksin')->pluck('file_name')->toArray();

            foreach ($request->input('document4', []) as $file4) {
                if (count($media4) === 0 || !in_array($file4, $media4)) {
                    $customer->addMedia(Storage::path('temp/dropzone/' . $file4))->toMediaCollection('vaksin');
                }
            }

        }

        $manifest->update([
            'mitra_id'                   => $request->mitra_id,
            'mitra_name'                 => $request->mitra_name,
            'package_id'                 => $request->package_id,
            'customer_id'                => $request->customer_id,
            'customer_kode'              => $request->customer_kode,
            'customer_ktp_name'          => $request->customer_ktp_name,
            'customer_paspor_name'       => $request->customer_paspor_name,
            'customer_paspor_number'     => $request->customer_paspor_number,
            'visa'                       => $request->visa,
            'siskopatuh'                 => $request->siskopatuh,
            'hotel'                      => $request->hotel
        ]);


        toast('Data Manifest Jamaah Updated!', 'info');

        return redirect()->route('manifests.index', $request->package_id);
    }


    public function destroy(Manifest $manifest) {
        abort_if(Gate::denies('delete_customers'), 403);

        $manifest->delete();

        toast('Data Manifest Jamaah Deleted!', 'warning');

        return redirect()->route('manifests.index', $request->package_id);
    }

}

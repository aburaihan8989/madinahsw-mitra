<?php

namespace Modules\People\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Upload\Entities\Upload;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Modules\People\Entities\Customer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\Renderable;
use Modules\People\DataTables\CustomersDataTable;

class CustomersController extends Controller
{

    public function index(CustomersDataTable $dataTable) {
        abort_if(Gate::denies('access_customers'), 403);

        return $dataTable->render('people::customers.index');
    }


    public function create() {
        abort_if(Gate::denies('create_customers'), 403);

        return view('people::customers.create');
    }


    public function store(Request $request) {
        abort_if(Gate::denies('create_customers'), 403);

        $request->validate([
            // 'customer_ktp_nik'         => 'required|max:255',
            // 'customer_ktp_name'        => 'required|max:255',
            // 'customer_phone'           => 'required',
            // 'customer_email'           => 'required|email|max:255',
            // 'customer_ktp_city'        => 'required|max:255',
            // 'customer_ktp_gender'      => 'required',
            // 'customer_ktp_tmp_lahir'   => 'required|max:255',
            // 'customer_ktp_tgl_lahir'   => 'required',
            // 'customer_ktp_alamat'      => 'required',
        ]);

        $customer = Customer::create([
            'mitra_id'                     => auth()->user()->id,
            'mitra_name'                   => auth()->user()->name,
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

        // if ($request->has('document')) {
        //     foreach ($request->input('document') as $file) {
        //         $customer->addMedia(Storage::path('temp/dropzone/' . $file))->toMediaCollection('customers');
        //     }
        // }

        if ($request->has('document')) {
            foreach ($request->input('document', []) as $file) {
                $customer->addMedia(Storage::path('temp/dropzone/' . $file))->toMediaCollection('customers');
            }

            foreach ($request->input('document1', []) as $file1) {
                $customer->addMedia(Storage::path('temp/dropzone/' . $file1))->toMediaCollection('ktp');
            }

            foreach ($request->input('document2', []) as $file2) {
                $customer->addMedia(Storage::path('temp/dropzone/' . $file2))->toMediaCollection('kk');
            }

            foreach ($request->input('document3', []) as $file3) {
                $customer->addMedia(Storage::path('temp/dropzone/' . $file3))->toMediaCollection('paspor');
            }

            foreach ($request->input('document4', []) as $file4) {
                $customer->addMedia(Storage::path('temp/dropzone/' . $file4))->toMediaCollection('vaksin');
            }
        }

        toast('Data Jamaah Created!', 'success');

        return redirect()->route('customers.index');
    }


    public function show(Customer $customer) {
        abort_if(Gate::denies('show_customers'), 403);

        return view('people::customers.show', compact('customer'));
    }


    public function edit(Customer $customer) {
        abort_if(Gate::denies('edit_customers'), 403);

        return view('people::customers.edit', compact('customer'));
    }


    public function update(Request $request, Customer $customer) {
        abort_if(Gate::denies('update_customers'), 403);

        $request->validate([
            // 'customer_ktp_nik'         => 'required|max:255',
            // 'customer_ktp_name'        => 'required|max:255',
            // 'customer_phone'           => 'required',
            // 'customer_email'           => 'required|email|max:255',
            // 'customer_ktp_city'        => 'required|max:255',
            // 'customer_ktp_gender'      => 'required',
            // 'customer_ktp_tmp_lahir'   => 'required|max:255',
            // 'customer_ktp_tgl_lahir'   => 'required',
            // 'customer_ktp_alamat'      => 'required',
        ]);

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

        // if ($request->has('document')) {
        //     if (count($product->getMedia('images')) > 0) {
        //         foreach ($product->getMedia('images') as $media) {
        //             if (!in_array($media->file_name, $request->input('document', []))) {
        //                 $media->delete();
        //             }
        //         }
        //     }

        //     $media = $product->getMedia('images')->pluck('file_name')->toArray();

        //     foreach ($request->input('document', []) as $file) {
        //         if (count($media) === 0 || !in_array($file, $media)) {
        //             $product->addMedia(Storage::path('temp/dropzone/' . $file))->toMediaCollection('images');
        //         }
        //     }
        // }

        toast('Data Jamaah Updated!', 'info');

        return redirect()->route('customers.index');
    }


    public function destroy(Customer $customer) {
        abort_if(Gate::denies('delete_customers'), 403);

        $customer->delete();

        toast('Data Jamaah Deleted!', 'warning');

        return redirect()->route('customers.index');
    }


}

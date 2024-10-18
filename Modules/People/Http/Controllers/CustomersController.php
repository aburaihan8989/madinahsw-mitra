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
            'mitra_id'                  => auth()->user()->id,
            'mitra_name'                => auth()->user()->name,
            'customer_ktp_nik'          => $request->customer_ktp_nik,
            'customer_ktp_name'         => $request->customer_ktp_name,
            'customer_phone'            => $request->customer_phone,
            'customer_email'            => $request->customer_email,
            'customer_ktp_city'         => $request->customer_ktp_city,
            'customer_ktp_gender'       => $request->customer_ktp_gender,
            'customer_ktp_tmp_lahir'    => $request->customer_ktp_tmp_lahir,
            'customer_ktp_tgl_lahir'    => $request->customer_ktp_tgl_lahir,
            'customer_ktp_alamat'       => $request->customer_ktp_alamat
        ]);

        if ($request->has('document')) {
            foreach ($request->input('document') as $file) {
                $customer->addMedia(Storage::path('temp/dropzone/' . $file))->toMediaCollection('customers');
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
            'mitra_id'                  => $request->mitra_id,
            'mitra_name'                => $request->mitra_name,
            'customer_ktp_nik'          => $request->customer_ktp_nik,
            'customer_ktp_name'         => $request->customer_ktp_name,
            'customer_phone'            => $request->customer_phone,
            'customer_email'            => $request->customer_email,
            'customer_ktp_city'         => $request->customer_ktp_city,
            'customer_ktp_gender'       => $request->customer_ktp_gender,
            'customer_ktp_tmp_lahir'    => $request->customer_ktp_tmp_lahir,
            'customer_ktp_tgl_lahir'    => $request->customer_ktp_tgl_lahir,
            'customer_ktp_alamat'       => $request->customer_ktp_alamat
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
        }

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

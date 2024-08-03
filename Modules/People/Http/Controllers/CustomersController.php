<?php

namespace Modules\People\Http\Controllers;

use Modules\People\DataTables\CustomersDataTable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\People\Entities\Customer;
use Illuminate\Support\Facades\Storage;
use Modules\Upload\Entities\Upload;

class CustomersController extends Controller
{

    public function index(CustomersDataTable $dataTable) {
        // abort_if(Gate::denies('access_customers'), 403);

        return $dataTable->render('people::customers.index');
    }


    public function create() {
        // abort_if(Gate::denies('create_customers'), 403);

        return view('people::customers.create');
    }


    public function store(Request $request) {
        // abort_if(Gate::denies('create_customers'), 403);

        $customer = Customer::create([
            // 'nik_number'     => $request->nik_number,
            'customer_name'  => $request->customer_name,
            // 'date_birth'     => $request->date_birth,
            'customer_phone' => $request->customer_phone,
            'customer_email' => $request->customer_email,
            'gender'         => $request->gender,
            'city'           => $request->city,
            'address'        => $request->address
        ]);

        if ($request->has('document')) {
            foreach ($request->input('document') as $file) {
                $customer->addMedia(Storage::path('temp/dropzone/' . $file))->toMediaCollection('photos');
            }
        }

        toast('Customer Created!', 'success');

        return redirect()->route('customers.index');
    }


    public function show(Customer $customer) {
        // abort_if(Gate::denies('show_customers'), 403);

        return view('people::customers.show', compact('customer'));
    }


    public function edit(Customer $customer) {
        // abort_if(Gate::denies('edit_customers'), 403);

        return view('people::customers.edit', compact('customer'));
    }


    public function update(Request $request, Customer $customer) {
        // abort_if(Gate::denies('update_customers'), 403);

        $customer->update([
            // 'nik_number'     => $request->nik_number,
            'customer_name'  => $request->customer_name,
            // 'date_birth'     => $request->date_birth,
            'customer_phone' => $request->customer_phone,
            'customer_email' => $request->customer_email,
            'gender'         => $request->gender,
            'city'           => $request->city,
            'status'         => $request->status,
            'address'        => $request->address
        ]);

        if ($request->has('document')) {
            if (count($customer->getMedia('photos')) > 0) {
                foreach ($customer->getMedia('photos') as $media) {
                    if (!in_array($media->file_name, $request->input('document', []))) {
                        $media->delete();
                    }
                }
            }

            $media = $customer->getMedia('photos')->pluck('file_name')->toArray();

            foreach ($request->input('document', []) as $file) {
                if (count($media) === 0 || !in_array($file, $media)) {
                    $customer->addMedia(Storage::path('temp/dropzone/' . $file))->toMediaCollection('photos');
                }
            }
        }

        toast('Customer Updated!', 'info');

        return redirect()->route('customers.index');
    }


    public function destroy(Customer $customer) {
        // abort_if(Gate::denies('delete_customers'), 403);

        $customer->delete();

        toast('Customer Deleted!', 'warning');

        return redirect()->route('customers.index');
    }
}

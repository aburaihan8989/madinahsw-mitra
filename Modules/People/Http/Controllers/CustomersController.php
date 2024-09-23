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
        // abort_if(Gate::denies('access_customers'), 403);

        return $dataTable->render('people::customers.index');
    }


    public function create() {
        // abort_if(Gate::denies('create_customers'), 403);
        $getdata = Http::get(settings()->api_url . 'api/agent/' . auth()->user()->agent_id);
        $agent = $getdata->json();

        return view('people::customers.create', compact('agent'));
    }


    public function store(Request $request) {
        // abort_if(Gate::denies('create_customers'), 403);

        $request->validate([
            'rating'     => 'nullable|integer|between:0,100'
        ]);

        $customer = Customer::create([
            'agent_id'       => $request->agent_id,
            'agent_code'     => $request->agent_code,
            'agent_name'     => $request->agent_name,
            // 'nik_number'     => $request->nik_number,
            'customer_name'  => $request->customer_name,
            // 'date_birth'     => $request->date_birth,
            'customer_phone' => $request->customer_phone,
            'customer_email' => $request->customer_email,
            'gender'         => $request->gender,
            'city'           => $request->city,
            'rating'         => $request->rating,
            'fu_notes'       => $request->fu_notes,
            'address'        => $request->address
        ]);

        if ($request->has('document')) {
            foreach ($request->input('document') as $file) {
                $customer->addMedia(Storage::path('temp/dropzone/' . $file))->toMediaCollection('photos');
            }
        }

        toast('Prospek Customer Created!', 'success');

        return redirect()->route('customers.index');
    }


    public function show(Customer $customer) {
        // abort_if(Gate::denies('show_customers'), 403);
        $getdata = Http::get(settings()->api_url . 'api/agent/' . auth()->user()->agent_id);
        $agent = $getdata->json();

        return view('people::customers.show', compact('customer', 'agent'));
    }


    public function edit(Customer $customer) {
        // abort_if(Gate::denies('edit_customers'), 403);
        $getdata = Http::get(settings()->api_url . 'api/agent/' . auth()->user()->agent_id);
        $agent = $getdata->json();

        return view('people::customers.edit', compact('customer', 'agent'));
    }


    public function update(Request $request, Customer $customer) {
        // abort_if(Gate::denies('update_customers'), 403);

        $request->validate([
            'rating'     => 'nullable|integer|between:0,100'
        ]);

        $customer->update([
            'agent_id'       => $request->agent_id,
            'agent_code'     => $request->agent_code,
            'agent_name'     => $request->agent_name,
            // 'nik_number'     => $request->nik_number,
            'customer_name'  => $request->customer_name,
            // 'date_birth'     => $request->date_birth,
            'customer_phone' => $request->customer_phone,
            'customer_email' => $request->customer_email,
            'gender'         => $request->gender,
            'city'           => $request->city,
            'rating'         => $request->rating,
            'fu_notes'       => $request->fu_notes,
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

        toast('Prospek Customer Updated!', 'info');

        return redirect()->route('customers.index');
    }


    public function destroy(Customer $customer) {
        // abort_if(Gate::denies('delete_customers'), 403);

        $customer->delete();

        toast('Prospek Customer Deleted!', 'warning');

        return redirect()->route('customers.index');
    }


    public function markCustomer($customer_id) {
        // abort_if(Gate::denies('update_customers'), 403);

        DB::table('customers')
            ->where('id', $customer_id)
            ->update(['mark' => 1]);

        toast('Mark As Potential Customer!', 'info');

        return redirect()->route('rewards-customers-list.show-customers');
    }


    public function getCustomerProspek() {
        // abort_if(Gate::denies('show_customers'), 403);
        $data = Customer::all();

        return $data;
    }


    public function getCustomer($customer_id) {
        // abort_if(Gate::denies('show_customers'), 403);
        $data = Customer::findOrFail($customer_id);

        return $data;
    }


    public function updateCustomer($customer_id, Request $request) {
        // abort_if(Gate::denies('update_customers'), 403);
        // @dd($request);
        $data = DB::table('customers')
                ->where('id', $customer_id)
                ->update(['rating' => $request->rating, 'fu_notes' => $request->fu_notes, 'status' => $request->status]);
    }

}

<?php

namespace Modules\People\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Upload\Entities\Upload;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\Renderable;

class RewardsController extends Controller
{

    // API Handling

    public function getCustomerNetwork() {
        // abort_if(Gate::denies('access_customers'), 403);
        $getdata = Http::get(settings()->api_url . 'api/customer-network/' . auth()->user()->agent_id);
        $customer_network = $getdata->json();

        return view('people::agents.rewards.show-customers', compact('customer_network'));
    }


    public function getAgentNetwork() {
        // abort_if(Gate::denies('access_customers'), 403);
        $getdata = Http::get(settings()->api_url . 'api/agent-network/' . auth()->user()->agent_id);
        $agent_network = $getdata->json();

        return view('people::agents.rewards.show-agents', compact('agent_network'));
    }


    public function getCustomerReferalNetwork($agent_id) {
        // abort_if(Gate::denies('access_customers'), 403);
        $getdata = Http::get(settings()->api_url . 'api/customer-referal-network/' . $agent_id);
        $customer_referal_network = $getdata->json();

        return view('people::agents.rewards.show-customers-referal', compact('customer_referal_network'));
    }

    public function getPotentialCustomer() {
        // abort_if(Gate::denies('access_customers'), 403);
        $getdata = Http::get(settings()->api_url . 'api/potential-customer/' . auth()->user()->agent_id);
        $potential_customer = $getdata->json();

        return view('people::agents.rewards.potential-customers', compact('potential_customer'));
    }

    public function markPotentialCustomer($customer_id) {
        // abort_if(Gate::denies('update_customers'), 403);

        $postdata = Http::post(settings()->api_url . 'api/mark-customers/' . $customer_id);

        toast('Mark As Potential Customer!', 'info');

        return redirect()->route('rewards-customers-list.show-customers');
    }

    public function editPotentialCustomer($customer_id) {
        // abort_if(Gate::denies('edit_customers'), 403);

        $getdata = Http::get(settings()->api_url . 'api/customer/' . $customer_id);
        $customer = $getdata->json();

        return view('people::agents.rewards.edit-potential', compact('customer'));
    }

    public function postPotentialPoin($customer_id, Request $request) {
        // abort_if(Gate::denies('update_customers'), 403);
        $customer_poin = $request->rating;
        $notes = $request->fu_notes;

        $postdata = Http::post(settings()->api_url . 'api/poin-customers/' . $customer_id . '/' . $customer_poin . '/' . $notes);

        toast('Potential Poin Customer Updated!', 'info');

        return redirect()->route('potential-customers-list.potential-customers');
    }


}

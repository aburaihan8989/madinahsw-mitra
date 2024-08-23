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

    public function getUmrohCustomers() {
        // abort_if(Gate::denies('access_customers'), 403);
        $getdata = Http::get(settings()->api_url . 'api/umroh-customers/' . auth()->user()->agent_id);
        $customer_network = $getdata->json();

        return view('people::agents.rewards.umroh-customers', compact('customer_network'));
    }

    public function getHajjCustomers() {
        // abort_if(Gate::denies('access_customers'), 403);
        $getdata = Http::get(settings()->api_url . 'api/hajj-customers/' . auth()->user()->agent_id);
        $customer_network = $getdata->json();

        return view('people::agents.rewards.hajj-customers', compact('customer_network'));
    }

    public function markUmrohCustomer($customer_id) {
        // abort_if(Gate::denies('update_customers'), 403);

        $postdata = Http::post(settings()->api_url . 'api/mark-umroh-customer/' . $customer_id);

        toast('Mark As Potential Umroh Customer!', 'info');

        return redirect()->route('umroh-customers.data');
    }

    public function markHajjCustomer($customer_id) {
        // abort_if(Gate::denies('update_customers'), 403);

        $postdata = Http::post(settings()->api_url . 'api/mark-hajj-customer/' . $customer_id);

        toast('Mark As Potential Umroh Customer!', 'info');

        return redirect()->route('umroh-customers.data');
    }

    public function getPotentialUmrohCustomers() {
        // abort_if(Gate::denies('access_customers'), 403);
        $getdata = Http::get(settings()->api_url . 'api/potential-umroh-customers/' . auth()->user()->agent_id);
        $potential_customer = $getdata->json();

        return view('people::agents.rewards.potential-umroh-customers', compact('potential_customer'));
    }


    public function editPotentialUmrohCustomer($customer_id) {
        // abort_if(Gate::denies('edit_customers'), 403);

        $getdata = Http::get(settings()->api_url . 'api/umroh-customer/' . $customer_id);
        $customer = $getdata->json();

        return view('people::agents.rewards.edit-potential-umroh-customer', compact('customer'));
    }


    public function postPoinUmrohCustomer($customer_id, Request $request) {
        // abort_if(Gate::denies('update_customers'), 403);
        // $customer_poin = $request->rating;
        // $notes = $request->fu_notes;

        // $postdata = Http::post(settings()->api_url . 'api/poin-customers/' . $customer_id . '/' . $customer_poin . '/' . $notes);
        $postdata = Http::post(settings()->api_url . 'api/umroh-customer/' . $customer_id, $request->input());

        // @dd($postdata);
        toast('Potential Umroh Customer Updated!', 'info');

        return redirect()->route('potential-umroh-customers.data');
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


}

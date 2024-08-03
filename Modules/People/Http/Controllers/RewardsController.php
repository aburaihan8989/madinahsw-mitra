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
        $getdata = Http::get(settings()->api_url . 'api/customer-network/' . auth()->user()->agent_id);
        $potential_customer = $getdata->json();

        return view('people::agents.rewards.potential-customers', compact('potential_customer'));
    }

}

<?php

namespace Modules\People\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Upload\Entities\Upload;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\Renderable;

class AgentPaymentsController extends Controller
{

    // API Handling

    public function getAgentPayment() {
        // abort_if(Gate::denies('access_customers'), 403);
        $getdata = Http::get(settings()->api_url . 'api/agent-payment/' . auth()->user()->agent_id);
        $agent_payment = $getdata->json();

        return view('people::agents.payments.index', compact('agent_payment'));
    }


}

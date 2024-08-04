<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    public function index() {

        $getdata = Http::get(settings()->api_url . 'api/agent/' . auth()->user()->agent_id);
        $agent = $getdata->json();

        $getdata = Http::get(settings()->api_url . 'api/count-agent-network/' . auth()->user()->agent_id);
        $agents_count = $getdata->json();

        $getdata = Http::get(settings()->api_url . 'api/count-customer-network/' . auth()->user()->agent_id);
        $customers_count = $getdata->json();

        $getdata = Http::get(settings()->api_url . 'api/count-potential-customer/' . auth()->user()->agent_id);
        $potential_customers_count = $getdata->json();

        $getdata = Http::get(settings()->api_url . 'api/umroh-package');
        $umroh_package = $getdata->json();

        $getdata = Http::get(settings()->api_url . 'api/hajj-package');
        $hajj_package = $getdata->json();

        return view('home', compact(
            'agent',
            'agents_count',
            'customers_count',
            'potential_customers_count',
            'umroh_package',
            'hajj_package'
            ));
    }
}

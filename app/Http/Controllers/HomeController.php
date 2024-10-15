<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\Package\Entities\Package;
use Illuminate\Support\Facades\Http;
use Modules\People\Entities\Customer;

class HomeController extends Controller
{

    public function index() {

        $customers = Customer::count();
        $packages = Package::count();

        return view('home', compact(
            'customers',
            'packages'
            ));
    }
}

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

        if (auth()->user()->id == 1) {
            $customers = Customer::count();
            $packages = Package::count();
        } else {
            $customers = Customer::where('mitra_id', auth()->user()->id)->count();
            $packages = Package::where('mitra_id', auth()->user()->id)->count();
        }

        return view('home', compact(
            'customers',
            'packages'
            ));
    }
}

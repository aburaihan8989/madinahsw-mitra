<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Modules\Package\Entities\Package;
use Modules\Package\Entities\Product;
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

        $products = Product::all();

        return view('home', compact(
            'customers',
            'packages',
            'products'
            ));
    }
}

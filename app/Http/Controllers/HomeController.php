<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Modules\People\Entities\Teacher;

class HomeController extends Controller
{

    public function index() {

        $teachers = Teacher::count();
        $students = Teacher::count();
        $kegiatan = Teacher::count();

        return view('home', compact(
            'teachers',
            'students',
            'kegiatan'
            ));
    }
}

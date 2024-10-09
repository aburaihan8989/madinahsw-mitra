<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\Study\Entities\Studie;
use Illuminate\Support\Facades\Http;
use Modules\People\Entities\Student;
use Modules\People\Entities\Teacher;

class HomeController extends Controller
{

    public function index() {

        $teachers = Teacher::count();
        $students = Student::count();
        $studies = Studie::count();
        $kegiatan = Teacher::count();

        return view('home', compact(
            'teachers',
            'students',
            'studies',
            'kegiatan'
            ));
    }
}

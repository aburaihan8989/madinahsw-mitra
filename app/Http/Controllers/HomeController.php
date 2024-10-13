<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\Study\Entities\Studie;
use Illuminate\Support\Facades\Http;
use Modules\People\Entities\Student;
use Modules\People\Entities\Teacher;
use Modules\Report\Entities\Kelas2Task;
use Modules\Report\Entities\Kelas3Task;
use Modules\Report\Entities\Kelas1Task;

class HomeController extends Controller
{

    public function index() {

        $teachers = Teacher::count();
        $students = Student::count();
        $studies = Studie::count();
        $kelas1 = Kelas1Task::count();
        $kelas2 = Kelas2Task::count();
        $kelas3 = Kelas3Task::count();

        return view('home', compact(
            'teachers',
            'students',
            'studies',
            'kelas1',
            'kelas2',
            'kelas3'
            ));
    }
}

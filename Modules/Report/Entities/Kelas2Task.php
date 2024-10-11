<?php

namespace Modules\Report\Entities;

use Illuminate\Support\Carbon;
use Modules\Report\Entities\Kelas2Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas2Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Kelas2Task::max('id') + 1;
            $model->kelas2_task_code = make_reference_id('K2', $number);
        });
    }

    public function getDateAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y');
    }

}

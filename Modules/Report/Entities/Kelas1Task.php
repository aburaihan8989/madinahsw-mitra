<?php

namespace Modules\Report\Entities;

use Illuminate\Support\Carbon;
use Modules\Report\Entities\Kelas1Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas1Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Kelas1Task::max('id') + 1;
            $model->kelas1_task_code = make_reference_id('K1', $number);
        });
    }

    public function getDateAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y');
    }

}

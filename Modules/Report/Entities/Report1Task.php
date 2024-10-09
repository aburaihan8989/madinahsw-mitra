<?php

namespace Modules\Report\Entities;

use Illuminate\Support\Carbon;
use Modules\Report\Entities\Report1Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report1Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Report1Task::max('id') + 1;
            $model->report1task_code = make_reference_id('K1', $number);
        });
    }

    public function getDateAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y');
    }

}

<?php

namespace Modules\Report\Entities;

use Illuminate\Support\Carbon;
use Modules\Report\Entities\Kelas2Result;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas2Result extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Kelas2Result::max('id') + 1;
            $model->kelas2_result_code = make_reference_id('RK2', $number);
        });
    }

    public function getDateAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y');
    }

}

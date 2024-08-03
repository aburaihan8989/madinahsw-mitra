<?php

namespace Modules\Reports\Entities;

use Illuminate\Support\Carbon;
use Modules\Reports\Entities\Activity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Activity::max('id') + 1;
            $model->reference = make_reference_id('RPT', $number);
        });
    }

    public function getDateAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y');
    }

}

<?php

namespace Modules\Report\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public static function boot() {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $number = UmrohExpense::max('id') + 1;
    //         $model->reference = make_reference_id('UXP', $number);
    //     });
    // }

    // public function getDateAttribute($value) {
    //     return Carbon::parse($value)->format('d-m-Y');
    // }

}

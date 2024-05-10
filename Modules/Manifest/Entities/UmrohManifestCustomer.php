<?php

namespace Modules\Manifest\Entities;

use Modules\People\Entities\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UmrohManifestCustomer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function umrohManifestPayments() {
        return $this->hasMany(UmrohManifestPayment::class, 'id', 'umroh_manifest_customer_id');
    }

    // public function umrohCustomers() {
    //     return $this->belongsTo(Customer::class, 'customer_id', 'id');
    // }

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = UmrohManifestCustomer::max('id') + 1;
            $model->reference = make_reference_id('CM', $number);
        });
    }

    public function getTotalPriceAttribute($value) {
        return $value;
    }

    public function getTotalPaymentAttribute($value) {
        return $value;
    }

    public function getRemainingPaymentAttribute($value) {
        return $value;
    }

}
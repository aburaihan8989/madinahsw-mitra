<?php

namespace Modules\People\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Customer extends Model implements HasMedia
{

    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $with = ['media'];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Customer::max('id') + 1;
            $model->customer_kode = make_reference_id('J', $number);
        });
    }

    public function registerMediaCollections(): void {
        $this->addMediaCollection('customers')
            ->useFallbackUrl('/images/fallback_profile_image.png');

        $this->addMediaCollection('ktp')
            ->useFallbackUrl('/images/fallback_profile_image.png');

        $this->addMediaCollection('kk')
            ->useFallbackUrl('/images/fallback_profile_image.png');

        $this->addMediaCollection('paspor')
            ->useFallbackUrl('/images/fallback_profile_image.png');

        $this->addMediaCollection('vaksin')
            ->useFallbackUrl('/images/fallback_profile_image.png');

    }

}

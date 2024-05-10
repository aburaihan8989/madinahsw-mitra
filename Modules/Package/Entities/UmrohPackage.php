<?php

namespace Modules\Package\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Product\Notifications\NotifyQuantityAlert;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UmrohPackage extends Model implements HasMedia
{

    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $with = ['media'];

    public function umrohManifest() {
        return $this->belongsTo(UmrohManifest::class, 'package_id', 'id');
    }

    public function registerMediaCollections(): void {
        $this->addMediaCollection('brosurs')
            ->useFallbackUrl('/images/fallback_product_image.png');
    }

    public function registerMediaConversions(Media $media = null): void {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50);
    }

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = UmrohPackage::max('id') + 1;
            $model->package_code = make_reference_id('UP', $number);
        });
    }


    public function setPackageCostAttribute($value) {
        $this->attributes['package_cost'] = ($value * 100);
    }

    public function getPackageCostAttribute($value) {
        return ($value / 100);
    }

    public function setPackagePriceAttribute($value) {
        $this->attributes['package_price'] = ($value * 100);
    }

    public function getPackagePriceAttribute($value) {
        return ($value / 100);
    }
}
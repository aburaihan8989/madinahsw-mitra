<?php

namespace Modules\Package\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Product extends Model implements HasMedia
{

    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $with = ['media'];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Product::max('id') + 1;
            $model->product_code = make_reference_id('P', $number);
        });
    }

    public function registerMediaCollections(): void {
        $this->addMediaCollection('products')
            ->useFallbackUrl('/images/fallback_profile_image.png');
    }

    // public function setProductCostAttribute($value) {
    //     $this->attributes['product_cost'] = ($value * 100);
    // }

    // public function getProductCostAttribute($value) {
    //     return ($value / 100);
    // }

}

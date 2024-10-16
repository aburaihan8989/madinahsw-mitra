<?php

namespace Modules\Package\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Package extends Model implements HasMedia
{

    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $with = ['media'];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Package::max('id') + 1;
            $model->package_code = make_reference_id('K', $number);
        });
    }

    public function registerMediaCollections(): void {
        $this->addMediaCollection('packages')
            ->useFallbackUrl('/images/fallback_profile_image.png');
    }

}

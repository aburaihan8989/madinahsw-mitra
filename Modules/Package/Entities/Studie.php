<?php

namespace Modules\Study\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Studie extends Model implements HasMedia
{

    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $with = ['media'];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Studie::max('id') + 1;
            $model->studi_code = make_reference_id('P', $number);
        });
    }

    public function registerMediaCollections(): void {
        $this->addMediaCollection('studies')
            ->useFallbackUrl('/images/fallback_profile_image.png');
    }

}

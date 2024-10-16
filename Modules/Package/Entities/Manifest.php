<?php

namespace Modules\Package\Entities;

use Spatie\MediaLibrary\HasMedia;
use Modules\People\Entities\Customer;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Manifest extends Model implements HasMedia
{

    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $with = ['media'];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Manifest::max('id') + 1;
            $model->manifest_code = make_reference_id('M', $number);
        });
    }

    public function registerMediaCollections(): void {
        $this->addMediaCollection('manifest')
            ->useFallbackUrl('/images/fallback_profile_image.png');
    }

}

<?php

namespace Modules\People\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Teacher extends Model implements HasMedia
{

    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $with = ['media'];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Teacher::max('id') + 1;
            $model->teacher_kode = make_reference_id('G', $number);
        });
    }

    public function registerMediaCollections(): void {
        $this->addMediaCollection('teachers')
            ->useFallbackUrl('/images/fallback_profile_image.png');
    }

}

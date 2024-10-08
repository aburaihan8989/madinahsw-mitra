<?php

namespace Modules\People\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Student extends Model implements HasMedia
{

    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $with = ['media'];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Student::max('id') + 1;
            $model->student_kode = make_reference_id('S', $number);
        });
    }

    public function registerMediaCollections(): void {
        $this->addMediaCollection('students')
            ->useFallbackUrl('/images/fallback_profile_image.png');
    }

}

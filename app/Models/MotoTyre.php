<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MotoTyre extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'moto_tyres';

    protected $appends = [
        'thumbnail',
        'banner',
        'gallery',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'tagline',
        'slug',
        'pattern',
        'moto_brand_id',
        'moto_model_id',
        'moto_engine_id',
        'moto_width_id',
        'moto_size_id',
        'moto_ratio_id',
        'short_description',
        'long_description',
        'features',
        'specifications',
        'advantages',
        'warranty',
        'video',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
        public const PATTERN  = [
            '0' => 'Please Select',
            '1' => 'Angel City',
            '2' =>'Rosso II',
            '3' =>'Rosso III',
            '4' =>'Sports Demon',
            
        ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function moto_brand()
    {
        return $this->belongsTo(MotoBrand::class, 'moto_brand_id');
    }

    public function moto_model()
    {
        return $this->belongsTo(MotoModel::class, 'moto_model_id');
    }

    public function moto_engine()
    {
        return $this->belongsTo(MotoEngine::class, 'moto_engine_id');
    }

    public function moto_width()
    {
        return $this->belongsTo(MotoWidth::class, 'moto_width_id');
    }

    public function moto_size()
    {
        return $this->belongsTo(MotoSize::class, 'moto_size_id');
    }

    public function moto_ratio()
    {
        return $this->belongsTo(MotoRatio::class, 'moto_ratio_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }




    public function scopesearchMotoTyreByModel($query, Request $request)
    {

        if ($request->input('brand_id')) {
            $query->where('moto_brand_id', $request->input('brand_id'));
        }

        if ($request->input('model_id')) {
            $query->where('moto_model_id', $request->input('model_id'));
        }

        if ($request->input('engine_id')) {
            $query->where('moto_engine_id', $request->input('engine_id'));
        }





        return $query;
    }






    public function scopesearchMotoTyreBySize($query, Request $request)
    {

        if ($request->input('width_id')) {
            $query->where('moto_width_id', $request->input('width_id'));
        }

        if ($request->input('ratio_id')) {
            $query->where('moto_ratio_id', $request->input('ratio_id'));
        }

        if ($request->input('size_id')) {
            $query->where('moto_size_id', $request->input('size_id'));
        }





        return $query;
    }



    public function getThumbnailAttribute()
    {
        $file = $this->getMedia('thumbnail')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getBannerAttribute()
    {
        $file = $this->getMedia('banner')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }
    
       public function getGalleryAttribute()
    {
        $files = $this->getMedia('gallery');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

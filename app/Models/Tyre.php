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

class Tyre extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'tyres';

    protected $appends = [
        'thumbnail',
        'banner',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'brand_id',
        'body_id',
        'fuel_id',
        'transmission_id',
        'engine_id',
        'chassis_id',
        'year_id',
        'width_id',
        'ratio_id',
        'size_id',
        'short_description',
        'long_description',
        'features',
        'specifications',
        'warranty',
        'video',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function models()
    {
        return $this->belongsToMany(CarModel::class);
    }

    public function body()
    {
        return $this->belongsTo(Body::class, 'body_id');
    }

    public function categoys()
    {
        return $this->belongsToMany(Category::class);
    }

    public function fuel()
    {
        return $this->belongsTo(Fuel::class, 'fuel_id');
    }

    public function transmission()
    {
        return $this->belongsTo(Transmission::class, 'transmission_id');
    }

    public function engine()
    {
        return $this->belongsTo(Engine::class, 'engine_id');
    }

    public function chassis()
    {
        return $this->belongsTo(Chassis::class, 'chassis_id');
    }

    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id');
    }

    public function width()
    {
        return $this->belongsTo(Width::class, 'width_id');
    }

    public function ratio()
    {
        return $this->belongsTo(Ratio::class, 'ratio_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }


    public function scopeFilterByRequest($query, Request $request)
    {
        if ($request->input('width_id')) {
            $query->where('width_id', $request->input('width_id'));
        }

        if ($request->input('ratio_id')) {
            $query->where('ratio_id', $request->input('ratio_id'));
        }

        if ($request->input('size_id')) {
            $query->where('size_id', $request->input('size_id'));
        }

//        if ($request->input('categories')) {
//            $query->whereHas('categories',
//                function ($query) use ($request) {
//                    $query->where('id', $request->input('categories'));
//                });
//        }

//        if ($request->input('search')) {
//            $query->where('name', 'LIKE', '%'.$request->input('search').'%');
//        }

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

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

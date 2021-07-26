<?php

namespace App\Models;

use App\Category;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Retailer extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'retailers';

    protected $appends = [
        'banner',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'vehicle_type_id',
        'shop_name',
        'name',
        'city_id',
        'active',
        'address',
        'description',
        'latitude',
        'longitude',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function vehicle_type()
    {
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class);
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


    public function scopeSearchResults($query)
    {





            return $query->where([
                    ['active', '=', '1'],
                    ['vehicle_type_id', '=', '1'],
                ])

                ->when(request()->filled('search'), function($query) {
                    $query->where(function($query) {
                        $search = request()->input('search');
                        $query->where('name', 'LIKE', "%$search%")
                            ->orWhere('description', 'LIKE', "%$search%")
                            ->orWhere('address', 'LIKE', "%$search%");
                    });
                })
                ->when(request()->filled('city_id'), function($query) {
                    $query->whereHas('city', function($query) {
                        $query->where('id', request()->input('city_id'));
                    });
                });







    }


    public function scopeMotoSearchResults($query)
    {





        return $query->where([
            ['active', '=', '1'],
            ['vehicle_type_id', '=', '2'],
        ])

            ->when(request()->filled('search'), function($query) {
                $query->where(function($query) {
                    $search = request()->input('search');
                    $query->where('name', 'LIKE', "%$search%")
                        ->orWhere('description', 'LIKE', "%$search%")
                        ->orWhere('address', 'LIKE', "%$search%");
                });
            })
            ->when(request()->filled('city_id'), function($query) {
                $query->whereHas('city', function($query) {
                    $query->where('id', request()->input('city_id'));
                });
            });







    }



}

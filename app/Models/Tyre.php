<?php

namespace App\Models;

use App\Http\Controllers\SearchController;
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



    public const ACTIVATED_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];
    
    public const SERIES  = [
            '0' => 'Please Select',
            '1' => 'Cinturato P1',
            '2' =>'Cinturato P7',
            '3' =>'P-Zero',
            '4' =>'Scorpion',
            
        ];
    
    
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
        'slug',
        'width_id',
        'ratio_id',
        'size_id',
        'dry_id',
        'wet_id',
        'sport_id',
        'comfort_id',
        'mileage_id',
        'tagline',
        'short_description',
        'long_description',
        'advantages',
        'features',
        'specifications',
        'warranty',
        'video',
        'technology_runflat',
        'technology_pncs',
        'technology_seal_inside',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    public const PERFORMANCES  = [
            '1' => 1,
            '2' =>2,
            '3' =>3,
            '4' =>4,
            '5' =>5,
            '6' =>6,
            '7' =>7,
            '8' =>8,
            '9' =>9,
            '10' =>10
            
        ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function model_combinations()
    {
        return $this->belongsToMany(ModelCombination::class);
    }

    public function categoys()
    {
        return $this->belongsToMany(Category::class);
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

    public function scopeFilterByRequest($query, Request $request)
    {

        $condition = []; // ModelCombination Condition

        if(isset($request->brand_id)) {
            $brand_id = $request->brand_id;
            $condition = ['model_combinations.brand_id' => $request->brand_id];
        }
        if(isset($request->model_id)) {
            $model = CarModel::find($request->model_id);
            $model_id = $model->id;
            $make_id = $model->make_id;
            $condition = array_merge($condition, ['model_combinations.car_model_id' => $request->model_id]);

//            $years = Year::whereHas(
//                'model_combinations', function($q) use($model_id) {
//                $q->where(['car_model_id' => $model_id]);
//            }
//            )->get();


        }

        if(isset($request->engine_id)) {
            $engine_id = $request->engine_id;
            $condition = array_merge($condition, ['engine_id' => $request->engine_id]);
        }


        $engines = [];
        // Tyre Query
        $query  = Tyre::where('published', 1);

        if(isset($request->year_id)) {
            $year_id = $request->year_id;

            $query->whereHas('model_combinations.years', function($q) use($year_id, $condition) {
                $q->where($condition);
                $q->where(['years.id' => $year_id]);
            });

            $engines =  Engine::whereHas('model_combinations', function($q) use($model_id) {
                $q->where(['car_model_id' => $model_id]);
            })->whereHas(
                'model_combinations.years', function($q) use($year_id) {
                $q->where(['id' => $year_id]);
            }
            )->get();

        } else {
            $query = $query->whereHas('model_combinations', function($q) use($condition) {
                $q->where($condition);
            });
        }


        return $query;
    }


    public function scopeFilterBySize($query, Request $request)
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



        return $query;
    }


}

<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CarRegistration extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'car_registrations';

    protected $appends = [
        'invoice_attachment',
        'photos',
    ];

    protected $dates = [
        'date_purchased',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'city_id',
        'zip',
        'address',
        'date_purchased',
        'invoice_number',
        'product_name_id',
        'product_size_id',
        'product_dot',
        'product_quantity',
        'retailer_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function getDatePurchasedAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDatePurchasedAttribute($value)
    {
        $this->attributes['date_purchased'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getInvoiceAttachmentAttribute()
    {
        return $this->getMedia('invoice_attachment')->last();
    }

    public function product_name()
    {
        return $this->belongsTo(Product::class, 'product_name_id');
    }

    public function product_size()
    {
        return $this->belongsTo(ProductSize::class, 'product_size_id');
    }

    public function getPhotosAttribute()
    {
        $files = $this->getMedia('photos');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    public function retailer()
    {
        return $this->belongsTo(Retailer::class, 'retailer_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

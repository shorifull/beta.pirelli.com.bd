<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MotoModel extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'moto_models';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'model',
        'moto_brand_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function moto_brand()
    {
        return $this->belongsTo(MotoBrand::class, 'moto_brand_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

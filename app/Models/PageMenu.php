<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageMenu extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'page_menus';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'page_id',
        'order',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

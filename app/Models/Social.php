<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Social extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'socials';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'facebook',
        'twitter',
        'linked_in',
        'google_plus',
        'pinterest',
        'you_tube',
        'instagram',
        'tumblr',
        'flickr',
        'reddit',
        'snapchat',
        'whats_app',
        'quora',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

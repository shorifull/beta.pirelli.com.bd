<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const SMTP_SSL_SELECT = [
        'yes' => 'yes',
        'no'  => 'no',
    ];

    public const SMTP_ACTIVATED_SELECT = [
        'yes' => 'yes',
        'no'  => 'no',
    ];

    public $table = 'emails';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'send_email_from',
        'receive_email_to',
        'smtp_activated',
        'smtp_ssl',
        'smtp_host',
        'smtp_port',
        'smtp_username',
        'smtp_password',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

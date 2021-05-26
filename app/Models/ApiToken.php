<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiToken extends Model
{
    use HasFactory;

    public function isExpired()
    {
        $created = Carbon::parse($this->created_at);
        $now = Carbon::now();

        if($now->diffInMinutes($created) < 58) {
            return false;
        }

        return true;
    }
}

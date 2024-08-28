<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BasicInfo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'Creator_id',
        'user_id',
    ];

    protected $primaryKey = 'Creator_id';
}

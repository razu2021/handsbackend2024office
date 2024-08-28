<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddEducation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'education_id',
        'user_id',
    ];
    protected $primaryKey = 'education_id';
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class apply_course extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'apply_course_id',
        'status',
        'slug',
        'post_status',

    ];
    protected $primaryKey = 'apply_course_id';
    public function creatorInfo(){
        return $this->belongsTo('App\Models\admin','creator','id');
    }
    public function editorInfo(){
        return $this->belongsTo('App\Models\admin','editor','id');
    }
}

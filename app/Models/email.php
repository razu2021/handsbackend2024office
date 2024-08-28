<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class email extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'email_id',
        'status',
        'post_status',
        'slug',

    ];
    protected $primaryKey = 'social_media_id';
    public function creatorInfo(){
        return $this->belongsTo('App\Models\admin','creator','id');
    }
    public function editorInfo(){
        return $this->belongsTo('App\Models\admin','editor','id');
    }


  
}

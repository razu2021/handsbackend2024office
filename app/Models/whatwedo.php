<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class whatwedo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'whatwedo_id',
        'status',
        'slug',
        'post_status',

    ];
    protected $primaryKey = 'whatwedo_id';
    public function creatorInfo(){
        return $this->belongsTo('App\Models\admin','creator','id');
    }
    public function editorInfo(){
        return $this->belongsTo('App\Models\admin','editor','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class phone extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'phone_id',
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

    // add another model deafult   

  




}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class dipositads extends Model
{
    use HasFactory;
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'dipositads_id',
        'status',
        'slug',
        'post_status',

    ];
    protected $primaryKey = 'dipositads_id';
    public function creatorInfo(){
        return $this->belongsTo('App\Models\admin','creator','id');
    }
    public function editorInfo(){
        return $this->belongsTo('App\Models\admin','editor','id');
    }
}

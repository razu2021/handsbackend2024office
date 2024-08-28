<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class bladeinfo extends Model
{
    use HasFactory;
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'blades_id',
        'blade_unique_name',
        'status',
        'slug',
    ];
    protected $primaryKey = 'blades_id';
    public function creatorInfo(){
        return $this->belongsTo('App\Models\admin','creator','id');
    }
    public function editorInfo(){
        return $this->belongsTo('App\Models\admin','editor','id');
    }


}

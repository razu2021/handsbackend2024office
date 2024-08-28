<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class main_menu extends Model
{
    use HasFactory;
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'manu_id',
        'menu_url',
        'status',
        'post_status',

    ];

    protected $primaryKey = 'menu_id';

    public function creatorInfo(){
        return $this->belongsTo('App\Models\admin','creator','id');
    }

    public function editorInfo(){
        return $this->belongsTo('App\Models\admin','editor','id');
    }


}

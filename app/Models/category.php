<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'category_id',
        'main_menu_id',
        'status',
        'post_status',

    ];

    protected $primaryKey = 'category';

    public function creatorInfo(){
        return $this->belongsTo('App\Models\admin','creator','id');
    }

    public function editorInfo(){
        return $this->belongsTo('App\Models\admin','editor','id');
    }

    public function mainMenu()
    {
        return $this->belongsTo(main_menu::class, 'main_menu_id');
    }

}

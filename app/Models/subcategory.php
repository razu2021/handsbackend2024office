<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class subcategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'subcategory_id',
        'main_menu_id',
        'category_menu_id',
        'status',
        'post_status',

    ];
    protected $primaryKey = 'subcategory_id';
    public function creatorInfo(){
        return $this->belongsTo('App\Models\admin','creator','id');
    }
    public function editorInfo(){
        return $this->belongsTo('App\Models\admin','editor','id');
    }
    public function mainMenu()
    {
        return $this->belongsTo(main_menu::class, 'main_menu_id','menu_id');
    }
    public function categoryMenu()
    {
        return $this->belongsTo(category::class, 'category_menu_id','category_id');
    }
}

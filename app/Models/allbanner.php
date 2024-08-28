<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class allbanner extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'banner_id',
        'page_id',
        'status',
        'slug',
        'post_status',

    ];
    protected $primaryKey = 'banner_id';
    public function creatorInfo(){
        return $this->belongsTo('App\Models\admin','creator','id');
    }
    public function editorInfo(){
        return $this->belongsTo('App\Models\admin','editor','id');
    }


    public function mainPageName(){
        return $this->belongsTo('App\Models\main_menu','main_page_id','menu_id');
       
    }
    public function categoryPageName(){
        return $this->belongsTo('App\Models\category','category_page_id','category_id');
       
    }
    public function subcategoryPageName(){
        return $this->belongsTo('App\Models\subcategory','subcategory_page_id','subcategory_id');
       
    }




}

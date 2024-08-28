<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class socialmediaurl extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'social_media_id',
        'status',
        'post_status',
    ];
    protected $primaryKey = 'social_media_id';
    public function creatorInfo(){
        return $this->belongsTo('App\Models\admin','creator','id');
    }
    public function editorInfo(){
        return $this->belongsTo('App\Models\admin','editor','id');
    }
    public function socialMediaName(){
        return $this->belongsTo('App\Models\socialmedia','social_mediaid','social_media_id');
    }
}
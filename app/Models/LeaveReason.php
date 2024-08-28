<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveReason extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'reason_id',
        'slug',
        'status',
        'unique_id',
        'post_status',
    ];

    protected $primaryKey='reason_id';

    public function Creator(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin','creator','id');
    }
    public function editorinfo(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin','editor','id');
    }

}

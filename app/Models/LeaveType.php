<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
class LeaveType extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'types_id',
        'slug',
        'post_status',
    ];

    protected $primaryKey='types_id';

    public function Creator(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin','creator','id');
    }
    public function editorinfo(): BelongsTo
    {
        return $this->belongsTo('App\Models\Admin','editor','id');
    }

}

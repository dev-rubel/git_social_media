<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = [
        'followable_type', 'followable_id', 'label_id', 'label',
    ];

    public function followable()
    {
        return $this->morphTo();
    }

    public function labelInfo()
    {
        if($this->label == 'page') {
            return $this->belongsTo(Page::class, 'label_id');
        }

        if($this->label == 'user') {
            return $this->belongsTo(User::class, 'label_id');
        }
    }
}

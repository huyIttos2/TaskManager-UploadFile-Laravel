<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageupLoad extends Model
{
    public function task(){
        return $this->belongsTo(Task::class);
    }

    protected $fillable = ['path', 'content_id'];
}

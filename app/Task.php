<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Task extends Model
{
    use Notifiable;
    protected $fillable =[
        'inputTitle','inputContent','inputDueDate', 'image'
    ];
    public function images(){
        return $this->hasMany(ImageupLoad::class);
    }
    public function category(){
        return $this->belongsTo("App\Category");
    }
}

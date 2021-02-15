<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
   

    protected $fillable=[
        'name', "carbohydrates", 'protein', 'fat'
    ];

    public function user()
    {
       return $this->belongsTo("App\Models\Meal");
    //    return $this->belongsTo(User::class);
    }
}
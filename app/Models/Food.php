<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
   

    protected $fillable=[
        'name', "carbohydrates", 'protein', 'fat', "meal_id"
    ];

    public function meal()
    {
       return $this->belongsTo("App\Models\Meal");
    //    return $this->belongsTo(User::class);
    }

    public function calories() 
    {
       return (($this->protein * 4) + ($this->fat * 9) + ($this->carbohydrates * 4));
    }
}
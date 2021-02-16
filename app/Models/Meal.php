<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    public function foods() 
    {
       return $this->hasMany(Food::class);
    }

    protected $fillable=[
        'name'
    ];

    public function user()
    {
       return $this->belongsTo("App\Models\User");
    //    return $this->belongsTo(User::class);
    }

    public function mealCalories() 
    {
        return $this->foods->reduce(function($total, $food){
           return $total += $food->calories();
        }, 0);
    }


}

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

    protected $fillable = [
        'name'
    ];

    public function user()
    {
        return $this->belongsTo("App\Models\User");
        //    return $this->belongsTo(User::class);
    }

    public function mealCalories()
    {
        return $this->foods->reduce(function ($total, $food) {
            return $total += $food->calories();
        }, 0);
    }

    public function protein()
    {
        return $this->foods->reduce(function ($total, $food) {
            return $total += $food->protein;
        }, 0);
    }
    
    public function carbs()
    {
        return $this->foods->reduce(function ($total, $food) {
            return $total += $food->carbohydrates;
        }, 0);
    }
    
    public function fats()
    {
        return $this->foods->reduce(function ($total, $food) {
            return $total += $food->fat;
        }, 0);
    }
}


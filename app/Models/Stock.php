<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'detail',
        'fee',
        'imgpath',
        'user_id',
    ];


    public function users()
    {
        return $this->belongsToMany(User::class, 'carts');
    }
    
    // public function carts()
    // {
    //     return $this->hasMany(Cart::class);
    // }
}

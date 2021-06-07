<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}

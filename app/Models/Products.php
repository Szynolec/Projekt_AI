<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products'; // Nazwa tabeli w bazie danych

    public $timestamps = false;

    protected $fillable = [
        'type',
        'img',
        'des',
        'cost',
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointment'; // Nazwa tabeli w bazie danych

    public $timestamps = false;

    protected $fillable = [
        'id_product',
        'id_user',
        'date',
        'hour'
    ];

    // Relacja: Wizyta należy do użytkownika
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relacja: Wizyta dotyczy produktu
    public function product(){
        return $this->belongsTo(Products::class, 'id_product');
    }
}

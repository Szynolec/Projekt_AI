<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model implements Authenticatable
{
    use HasFactory, Notifiable;

    public $timestamps = false;

    /**
     * Atrybuty, które można masowo przypisać.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'name', 'last_name', 'phone_number', 'address', 'role',
    ];

    /**
     * Atrybuty, które powinny być ukryte w tablicach.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';
    protected $primaryKey = 'id';

    /**
     * Pobierz nazwę unikalnego identyfikatora użytkownika.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Pobierz unikalny identyfikator użytkownika.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Pobierz hasło użytkownika.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Pobierz wartość tokena dla sesji "remember me".
     *
     * @return string|null
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Ustaw wartość tokena dla sesji "remember me".
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Pobierz nazwę kolumny dla tokenu "remember me".
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}

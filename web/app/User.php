<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "login";

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getTipoAttribute($value)
    {
        return $value == 1 ? "Admin":"User";
    }

    public function getativoAttribute($value)
    {
        return $value == 1 ? "Ativo":"Desativado";
    }

}

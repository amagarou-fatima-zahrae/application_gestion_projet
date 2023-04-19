<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_Personne extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users()
    {
        return $this->morphToMany(User::class, 'userable');
    }

    public function factures()
    {
        return $this->morphMany(Facture::class,'facturable');
    }
}

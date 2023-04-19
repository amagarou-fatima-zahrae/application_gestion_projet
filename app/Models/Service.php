<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function factures()
    {
        return $this->morphToMany(Facture::class, 'facturable')->withPivot(['quantite_vendue']);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

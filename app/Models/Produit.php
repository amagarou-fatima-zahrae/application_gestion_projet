<?php

namespace App\Models;

use App\Models\Facture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function factures()
    {
        return $this->morphToMany(Facture::class, 'facturable')->withPivot(['quantite_vendue']);;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
  
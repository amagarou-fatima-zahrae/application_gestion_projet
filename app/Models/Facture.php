<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facture extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function paiements()
    {
      return $this->hasMany(Paiement::class)->orderBy('created_at','DESC');
    }

    public function produits()
    {
        return $this->morphedByMany(Produit::class, 'facturable')->withPivot(['quantite_vendue']);
    }
  
    public function services()
    {  
        return $this->morphedByMany(Service::class, 'facturable')->withPivot(['quantite_vendue']);
    } 

    public function facturable()
    {
        return $this->morphTo();
    }
}

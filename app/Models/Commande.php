<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity'
    ];

    public function customer() {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->belongsTo(Produit::class);
    }
}

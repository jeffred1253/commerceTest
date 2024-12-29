<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'libelle',
        'quantity_stock',
        'price',
        'vendor_id'
    ];

    public function Vendor() {
        return $this->belongsTo(User::class);
    }
}

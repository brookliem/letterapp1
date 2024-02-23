<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $fillable = ['namabarang', 'jumlah', 'satuan', 'keterangan', 'harga', 'template_id',];

    // Define the inverse of the one-to-many relationship
    public function template()
    {
        return $this->belongsTo(Templates::class, 'template_id');
    }
}

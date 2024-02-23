<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KonvenCessieSebelum extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggaldibuat',
        'nomorsurat',
        'namadebitur',
        'nomorperjanjiankredit',
        'tanggalperjanjian',
        'alamatdebitur',
        'tanggalpembukuanbank',
        'pokok',
        'denda',
        'bunga',
        'lainlain',
        'cpmenangani',
        'email',
        'phone',
        'tanggaltenggatwaktu',
        'privateofficer',
        'privatedphead'
    ];
}

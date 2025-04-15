<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTDH extends Model
{
    protected $table = "chitiet_hd";

    protected $fillable = [
        'MaDH',
        'MaSP',
        'SLMua',
        'DonGiaMua'
    ];

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'MaSP', 'MaSP');
    }

    use HasFactory;
}
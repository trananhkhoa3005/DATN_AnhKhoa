<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{


    public function index()
    {
        $sp = SanPham::orderBy('created_at', 'desc')->get(); // Sắp xếp giảm dần theo created_at
        return view('home', compact('sp'));
    }

    protected $primaryKey = 'MaSP';
    protected $table = "san_phams";

    protected $fillable = [
        'TenSP',
        'HinhAnh',
        'MaLoai',
        'MaHSX',
        'DonGia',
        
    ];

    public function loaiSP()
    {
        return $this->belongsTo(LoaiSP::class, 'MaLoai', 'MaLoai');
    }

    public function hangSX()
    {
        return $this->belongsTo(HangSX::class, 'MaHSX', 'MaHSX');
    }
    
    use HasFactory;
}

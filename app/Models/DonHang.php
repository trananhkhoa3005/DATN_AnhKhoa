<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = "don_hangs";
    protected $primaryKey = 'MaDH';
    protected $fillable = [
        'MaND',
        'TenND',
        'DiaChi',
        'SDT',
        'Email',
        'NgayDH',
        'PTTT',
        'TrangThai', // Thêm cột này
    ];
    

    public function nguoiDung()
    {
        return $this->belongsTo(User::class, 'MaND', 'MaND');
    }

    public function showStatus()
    {
        return $this->belongsTo(Status::class, 'TrangThai','id');
        
    }
    

    use HasFactory;
}
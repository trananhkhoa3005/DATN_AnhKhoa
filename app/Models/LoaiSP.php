<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSP extends Model
{
    protected $primaryKey = 'MaLoai';
    protected $table      = "loai_sp";
    // public function sanPhams()
    // {
    //     return $this->hasMany(SanPham::class, 'MaLoai', 'MaLoai');
    // }

    use HasFactory;
}
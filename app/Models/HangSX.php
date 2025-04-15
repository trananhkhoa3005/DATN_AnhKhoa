<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HangSX extends Model
{
    protected $primaryKey = 'MaHSX';

    protected $table = "hang_sx";
    // public function sanPhams()
    // {
    //     return $this->hasMany(SanPham::class, 'MaHSX', 'MaHSX');
    // }

    use HasFactory;
}
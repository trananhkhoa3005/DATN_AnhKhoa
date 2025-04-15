<?php
namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\HangSX;
use App\Models\LoaiSP;
use App\Models\SanPham;
use App\Models\User;
use Illuminate\Http\Request;

class homeController extends Controller
{
    //
    public function index(Request $request)
    {
        $loaisp     = LoaiSP::all();
        $hsx        = HangSX::all();
        $sanphamhot = SanPham::all();

        $maloai = $request->query('maloai');
        $mahsx  = $request->query('mahsx');

        $query = SanPham::query();
        if ($maloai) {
            $query->where('maloai', $maloai);
        }
        if ($mahsx) {
            $query->where('mahsx', $mahsx);
        }
        $sanpham = $query->get();

        return view('home.index', compact('loaisp', 'hsx', 'sanpham', 'sanphamhot'));
    }

    public function ctsp($id)
    {
        $sanpham = SanPham::findOrFail($id);
        $loaisp  = LoaiSP::all();
        $hsx     = HangSX::all();

        return view('home.ctsp', compact('loaisp', 'hsx', 'sanpham'));
    }
    public function myaccount()
    {
        $sanpham = SanPham::all();
        $loaisp  = LoaiSP::all();
        $hsx     = HangSX::all();
        return view('home.myAccount', compact('loaisp', 'hsx', 'sanpham'));
    }

    public function postmyaccount(Request $request)
    {
        $user           = User::find(auth()->id());
        $user->name     = $request->name;
        $user->DiaChi   = $request->address;
        $user->SDT      = $request->phone;
        $user->password = isset($request->password)  ? bcrypt($request->password) : $user->password;
        $user->save();

        return redirect()->back();
    }

    public function myorder()
    {
        $sanpham = SanPham::all();
        $loaisp  = LoaiSP::all();
        $hsx     = HangSX::all();

        $orders = DonHang::where('MaND',auth()->id())->get();

        return view('home.myorder', compact('loaisp', 'hsx', 'sanpham','orders'));
    }

    public function myordershow($id)
    {
        $sanpham = SanPham::all();
        $loaisp  = LoaiSP::all();
        $hsx     = HangSX::all();

        $orders = DonHang::where('MaND',auth()->id())->get();

        return view('home.myorder', compact('loaisp', 'hsx', 'sanpham','orders'));
    }


    public function CTDH($id)
    {
        $dh = DonHang::findOrFail($id);
        $ctdh = CTDH::with('sanPham')->where('MaDH', $id)->get();
        $status = Status::all();
        return view('home.CTDH', compact('dh', 'status', 'ctdh'));
    }
    public function InHD($id)
    {
        $dh = DonHang::with('nguoiDung')->findOrFail($id);
        $ctdh = CTDH::with('sanPham')->where('MaDH', $id)->get();
        $currentDate = Carbon::now()->format('d/m/Y');

        return view('home.InHD', compact('dh', 'ctdh', 'currentDate'));
    }

}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CTDH;
use App\Models\DonHang;
use App\Models\HangSX;
use App\Models\LoaiSP;
use App\Models\SanPham;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Redirect;
use Session;
require_once(resource_path('views/admin/ChuyenSoThanhChu.php'));

class adminController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }

    public function LoaiSP()
    {
        $loaisp = LoaiSP::paginate(10);
        return view('admin.loaisp', compact('loaisp'));
    }

    public function LoaiSPedit($id){
        $types = LoaiSP::find($id);
        return view('admin.editTypeSP', compact('types'));
    }

    public function LoaiSPeput($id, Request $request){
        $types = LoaiSP::find($id);
        $types->TenLoai = $request->name;
        $types->MoTa = $request->mota;
        $types->save();

        return redirect()->route('admin.loaisp');
    }

    public function HangSX()
    {
        $hangsx = HangSX::paginate(10);
        return view('admin.hangsx', compact('hangsx'));
    }

    public function HangSXedit($id){
        $cate = HangSX::find($id);

        return view('admin.editHang', compact('cate'));
    }

    public function HangSXput($id, Request $request){
        $cate = HangSX::find($id);
        $cate->TenHSX = $request->name;
        $cate->MoTa = $request->mota;
        $cate->save();

        return redirect()->route('admin.hangsx');
    }

    public function User()
    {
        $user = User::paginate(10);
        return view('admin.user', compact('user'));
    }

    public function Userput($id, Request $request){
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->DiaChi = $request->address;
        $users->SDT = $request->phone;
        $users->password = isset($request->password) ? bcrypt($request->password) : $users->password;
        $users->save();

        return redirect()->route('admin.user');
    }

    public function Useredit($id){
        $users = User::find($id);

        return view('admin.editAcount',compact('users'));
    }

    //---------------Đơn hàng-----------------------//
    public function DonHang()
    {
        $donhang = DonHang::with('nguoiDung')->paginate(10);
        $status = Status::all();
        return view('admin.donhang', compact('donhang', 'status'));
    }
    public function XNDH(Request $request, $id)
    {
        $dh = DonHang::findOrFail($id);
        $dh->TrangThai = $request->trangthai;
        $dh->save();
        return redirect()->route('admin.donhang');
    }
    public function CTDH($id)
    {
        $dh = DonHang::findOrFail($id);
        $ctdh = CTDH::with('sanPham')->where('MaDH', $id)->get();
        $status = Status::all();
        return view('admin.CTDH', compact('dh', 'status', 'ctdh'));
    }

    public function InHD($id)
    {
        $dh = DonHang::with('nguoiDung')->findOrFail($id);
        $ctdh = CTDH::with('sanPham')->where('MaDH', $id)->get();
        $currentDate = Carbon::now()->format('d/m/Y');

        return view('admin.InHD', compact('dh', 'ctdh', 'currentDate'));
    }

    //---------------Sản Phẩm-----------------------//
    public function SanPham()
    {
        $sanpham = SanPham::with('loaiSP', 'hangSX')->paginate(5);
        return view('admin.sanpham', compact('sanpham'));
    }
    public function XoaSP($id)
    {
        $sanpham = SanPham::findOrFail($id);
        return view('admin.frmXoaSP', compact('sanpham'));
    }
    public function XLXoaSP(Request $request, $id)
    {
        $sanpham = SanPham::findOrFail($id);

        // Xóa tệp hình ảnh cũ nếu có
        $fileName = 'storage/admin/img/' . $sanpham->HinhAnh;
        if (file_exists($fileName)) {
            unlink($fileName);
        }

        // Xóa sản phẩm từ cơ sở dữ liệu
        $sanpham->delete();

        // Chuyển hướng sau khi xóa với thông báo thành công
        return redirect()->route('admin.sanpham')->with('success', 'Sản phẩm đã được xóa thành công');
    }
    public function SuaSP($id)
    {
        $sanpham = SanPham::findOrFail($id);
        $loaisp = LoaiSP::all();
        $hsx = HangSX::all();
        return view('admin.frmSuaSP', compact('sanpham', 'loaisp', 'hsx'));
    }
    public function XLSuaSP(Request $request, $id)
    {
        $validation = $request->validate([
            'anhdaidien' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
            'txt_tensp' => 'required|string|max:255',
            'loaisp' => 'required',
            'hangsx' => 'required',
            'dongia' => 'required|numeric',
        ]);

        $sanpham = SanPham::findOrFail($id);
        $sanpham->TenSP = $request->txt_tensp;
        $sanpham->MaLoai = $request->loaisp;
        $sanpham->MaHSX = $request->hangsx;
        $sanpham->DonGia = $request->dongia;

        if ($request->hasFile('anhdaidien')) {
            $fileName = 'storage/admin/img/' . $sanpham->HinhAnh;
            if (file_exists($fileName)) {
                unlink($fileName);
            }
            $file = $request->file('anhdaidien');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/admin/img', $fileName);
            $sanpham->HinhAnh = $fileName;
        }
        $sanpham->save();
        return redirect()->route('admin.sanpham');
    }
    public function ThemSP()
    {
        $sanpham = SanPham::all();
        $loaisp = LoaiSP::all();
        $hsx = HangSX::all();

        return view('admin.frmThemSP', compact('sanpham', 'loaisp', 'hsx'));
    }
    public function XLThemSP(Request $request)
    {
        $validation = $request->validate([
            'anhdaidien' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
            'txt_tensp' => 'required|string|max:255',
            'loaisp' => 'required',
            'hangsx' => 'required',
            'dongia' => 'required|numeric',
        ]);

        // Tạo mới một bản ghi trong bảng SanPham
        $sanpham = new SanPham;
        $sanpham->TenSP = $request->txt_tensp;
        $sanpham->MaLoai = $request->loaisp;
        $sanpham->MaHSX = $request->hangsx;
        $sanpham->DonGia = $request->dongia;

        // Xử lý lưu hình ảnh
        if ($request->hasFile('anhdaidien')) {
            $file = $request->file('anhdaidien');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/admin/img', $fileName);
            $sanpham->HinhAnh = $fileName;
        }
        // Lưu bản ghi vào cơ sở dữ liệu
        $sanpham->save();
        // Chuyển hướng sau khi thêm sản phẩm
        return redirect()->route('admin.sanpham');
    }


    //-----------------------Loại Sản Phẩm---------------//
}
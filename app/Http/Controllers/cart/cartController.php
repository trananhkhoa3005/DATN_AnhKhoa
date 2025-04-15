<?php

namespace App\Http\Controllers\cart;

use App\Http\Controllers\Controller;
use App\Models\CTDH;
use App\Models\DonHang;
use App\Models\HangSX;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use App\Models\LoaiSP;


class cartController extends Controller
{
    //
    public function index()
    {
        $cart = Session::get('cart', []);
        $loaisp = LoaiSP::all();
        $hsx = HangSX::all();
        return view('cart.giohang', compact('cart', 'loaisp', 'hsx'));
    }
    public function themGH(Request $request)
    {
        $idsp = $request->input('idsp');
        $tensp = $request->input('tensp');
        $price = $request->input('price');
        $img = $request->input('img');
        $sl = $request->input('sl');

        $cart = Session::get('cart', []);

        if (isset($cart[$idsp])) {
            // Nếu đã tồn tại, tăng số lượng sản phẩm
            $cart[$idsp]['sl'] += $sl;
        } else {
            // Nếu chưa tồn tại, thêm mới sản phẩm vào giỏ hàng
            $sanpham = [
                'idsp' => $idsp,
                'tensp' => $tensp,
                'price' => $price,
                'img' => $img,
                'sl' => $sl
            ];
            $cart[$idsp] = $sanpham;
        }

        // Lưu lại giỏ hàng vào session
        Session::put('cart', $cart);
        return redirect()->route('home.index');
    }
    public function xltt(Request $request)
    {
        $email = session()->get('email');
        $user = User::where('email', $email)->firstOrFail();

        //Thêm vào bảng DonHang
        $donhang = new DonHang;
        $donhang->MaND = $user->MaND;
        $donhang->TenND = $request->name;
        $donhang->NgayDH = Carbon::now();
        $donhang->DiaChi = $request->diachi;
        $donhang->SDT = $request->dienthoai;
        $donhang->Email = $request->email;
        $donhang->PTTT = $request->phuongthuc;
        $donhang->TrangThai;
        $donhang->save();

        $MaDH = $donhang->getKey();
        //Thêm vào bảng CTDH
        foreach(session('cart') as $item) {
            $ct = new CTDH;
            $ct->MaDH = $MaDH;
            $ct->MaSP = $item['idsp'];
            $ct->SLMua = $item['sl'];
            $ct->DonGiaMua = $item['price'];
            $ct->save();
        }
    
        // Xóa session 'cart' sau khi đã xử lý xong
        session()->forget('cart');

        return redirect()->route('home.index')->with('Thành công', 'Bạn đã thanh toán thành công!');
    }
    public function checkout()
    {
        $email = session()->get('email');
        if (!$email) {
            return redirect()->route('login')->with('Lỗi', 'Bạn cần đăng nhập để thanh toán');
        }

        $loaisp = LoaiSP::all();
        $hsx = HangSX::all();
        $user = User::where('email', $email)->firstOrFail();
        return view('cart.thanhtoan', compact('user', 'loaisp', 'hsx'));
    }

    public function delete($id)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }
        return redirect()->route('cart.index')->with('Thành công', 'Sản phẩm đã được xóa');
    }


    public function update()
    {
        return redirect()->route('home.index');
    }
}

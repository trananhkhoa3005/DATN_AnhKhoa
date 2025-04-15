<?php
namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
// use Auth, Session, Redirect;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    //
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $email = $request->input('email');
            $pass  = $request->input('pass');
            if (Auth::attempt(['email' => $email, 'password' => $pass])) {
                $user = Auth::user();
                Session::put('username', $user->name);
                Session::put('email', $user->email);
                Session::put('phanquyen', $user->phanquyen);

                return Redirect::to('/admin/index');
            } else {
                return Redirect::to('/login')->withInput()->withErrors('Email hoặc password không đúng!');
            }
        }

        return view('login');
    }

    public function signup(Request $request)
    {
        if ($request->isMethod('post')) {
            $name  = $request['name'];
            $email = $request['email'];
            $pass  = bcrypt($request['pass']);
            $sdt   = $request['phone'];

            $user           = new User();
            $user->email    = $email;
            $user->name     = $name;
            $user->password = $pass;
            $user->SDT      = $sdt;
            $user->save();

            return redirect()->route('login');
        }

        return view('signup');
    }

    public function logout()
    {
        Auth::logout();
        // Xóa các giá trị cụ thể khỏi session
        // Session::forget('username');
        // Session::forget('phanquyen');
        Session::flush();

        return redirect()->route('home.index');
    }
}
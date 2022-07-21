<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login()
    {
        if(auth()->check()) {
            return redirect()->back();
        }
        return view('auth.login');
    }

    public function register()
    {
        if(auth()->check()) {
            return redirect()->back();
        }
        return view('auth.register');
    }
    public function registerhr()
    {
        return view('auth.registerhr');
    }

    public function callback()
    {
        $user = Socialite::driver('github')->user();
        $isUser = User::where('email', $user->getEmail())->first();
        if ($isUser) {
            Auth::login($isUser);
            return redirect()->route('home');
        }
        return redirect()
            ->route('auth.register')
            ->with([
                'email' => $user->getEmail(),
                'name' => $user->getName(),
                'message' => "Vui Lòng Điền Mật Khẩu Để Hoàn Tất Đăng Ký",
            ]);
    }

    public function registration(Request $request)
    {
        $arrRule = [
            'name' => 'bail|required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
        ];
        // $arrRuleMessage = [
        //     'name.required' => 'Bắt buộc phải điền tên!',
        //     'email.required' => 'Bắt buộc điền email!',
        //     'email.unique' => 'Email đã tồn tại!',
        //     'password.required' => 'Bắt buộc điền password!',
        //     'password.min' => 'Password có ít nhất 4 ký tự!',
        // ];
        $role = 0;
        if ($request->has(['phone', 'address'])) {
            $arrRule['address'] = ['required'];
            $arrRule['phone'] = ['required', 'regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/'];
            // $arrRuleMessage['address.required'] = 'Bắt buộc phải điền địa chỉ!';
            // $arrRuleMessage['phone.regex'] = 'Không đúng định dạng số điện thoại!';
            $role = 1;
        }

        $request->validate($arrRule);
        $User = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $request->password,
            'role' => $role,

        ]);
        Auth::login($User);
        return redirect()->back();
    }
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);
        $user = $request->only('email', 'password');
        $remember_me = $request->has('remember_me') ? true : false;
        if (Auth::attempt($user, $remember_me)) {
            if (Auth::user()->role == 2) {
                return redirect()->intended(route('admin.dashboard'));
            }
            return redirect()->intended(route('home'));
        }
        return redirect()->route('auth.login')->with([
            'error' => 'Sai Tài Khoản Hoặc Mật Khẩu!',
            'email' => $request->email,
            'password' => $request->password,
        ]);
    }
    public function getInfoUser($id)
    {
        $user = User::findOrFail($id);
        return  response()->json([
            'user' => $user,
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}

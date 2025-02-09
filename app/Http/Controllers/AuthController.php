<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
  
class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }
  
    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'Admin'
        ]);
  
        return redirect()->route('login');
    }
  
    public function login()
    {
        return view('auth/login');
    }
  
    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();
  
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
        $request->session()->regenerate();
  
        return redirect()->route('dashboard');
    }

    public function resetPassword(Request $request)
{
    // التحقق من صحة البيانات المدخلة
    Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|confirmed|min:8'
    ])->validate();

    // البحث عن المستخدم عبر البريد الإلكتروني
    $user = User::where('email', $request->email)->first();

    // إذا لم يتم العثور على المستخدم، قم بإرجاع رسالة خطأ
    if (!$user) {
        return redirect()->route('password.reset')->withErrors(['email' => 'البريد الإلكتروني غير موجود']);
    }

    // تحديث كلمة المرور
    $user->password = Hash::make($request->password);
    $user->save();

    // إعادة توجيه المستخدم إلى صفحة تسجيل الدخول مع رسالة نجاح
    return redirect()->route('login')->with('status', 'تم تحديث كلمة المرور بنجاح');
}

  
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
  
        $request->session()->invalidate();
  
        return redirect('/');
    }
 
    public function profile()
    {
        return view('profile');
    }
}
<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register_form() {
        return view('admin.auth.register');
    }

    protected function register(Register $request)
    {
        $user = User::create($request->all());

        $user->roles()->attach(4);

        Mail::to(request('email'))->queue(new UserRegisterMail($user));

        Alert::success('Təbriklər!',trans('auth.regsuccess'));

        return redirect()->route('index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class MainController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        //dump($request->all());
        $query = DB::table('users')
            ->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = DB::table('users')
            ->where('email', $request->email)
            ->first();

        //dd($user);
        if ($user) {
            if ($user->is_admin == 1) {
                if (Hash::check($request->password, $user->password)) {
                    $request->session()->put('LoggedAdmin', $user->id);
                    return redirect()->route('admin');
                } else {
                    return back()->with('fail', 'Не правильний логін або пароль');
                }
            } else if ($user->is_admin == 0) {
                if (Hash::check($request->password, $user->password)) {
                    $request->session()->put('LoggedUser', $user->id);
                    return redirect()->route('profile');
                } else {
                    return back()->with('fail', 'Не правильний логін або пароль');
                }
            }
        } else {
            return back()->with('fail', 'Не правильний логін або пароль');
        }
    }
}

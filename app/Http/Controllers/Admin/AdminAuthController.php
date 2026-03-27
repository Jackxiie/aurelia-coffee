<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $admin = DB::table('admins')
            ->where('email', $request->email)
            ->where('password', $request->password)
            ->first();

        if ($admin) {
            Session::put('admin_id', $admin->id);
            Session::put('admin_name', $admin->username ?? $admin->email);

            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Session::forget('admin_id');
        Session::forget('admin_name');

        return redirect()->route('admin.login');
    }
}
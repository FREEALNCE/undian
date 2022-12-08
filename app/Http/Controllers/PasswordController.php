<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\Rules\CurrentPassword;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('password.edit');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $request->user()->update([

            'password' => Hash::make($request->get('password'))
        ]);
        Alert::success('Change Password', 'Password Changed');
        return redirect()->route('dashboard.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Actions\Fortify\UpdateUserPassword;

class ProfilController extends Controller
{
    public function index(): View
    {
        return view('pages.admin.profile', ['type_menu' => 'forms']);
    }

    public function updatePassword(UpdateUserPassword $updater, Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => 'required|min:8|string',
            'password' => 'required|min:8|string',
            'password_confirmation' => 'required|min:8|string|confirmed',
        ]);

        // $user = Auth::user();

        // if (!Hash::check($request->current_password, $user->password)) {
        //     return redirect()->back()->with('error', __('auth.failed_change_password'));
        // }

        // $user->password = Hash::make($request->password);

        // $user->save();

        $updater->update(Auth::user(),[
            'current_password' =>$request->current_password,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ]);
        return redirect()->route('profile')->with('success', __('auth.success_change_password'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function deleteAccount()
    {
        $user = auth()->user();
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        $user->delete();

        return redirect(route('login'))->with([
            'status' => __('Your account has been deleted')
        ]);
    }
}

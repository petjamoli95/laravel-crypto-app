<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        auth()->logout();

        return redirect()->route('dashboard');
    }
}

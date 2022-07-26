<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('pages.auth.login');
    }

    /**
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(LoginRequest $request)
    {
        if (! auth()->attempt($request->only('username', 'password'), $request->remember)) {
            return back()->with('status', 'Invalid login details');
        }

        return redirect()->route('dashboard');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Jobs\Auth\RegisterUser;

class RegisterController extends Controller
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
        return view('pages.auth.register');
    }

    /**
     * @param  RegisterRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RegisterRequest $request)
    {
        $user = RegisterUser::dispatchSync($request->validated());

        auth()->guard()->login($user);

        return redirect()->route('dashboard');
    }
}

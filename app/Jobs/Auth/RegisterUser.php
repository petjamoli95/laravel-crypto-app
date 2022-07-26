<?php

namespace App\Jobs\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class RegisterUser
{
    use Dispatchable;

    /**
     * @var array|mixed
     */
    private mixed $attributes;

    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;
    }

    /**
     * @return mixed
     */
    public function handle()
    {
        $user = User::create([
            'name' => Arr::get($this->attributes, 'name'),
            'username' => Arr::get($this->attributes, 'username'),
            'email' => Arr::get($this->attributes, 'email'),
            'password' => Hash::make(Arr::get($this->attributes, 'password')),
        ]);

        event(new Registered($user));

        return $user;
    }
}

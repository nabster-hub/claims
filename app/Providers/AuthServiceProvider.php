<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Политики приложения.
     *
     * @var array
     */
    protected $policies = [
        // Здесь можно регистрировать политики
    ];

    /**
     * Загрузка любых служб аутентификации / авторизации.
     */
    public function boot()
    {
        $this->registerPolicies();


        Auth::viaRequest('custom', function ($request) {
            $field = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            return User::where($field, $request->input('login'))->first();
        });
    }
}

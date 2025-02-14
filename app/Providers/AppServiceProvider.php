<?php

namespace App\Providers;

use App\Models\Claim;
use App\Models\User;
use App\Policies\ClaimPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        Claim::class => ClaimPolicy::class,
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Кастомное правило для проверки логина
        Validator::extend('username_or_email', function ($attribute, $value, $parameters, $validator) {
            // Проверка: является ли значение email
            if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                return true;
            }

            // Проверка: является ли значение допустимым username (только буквы, цифры и подчёркивания)
            return preg_match('/^[a-zA-Z0-9_]+$/', $value);
        });
    }
}

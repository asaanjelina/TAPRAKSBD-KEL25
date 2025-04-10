<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Hashing\AbstractHasher;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Hash::extend('plaintext', function () {
            Log::info('🔒 Plaintext hash driver loaded!');
            return new class extends AbstractHasher {
                public function check($value, $hashedValue, array $options = []): bool
                {
                    Log::info('🔍 Checking password: ' . $value . ' vs ' . $hashedValue);
                    return $value === $hashedValue;
                }

                public function make($value, array $options = []): string
                {
                    return $value;
                }

                public function info($hashedValue): array
                {
                    return [];
                }
            };
        });
    }
}

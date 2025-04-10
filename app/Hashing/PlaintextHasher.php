<?php

namespace App\Hashing;

use Illuminate\Hashing\AbstractHasher;

class PlaintextHasher extends AbstractHasher
{
    public function check($value, $hashedValue, array $options = []): bool
    {
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
}

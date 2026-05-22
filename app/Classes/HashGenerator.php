<?php

namespace App\Classes;

use Hashids\Hashids;

class HashGenerator
{
    private Hashids $hashids;

    public function __construct()
    {
        $salt = config('app.key', env('APP_KEY'));
        $minHashLength = 8;

        $this->hashids = new Hashids($salt, $minHashLength);
    }

    public function encode($value): string
    {
        return $this->hashids->encode($value);
    }

    public function decode($hash): array
    {
        return $this->hashids->decode($hash);
    }
}

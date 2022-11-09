<?php

use App\Models\Status;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

if (!function_exists('status')) {
    /**
     * @param Int|String $code
     */
    function status($code, $default = null): Int|String|null
    {
        $changed    = false; // $user->isDirty(); // true
        $key        = "statuses." . Str::slug($code, '.');
        if (Cache::has($key) and !$changed) {
            return Cache::get($key);
        } else {
            if (is_int($code)) {
                $value = Status::where('code', $code)->value('name') ?? $default;
            } else {
                $value = Status::where('name', $code)->Orwhere('slug', $code)->value('code') ?? $default;
            }

            Cache::put($key, $value, 60);
            return $value;
        }
    }
}

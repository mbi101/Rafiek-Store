<?php

if (!function_exists('isSelect')) {
    function isSelected($key, $value): bool
    {
        return request()->filled($key) && request()->query($key) === $value;
    }
}

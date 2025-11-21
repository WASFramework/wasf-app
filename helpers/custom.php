<?php

// Tambahkan helper anda di sini.
// Function yang dibuat disini akan otomatis dimuat.

if (!function_exists('rupiah')) {
    function rupiah($value)
    {
        return 'Rp ' . number_format($value, 0, ',', '.');
    }
}

if (!function_exists('limit')) {
    function limit($text, $chars = 50)
    {
        return strlen($text) > $chars 
            ? substr($text, 0, $chars) . '...'
            : $text;
    }
}

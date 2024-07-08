<?php

if (!function_exists('formatAngka')) {
    function formatAngka($nilai)
    {
        $angka_sebelum_koma = floor($nilai); // Ambil angka sebelum koma
        $angka_dibelakang_koma = $nilai - $angka_sebelum_koma; // Ambil angka dibelakang koma

        // Tentukan jumlah digit dibelakang koma
        $jumlah_digit_dibelakang_koma = 9; // Default untuk 1 angka sebelum koma
        if ($angka_sebelum_koma >= 10) {
            $jumlah_digit_dibelakang_koma = 8; // Jika 2 angka sebelum koma
        }

        // Format angka dengan jumlah digit yang sesuai
        return number_format($nilai, $jumlah_digit_dibelakang_koma, '.', '');
    }
}

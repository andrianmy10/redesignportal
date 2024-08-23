<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('get_greeting')) {
    function get_greeting() {
        $hour = date('H:i');
        $greeting = '';
        $icon = '';

        if ($hour >= '18:00' || $hour <= '05:59') {
            $greeting = 'Selamat Malam ';
            $icon = '<i class="fa fa-moon"></i>'; // Ikon bulan
        } elseif ($hour >= '06:01' && $hour <= '10:59') {
            $greeting = 'Selamat Pagi ';
            $icon = '<i class="fa fa-sun"></i>'; // Ikon matahari
        } elseif ($hour >= '11:00' && $hour <= '14:59') {
            $greeting = 'Selamat Siang ';
            $icon = '<i class="fa fa-sun"></i>'; // Ikon matahari
        } elseif ($hour >= '15:00' && $hour <= '17:59') {
            $greeting = 'Selamat Sore ';
            $icon = '<i class="fa fa-sun"></i>'; // Ikon matahari
        }

        return $icon . ' ' . $greeting;
    }
}

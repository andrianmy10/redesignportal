<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('get_greeting')) {
    function get_greeting() {
        $hour = date('H:i');
        if ($hour >= '18:00' || $hour <= '05:59') {
            return 'Selamat Malam';
        } elseif ($hour >= '06:01' && $hour <= '10:59') {
            return 'Selamat Pagi';
        } elseif ($hour >= '11:00' && $hour <= '14:59') {
            return 'Selamat Siang';
        } elseif ($hour >= '15:00' && $hour <= '17:59') {
            return 'Selamat Sore';
        }
    }
}

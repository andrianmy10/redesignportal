<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('show_notification')) {
    function show_notification() {
        $CI =& get_instance();
        $success_msg = $CI->session->flashdata('success');
        $error_msg = $CI->session->flashdata('error');

        $output = '';

        // Periksa jika pengguna tidak login
        if (!$CI->session->userdata('uid')) {
           $error_msg = 'Silahkan Login Terlebih Dahulu!';
        }

        if ($success_msg) {
            $output .= '<div class="alert alert-success" role="alert">';
            $output .= $success_msg;
            $output .= '</div>';
        }

        if ($error_msg) {
            $output .= '<div class="alert alert-danger" role="alert">';
            $output .= $error_msg;
            $output .= '</div>';
        }

        return $output;
    }
}

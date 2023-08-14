<?php 

if (!function_exists('getAuthenticatedUserId')) {
    function getAuthenticatedUserId() {
        if (auth()->check()) {
            return auth()->user()->id;
        }
        return null;
    }
}

if (!function_exists('getAuthenticatedUserName')) {
    function getAuthenticatedUserName() {
        if (auth()->check()) {
            return auth()->user()->nama_pegawai;
        }
        return null;
    }
}
?>
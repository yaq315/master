<?php

if (!function_exists('getStatusColor')) {
    function getStatusColor($status)
    {
        return match ($status) {
            'pending' => 'secondary',
            'processing' => 'info',
            'shipped' => 'warning',
            'delivered' => 'success',
            'cancelled' => 'danger',
            default => 'dark',
        };
    }
}

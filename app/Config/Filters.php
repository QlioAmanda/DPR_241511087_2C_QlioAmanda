<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes
     * to make reading things nicer and simpler.
     */
    public array $aliases = [
        'csrf'         => \CodeIgniter\Filters\CSRF::class,
        'toolbar'      => \CodeIgniter\Filters\DebugToolbar::class,
        'honeypot'     => \CodeIgniter\Filters\Honeypot::class,
        'invalidchars' => \CodeIgniter\Filters\InvalidChars::class,
        'secureheaders'=> \CodeIgniter\Filters\SecureHeaders::class,

        // 🔹 custom filters
        'auth' => \App\Filters\AuthFilter::class, // Filter untuk mengecek autentikasi
        'role' => \App\Filters\RoleFilter::class, // Filter untuk pengecekan role
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     */
    public array $globals = [
        'before' => [
            // Jangan taruh filter 'auth' di sini, karena kita hanya ingin mengaplikasikannya pada rute tertentu (admin/*)
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc).
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     */
    public array $filters = [
        'auth' => ['before' => ['admin/*']], // Terapkan filter 'auth' hanya untuk rute 'admin/*'
        'role' => ['before' => ['admin/*']], // Bisa juga tambahkan role check di rute admin
    ];
}

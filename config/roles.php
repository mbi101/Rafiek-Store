<?php

return [
    'admin' => [
        'ar' => 'مشرف',
        'en' => 'Admin',
        'permissions' => ['*']
    ],
    'manager' => [
        'ar' => 'مدير',
        'en' => 'manager',
        'permissions' => [
            'dashboard',
            'categories',
            'brands',
            'coupons',
            'products',
            'orders',
            'users',
            'reports',
            'home',
            'contact',
            'about',
            'blog',
            'newsLetters',
            'banners',
            'sliders',
            'faqs',
            'comments',
            'socials',
            'global_shipping',
            'attributes',
            'contacts',
        ]
    ],
    'sales_supervisor' => [
        'ar' => 'مشرف مبيعات',
        'en' => 'Sales Supervisor',
        'permissions' => [
            'dashboard',
            'categories',
            'brands',
            'coupons',
            'products',
            'orders',
            'reports',
            'global_shipping',
            'attributes',
        ]
    ],
];

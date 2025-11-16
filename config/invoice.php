<?php 
return [
    'company' => [
        'name' => env('COMPANY_NAME', 'TÊN CÔNG TY CỦA BẠN'),
        'address' => env('COMPANY_ADDRESS', '123 Đường ABC, Quận XYZ, TP. HCM'),
        'phone' => env('COMPANY_PHONE', '0123 456 789'),
        'email' => env('COMPANY_EMAIL', 'info@company.com'),
        'website' => env('COMPANY_WEBSITE', 'www.company.com'),
        'logo' => env('COMPANY_LOGO', null), // Đường dẫn logo
        'tax_code' => env('COMPANY_TAX_CODE', null), // Mã số thuế
    ],
];
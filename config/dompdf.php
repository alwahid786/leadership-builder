<?php
// config/dompdf.php

return [
    'font_dir' => public_path('assets/fonts/'), // Path to the directory containing font files
    'font_cache' => storage_path('app/dompdf/font_cache'), // Path to the font cache directory
    'font_cache_ttl' => 86400, // Cache lifetime in seconds (1 day in this example)
    'font_subsetting' => true,
    'custom_font_dir' => storage_path('fonts/'), // Path to the directory containing custom font files
    'custom_font_data' => [
        'centurygothic' => [
            'R' => 'century-gothic.ttf',
            'B' => 'century-gothic-bold.ttf',
            'I' => 'century-gothic-italic.ttf',
            'BI' => 'century-gothic-bold-italic.ttf',
        ],
        // Add more fonts here if needed
    ],
];

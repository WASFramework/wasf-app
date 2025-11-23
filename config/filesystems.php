<?php

return [

    'default' => 'public',

    'disks' => [

        'public' => [
            'root' => 'public/uploads',
            'url'  => '/uploads',
        ],

        'local' => [
            'root' => 'storage/app',
            'url'  => null,
        ],

        // Example future disk
        's3' => [
            'driver' => 's3',
            'key'    => env('AWS_KEY'),
            'secret' => env('AWS_SECRET'),
            'bucket' => env('AWS_BUCKET'),
        ],

    ],

];

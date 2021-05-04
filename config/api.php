<?php

use Symfony\Component\HttpFoundation\Response;

return [
    'status' => [
        '00000' => Response::HTTP_OK,
        '00401' => Response::HTTP_UNAUTHORIZED,
    ],

    'session' => [
        'prefix' => 'katalyst.api:',
        'duration' => 604800
    ]
];

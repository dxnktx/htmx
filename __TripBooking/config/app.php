<?php

return [

    'name' => 'TripBooking',
    'export_limit' => 1,
    'countdown_end' => env('COUNTDOWN_END', (strtotime(now()) / 1000) + (86400 * 200) + 1),
];

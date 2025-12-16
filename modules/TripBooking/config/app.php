<?php

return [

    'name' => 'TripBooking',
    'export_limit' => 1,
    'countdown_end' => env('COUNTDOWN_END', strtotime(now()) + (86400 * 30) + 1),
];

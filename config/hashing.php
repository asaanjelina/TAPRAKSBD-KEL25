<?php

return [

    'driver' => 'plaintext',

    'bcrypt' => [
        'rounds' => 10,
    ],

    'argon' => [
        'memory' => 65536,
        'threads' => 1,
        'time' => 4,
    ],

];


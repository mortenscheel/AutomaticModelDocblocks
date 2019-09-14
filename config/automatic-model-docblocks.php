<?php

return [
    'enabled' => env('AUTO_MODEL_DOCBLOCKS', false),
    'options' => [
        '--write'       => true,
        '--smart-reset' => true,
    ],
];

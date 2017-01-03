<?php
/**
 * Url Manager
 * @author Hendri Gunawan
 * @email hendri.gnw@gmail.com
 */

return [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        'home' => 'site/index',
        'hen-admin/login' => 'site/login',
        'site/login' => 'site/error',
    ],
];
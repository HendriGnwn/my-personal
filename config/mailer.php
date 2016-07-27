<?php
/**
 * Created by PhpStorm.
 * User: Hendri Gunawan
 * Date: 6/24/2016
 * Time: 16:11
 */

return [
    'class'            => 'zyx\phpmailer\Mailer',
    'viewPath'         => '@app/mail',
    'useFileTransport' => false,
    'config'           => [
        'mailer'     => 'smtp',
        'host'       => 'smtp.gmail.com',
        'port'       => '465',
        'smtpsecure' => 'ssl',
        'smtpauth'   => true,
        'username'   => 'hendrigunawan195@gmail.com',
        'password'   => 'hendrigunawan195694155',
    ],
];
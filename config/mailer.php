<?php
/**
 * Created by PhpStorm.
 * User: Hendri Gunawan
 * Date: 6/24/2016
 * Time: 16:11
 */

return [
    'class' => 'zyx\phpmailer\Mailer',
	'viewPath' => '@app/mail',
	'useFileTransport' => false,
	'config' => [
//		'mailer' => 'smtp',
//		'host' => 'serverus1.computesta.com',
//		'port' => '465',
//		'smtpsecure' => 'ssl',
//		'smtpauth' => true,
//		'username' => 'test@project.computesta.com',
//		'password' => 'test123!',
		'mailer' => 'smtp',
		'host' => 'smtp.live.com',
		'port' => '587',
		'smtpsecure' => 'tls',
		'smtpauth' => true,
		//'smtpdebug' => 1,
		'username' => 'hendrigunawan195@outlook.com',
		'password' => 'hendri195',
	],
	'messageConfig' => [
		'from' => ['hendri.gnw@gmail.com' => 'hendrigunawan.com']
	],
];
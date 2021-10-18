<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$currentDir = str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
$root .= $currentDir;
$constants['base_url'] = $root;

define('BASH_PATH', '/Applications/XAMPP/htdocs' . $currentDir);
define('HTTP_CSS_PATH', $constants['base_url'] . 'assets/css/');
define('HTTP_JS_PATH', $constants['base_url'] . 'assets/js/');
define('HTTP_IMAGE_PATH', $constants['base_url'] . 'assets/images/');

define('EMAIL_FROM',                            'Your from email');        // e.g. email@example.com
define('EMAIL_BCC',                                'Your bcc email');        // e.g. email@example.com
define('FROM_NAME',                             'CIAS Admin System');    // Your system name
define('EMAIL_PASS',                            'Your email password');    // Your email password
define('PROTOCOL',                                 'smtp');                // mail, sendmail, smtp
define('SMTP_HOST',                             'Your smtp host');        // your smtp host e.g. smtp.gmail.com
define('SMTP_PORT',                             '25');                    // your smtp port e.g. 25, 587
define('SMTP_USER',                             'Your smtp user');        // your smtp user
define('SMTP_PASS',                             'Your smtp password');    // your smtp password
define('MAIL_PATH',                             '/usr/sbin/sendmail');
/**** USER DEFINED CONSTANTS **********/

define('ROLE_ADMIN',                            '1');
define('ROLE_MANAGER',                             '2');
define('ROLE_EMPLOYEE',                         '3');

define('SEGMENT',                                2);

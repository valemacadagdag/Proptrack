<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    // The email address the message will be sent from
    public string $fromEmail  = 'valemacadagdag@gmail.com';
    
    // The name the email will appear to come from
    public string $fromName   = 'PropTrack System';
    
    public string $recipients = '';

    public string $userAgent = 'CodeIgniter';

    // Protocol to send email: smtp, mail, or sendmail
    public string $protocol = 'smtp';

    public string $mailPath = '/usr/sbin/sendmail';

    // Gmail SMTP Host
    public string $SMTPHost = 'smtp.gmail.com';

    public string $SMTPAuthMethod = 'login';

    // The Gmail account that will perform the sending
    public string $SMTPUser = 'valemacadagdag@gmail.com';

    // The 16-character App Password generated from Google Account
    public string $SMTPPass = 'ilxr ybjz fwnq apfx';
    // SMTP port for TLS
    public int $SMTPPort = 587;

    public int $SMTPTimeout = 5;

    public bool $SMTPKeepAlive = false;

    // Use TLS encryption
    public string $SMTPCrypto = 'tls';

    public bool $wordWrap = true;

    public int $wrapChars = 76;

    // Set to 'html' to support email formatting
    public string $mailType = 'html';

    public string $charset = 'UTF-8';

    public bool $validate = false;

    public int $priority = 3;

    public string $CRLF = "\r\n";

    public string $newline = "\r\n";

    public bool $BCCBatchMode = false;

    public int $BCCBatchSize = 200;

    public bool $DSN = false;
}
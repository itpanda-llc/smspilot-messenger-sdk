<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc/smspilot-messenger-php-sdk
 */

namespace Panda\SmsPilot\MessengerSdk;

/**
 * Class Text
 * @package Panda\SmsPilot\MessengerSdk
 * Текст сообщения
 */
class Text
{
    /**
     * HLR
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    public const HLR = 'HLR';

    /**
     * PING
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    public const PING = 'PING';
}

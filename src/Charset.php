<?php

/**
 * Файл из репозитория SMSPilot-Messenger-SDK
 * @link https://github.com/itpanda-llc/smspilot-messenger-sdk
 */

namespace Panda\SmsPilot\MessengerSdk;

/**
 * Class Charset
 * @package Panda\SmsPilot\MessengerSdk
 * Кодировка запроса и ответа
 */
class Charset
{
    /**
     * UTF-8 (По умолчанию)
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    public const UTF_8 = 'utf-8';

    /**
     * Windows-1251
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    public const WINDOWS_1251 = 'windows-1251';
}

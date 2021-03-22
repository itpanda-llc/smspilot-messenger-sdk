<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc/smspilot-messenger-php-sdk
 */

namespace Panda\SmsPilot\MessengerSdk;

/**
 * Class Test
 * @package Panda\SmsPilot\MessengerSdk
 * Обычная отправка / Без передачи оператору
 */
class Test
{
    /**
     * Обычная отправка
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    public const NO = '0';

    /**
     * Без передачи оператору (эмулятор)
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    public const YES = '1';
}

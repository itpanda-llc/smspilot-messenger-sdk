<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Class Callback
 * @package Panda\SMSPilot\MessengerSDK
 * URL-адрес для асинхронного приема статуса
 */
class Callback implements Param
{
    /**
     * Наименование параметра
     */
    private const PARAM_NAME = 'callback';

    /**
     * @param string $param Значение параметра
     * @return array Параметр
     */
    public static function get(string $param): array
    {
        return [self::PARAM_NAME => $param];
    }
}

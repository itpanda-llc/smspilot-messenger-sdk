<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Class Time
 * @package Panda\SMSPilot\MessengerSDK
 * Время отправки (отложенная отправка)
 */
class Time implements Param
{
    /**
     * Наименование параметра
     */
    private const PARAM_NAME = 'send_datetime';

    /**
     * @param string $param Значение параметра
     * @return array Параметр
     */
    public static function get(string $param): array
    {
        return [self::PARAM_NAME => $param];
    }
}

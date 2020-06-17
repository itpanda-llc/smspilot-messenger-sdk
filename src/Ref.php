<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Class Ref
 * @package Panda\SMSPilot\MessengerSDK
 * Реферер
 */
class Ref implements Param
{
    /**
     * Наименование параметра
     */
    private const PARAM_NAME = 'r';

    /**
     * @param string $param Значение параметра
     * @return array Параметр
     */
    public static function get(string $param): array
    {
        return [self::PARAM_NAME => $param];
    }
}

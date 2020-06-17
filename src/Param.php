<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Interface Param
 * @package Panda\SMSPilot\MessengerSDK
 * Параметры
 */
interface Param
{
    /**
     * @param string $param Значение параметра
     * @return array Параметр
     */
    public static function get(string $param): array;
}

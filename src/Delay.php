<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Class Delay
 * @package Panda\SMSPilot\MessengerSDK
 * Время отправки (отложенная отправка)
 */
class Delay
{
    /**
     * @param int $time Количество минут для задержки
     * @return string Время отправки
     */
    public static function min(int $time): string
    {
        return (string) (60 * $time + time());
    }

    /**
     * @param int $time Количество часов для задержки
     * @return string Время отправки
     */
    public static function hour(int $time): string
    {
        return (string) (3600 * $time + time());
    }
}

<?php

/**
 * Этот файл является частью репозитория
 * Panda/SMSPilot/MessengerSDK.
 *
 * Для получения полной информации об авторских правах
 * и лицензии, пожалуйста, просмотрите файл LICENSE,
 * который был распространен с этим исходным кодом.
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Class Delay Время отправки (отложенная отправка)
 * @package Panda\SMSPilot\MessengerSDK
 */
class Delay extends Time implements Param
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

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
 * Interface Param Параметры
 * @package Panda\SMSPilot\MessengerSDK
 */
interface Param
{
    /**
     * @param string $param Значение параметра
     * @return array Параметр
     */
    public static function get(string $param): array;
}

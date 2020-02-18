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
 * Class Ref Реферер
 * @package Panda\SMSPilot\MessengerSDK
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

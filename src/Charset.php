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
 * Class Charset Кодировка текста
 * @package Panda\SMSPilot\MessengerSDK
 */
class Charset implements Param
{
    /**
     * UTF-8 (по умолчанию)
     */
    public const UTF_8 = 'utf-8';

    /**
     * Windows-1251
     */
    public const WINDOWS_1251 = 'windows-1251';

    /**
     * Наименование параметра
     */
    private const PARAM_NAME = 'charset';

    /**
     * @param string $param Значение параметра
     * @return array Параметр
     */
    public static function get(string $param): array
    {
        return [self::PARAM_NAME => $param];
    }
}

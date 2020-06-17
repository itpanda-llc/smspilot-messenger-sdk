<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Class Char
 * @package Panda\SMSPilot\MessengerSDK
 * Кодировка текста
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

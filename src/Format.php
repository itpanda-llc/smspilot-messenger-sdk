<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Class Format
 * @package Panda\SMSPilot\MessengerSDK
 * Формат ответа
 */
class Format implements Param
{
    /**
     * Текст
     */
    public const TEXT = 'text';

    /**
     * XML-формат
     */
    public const XML = 'xml';

    /**
     * JSON-формат
     */
    public const JSON = 'json';

    /**
     * Наименование параметра
     */
    private const PARAM_NAME = 'format';

    /**
     * @param string $param Значение параметра
     * @return array Параметр
     */
    public static function get(string $param): array
    {
        return [self::PARAM_NAME => $param];
    }
}

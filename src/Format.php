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
 * Class Format Форматы ответа
 * @package Panda\SMSPilot\MessengerSDK
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

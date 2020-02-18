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
 * Class Text Тексты сообщений
 * @package Panda\SMSPilot\MessengerSDK
 */
class Text implements Param
{
    /**
     * Текст для HLR-запроса
     */
    public const HLR = 'HLR';

    /**
     * Текст для PING-сообщения
     */
    public const PING = 'PING';

    /**
     * Наименование параметра
     */
    private const PARAM_NAME = 'send';

    /**
     * @param string $param Значение параметра
     * @return array Параметр
     */
    public static function get(string $param): array
    {
        return [self::PARAM_NAME => $param];
    }
}

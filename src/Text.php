<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Class Text
 * @package Panda\SMSPilot\MessengerSDK
 * Текст сообщения
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

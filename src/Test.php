<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Class Test
 * @package Panda\SMSPilot\MessengerSDK
 * Отправка без передачи оператору
 */
class Test implements Param
{
    /**
     * Без передачи оператору
     */
    public const TRUE = '1';

    /**
     * Обычная отправка
     */
    public const FALSE = '0';

    /**
     * Наименование параметра
     */
    private const PARAM_NAME = 'test';

    /**
     * @param string $param Значение параметра
     * @return array Параметр
     */
    public static function get(string $param): array
    {
        return [self::PARAM_NAME => $param];
    }
}

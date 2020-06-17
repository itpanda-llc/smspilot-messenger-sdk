<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Class Cost
 * @package Panda\SMSPilot\MessengerSDK
 * Расчет стоимости
 */
class Cost implements Param
{
    /**
     * Расчет стоимости
     */
    public const TRUE = '1';

    /**
     * Обычная отправка
     */
    public const FALSE = '0';

    /**
     * Наименование параметра
     */
    private const PARAM_NAME = 'cost';

    /**
     * @param string $param Значение параметра
     * @return array Параметр
     */
    public static function get(string $param): array
    {
        return [self::PARAM_NAME => $param];
    }
}

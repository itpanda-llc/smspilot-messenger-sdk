<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Class Range
 * @package Panda\SMSPilot\MessengerSDK
 * Время получения сообщений (временной диапазон для выбора входящих)
 */
class Range implements Param
{
    /**
     * Новые сообщения
     */
    public const NEW = 'new';

    /**
     * Наименование параметра
     */
    private const PARAM_NAME = 'since';

    /**
     * Шаблон даты
     */
    private const DATE_FORMAT = 'Y-m-d H:i:s';

    /**
     * @param string $param Значение параметра
     * @return array Параметр
     */
    public static function get(string $param): array
    {
        return [self::PARAM_NAME => $param];
    }

    /**
     * @param int $time Количество минут
     * @return string Временнная отметка
     */
    public static function min(int $time): string
    {
        return date(self::DATE_FORMAT,
            (string) (time() - (60 * $time)));
    }

    /**
     * @param int $time Количество часов
     * @return string Временнная отметка
     */
    public static function hour(int $time): string
    {
        return date(self::DATE_FORMAT,
            (string) (time() - (3600 * $time)));
    }

    /**
     * @param int $time Количество дней
     * @return string Временнная отметка
     */
    public static function day(int $time): string
    {
        return date(self::DATE_FORMAT,
            (string) (time() - (86400 * $time)));
    }
}

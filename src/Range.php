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
 * Class Range Время получения сообщений (временной диапазон для выбора входящих)
 * @package Panda\SMSPilot\MessengerSDK
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
        return date('Y-m-d H:i:s', (string) (time() - (60 * $time)));
    }

    /**
     * @param int $time Количество часов
     * @return string Временнная отметка
     */
    public static function hour(int $time): string
    {
        return date('Y-m-d H:i:s', (string) (time() - (3600 * $time)));
    }

    /**
     * @param int $time Количество дней
     * @return string Временнная отметка
     */
    public static function day(int $time): string
    {
        return date('Y-m-d H:i:s', (string) (time() - (86400 * $time)));
    }
}

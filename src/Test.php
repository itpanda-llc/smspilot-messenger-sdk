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
 * Class Test Отправка без передачи оператору
 * @package Panda\SMSPilot\MessengerSDK
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

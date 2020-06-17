<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Class Method
 * @package Panda\SMSPilot\MessengerSDK
 * Метод для асинхронного приема статуса
 */
class Method implements Param
{
    /**
     * GET-метод (по умолчанию)
     */
    public const GET = 'get';

    /**
     * POST-метод
     */
    public const POST = 'post';

    /**
     * Наименование параметра
     */
    private const PARAM_NAME = 'callback_method';

    /**
     * @param string $param Значение параметра
     * @return array Параметр
     */
    public static function get(string $param): array
    {
        return [self::PARAM_NAME => $param];
    }
}

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
 * Class Method Метод для асинхронного приема статуса
 * @package Panda\SMSPilot\MessengerSDK
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

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
 * Class Account Получение информации об аккаунте
 * @package Panda\SMSPilot\MessengerSDK
 */
class Account extends Check implements Package
{
    /**
     * Наименование параметра "Формат ответа"
     */
    private const FORMAT = 'format';

    /**
     * @var array URL web-запроса
     */
    public $url = URL::HTTP_V1;

    /**
     * Account constructor.
     * @param string|null $format Формат ответа
     */
    public function __construct(string $format = null)
    {
        $this->package[self::FORMAT] = $format;
    }

    /**
     * @return string Параметры посылки
     */
    public function getParam(): string
    {
        return http_build_query($this->package);
    }
}

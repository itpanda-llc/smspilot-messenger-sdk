<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Class Account
 * @package Panda\SMSPilot\MessengerSDK
 * Получение информации об аккаунте (HTTP API v1)
 */
class Account extends Check implements Package
{
    /**
     * Наименование параметра "Формат ответа"
     */
    private const FORMAT = 'format';

    /**
     * @var string URL-адрес web-запроса
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

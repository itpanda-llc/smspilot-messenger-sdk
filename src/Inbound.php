<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Class Inbound
 * @package Panda\SMSPilot\MessengerSDK
 * Получение информации о входящих сообщениях (HTTP API v2)
 */
class Inbound extends Check implements Package
{
    /**
     * Наименование параметра "Временная отметка"
     */
    protected const SINCE = 'since';

    /**
     * Наименование параметра "Признак запроса получения входящих сообщений"
     */
    protected const INBOUND = 'inbound';

    /**
     * @var string URL-адрес web-запроса
     */
    public $url = URL::HTTP_V2;

    /**
     * Inbound constructor.
     * @param string $range Временная отметка
     */
    public function __construct(string $range = null)
    {
        $this->package[self::INBOUND] = true;

        if (!is_null($range)) {
            $this->package[self::SINCE] = $range;
        }
    }

    /**
     * @return string Параметры посылки
     */
    public function getParam(): string
    {
        return json_encode($this->package);
    }
}

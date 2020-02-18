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
 * Class Inbound Получение информации о входящих сообщениях
 * @package Panda\SMSPilot\MessengerSDK
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
     * @var array URL web-запроса
     */
    public $url = URL::HTTP_V2;

    /**
     * Sender constructor.
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

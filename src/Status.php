<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc/smspilot-messenger-php-sdk
 */

declare(strict_types=1);

namespace Panda\SmsPilot\MessengerSdk;

/**
 * Class Status
 * @package Panda\SmsPilot\MessengerSdk
 * Статусы сообщений (HTTP/API-2)
 */
class Status extends JsonTask
{
    /**
     * Наименование параметра "Список кодов сообщений"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private const CHECK = 'check';

    /**
     * Наименование параметра "Код сообщения"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private const SERVER_ID = 'server_id';

    /**
     * Наименование параметра "Код пакета"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private const SERVER_PACKET_ID = 'server_packet_id';

    /**
     * Status constructor.
     * @param string|null $id Код сообщения
     */
    public function __construct(string $id = null)
    {
        if (!is_null($id)) $this->addId($id);
    }

    /**
     * @param string $id Код сообщения
     * @return $this
     */
    public function addId(string $id): self
    {
        $this->task[self::SERVER_PACKET_ID] = null;

        if (($this->task[self::CHECK] === true)
            || (!isset($this->package[self::CHECK])))
            $this->task[self::CHECK] = [];

        $this->task[self::CHECK][] = [self::SERVER_ID => $id];

        return $this;
    }

    /**
     * @param string $packetId Код пакета
     * @return $this
     */
    public function setPacketId(string $packetId): self
    {
        $this->task[self::CHECK] = true;
        $this->task[self::SERVER_PACKET_ID] = $packetId;

        return $this;
    }
}

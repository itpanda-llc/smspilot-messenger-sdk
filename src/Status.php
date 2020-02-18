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
 * Class Status Получение статуса сообщений
 * @package Panda\SMSPilot\MessengerSDK
 */
class Status extends Check implements Package
{
    /**
     * Наименование параметра "Сообщения"
     */
    private const SERVER = 'check';

    /**
     * Наименование параметра "Номер сообщения"
     */
    private const SERVER_ID = 'server_id';

    /**
     * Наименование параметра "Номер пакета сообщений"
     */
    private const PACKET_ID = 'server_packet_id';

    /**
     * @var array URL web-запроса
     */
    public $url = URL::HTTP_V2;

    /**
     * Status constructor.
     * @param string|null $id Номер сообщения
     */
    public function __construct(string $id = null)
    {
        if (!is_null($id)) {
            $this->package[self::SERVER][] =
                [self::SERVER_ID => $id];
        }
    }

    /**
     * @param string $id Номер сообщения
     * @return Status
     */
    public function addMessage(string $id): Status
    {
        unset($this->package[self::PACKET_ID]);

        if (!empty($this->package[self::SERVER])) {
            if ($this->package[self::SERVER] === true) {
                unset($this->package[self::SERVER]);

                $this->package[self::SERVER] = [];
            }
        }

        $this->package[self::SERVER][] =
            [self::SERVER_ID => $id];

        return $this;
    }

    /**
     * @param array $idList Список номеров сообщений
     * @return Status
     */
    public function addMessageList(array $idList): Status
    {
        foreach ($idList as $v) $this->addMessage($v);

        return $this;
    }

    /**
     * @param string $id Номер пакета сообщений
     * @return Status
     */
    public function addPacket(string $id): Status
    {
        unset($this->package[self::SERVER]);
        $this->package[self::SERVER] = true;

        $this->package[self::PACKET_ID] = $id;

        return $this;
    }

    /**
     * @return string Параметры посылки
     */
    public function getParam(): string
    {
        return json_encode($this->package);
    }
}

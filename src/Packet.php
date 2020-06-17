<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\SMSPilot\MessengerSDK;

use Panda\SMSPilot\MessengerSDK\Exception\ClientException;

/**
 * Class Packet
 * @package Panda\SMSPilot\MessengerSDK
 * Создание и формирование массовых персональных сообщений (HTTP API v2)
 */
class Packet extends Send implements Package
{
    /**
     * Наименование параметра "Пакет сообщений"
     */
    private const PACKET = 'send';

    /**
     * Наименование параметра "Текст соообщения"
     */
    protected const MESSAGE = 'text';

    /**
     * @var string Имя отправителя
     */
    private $sender;

    /**
     * @var string Время отправки
     */
    private $time;

    /**
     * @var string URL-адрес web-запроса
     */
    public $url = URL::HTTP_V2;

    /**
     * Packet constructor.
     * @param string|null $sender Имя отправителя
     * @param string|null $time Время отправки
     */
    public function __construct(string $sender = null,
                                string $time = null)
    {
        if (!is_null($sender)) $this->sender = $sender;
        if (!is_null($time)) $this->time = $time;
    }

    /**
     * @param string $name Имя отправителя
     * @return Package
     */
    public function setName(string $name): Package
    {
        $this->sender = $name;

        return $this;
    }

    /**
     * @param string $time Время отправки
     * @return Package
     */
    public function setTime(string $time): Package
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @param string $message Текст сообщения
     * @param string $recipient Номер получателя
     * @param string|null $sender Имя отправителя
     * @param string|null $time Время отправки
     * @return Packet
     */
    public function addMessage(string $message,
                               string $recipient,
                               string $sender = null,
                               string $time = null): Packet
    {
        $item = [self::MESSAGE => $message,
            self::RECIPIENT => $recipient,
            self::SENDER => $sender ?? $this->sender,
            self::TIME => $time ?? $this->time];

        $this->package[self::PACKET][] = array_diff($item,
            [null]);

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

<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\SMSPilot\MessengerSDK;

/**
 * Class Singleton
 * @package Panda\SMSPilot\MessengerSDK
 * Создание и формирование параметров одиночного сообщения (HTTP API v1)
 */
class Singleton extends Send implements Package
{
    /**
     * @var string URL-адрес web-запроса
     */
    public $url = URL::HTTP_V1;

    /**
     * Singleton constructor.
     * @param string $message Текст сообщения
     * @param string $recipient Номер получателя
     * @param string|null $sender Имя отправителя
     * @param string|null $time Время отправки
     */
    public function __construct(string $message,
                                string $recipient,
                                string $sender = null,
                                string $time = null)
    {
        $this->package[self::MESSAGE] = $message;
        $this->package[self::RECIPIENT] = $recipient;
        $this->package[self::SENDER] = $sender;
        $this->package[self::TIME] = $time;
    }

    /**
     * @param string $name Имя отправителя
     * @return Singleton
     */
    public function setName(string $name): Package
    {
        $this->package[self::SENDER] = $name;

        return $this;
    }

    /**
     * @param string $time Время отправки
     * @return Singleton
     */
    public function setTime(string $time): Package
    {
        $this->package[self::TIME] = $time;

        return $this;
    }

    /**
     * @return string Параметры посылки
     */
    public function getParam(): string
    {
        return http_build_query($this->package);
    }
}

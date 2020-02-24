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
 * Class Singleton Создание и формирование параметров одиночного сообщения
 * @package Panda\SMSPilot\MessengerSDK
 */
class Singleton extends Send implements Package
{
    /**
     * @var string URL web-запроса
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

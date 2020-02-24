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
 * Class Massive Создание и формирование параметров массового сообщения (рассылки)
 * @package Panda\SMSPilot\MessengerSDK
 */
class Massive extends Send implements Package
{
    /**
     * @var string URL web-запроса
     */
    public $url = URL::HTTP_V1;

    /**
     * Massive constructor.
     * @param string $message Текст сообщения
     * @param string|null $sender Имя отправителя
     * @param string|null $time Время отправки
     */
    public function __construct(string $message,
                                string $sender = null,
                                string $time = null)
    {
        $this->package[self::MESSAGE] = $message;
        $this->package[self::SENDER] = $sender;
        $this->package[self::TIME] = $time;
    }

    /**
     * @param string $name Имя отправителя
     * @return Package
     */
    public function setName(string $name): Package
    {
        $this->package[self::SENDER] = $name;

        return $this;
    }

    /**
     * @param string $time Время отправки
     * @return Package
     */
    public function setTime(string $time): Package
    {
        $this->package[self::TIME] = $time;

        return $this;
    }

    /**
     * @param string $recipient Номер получателя
     * @return Massive
     */
    public function addRecipient(string $recipient): Massive
    {
        $recipients = $this->package[self::RECIPIENT] ?? '';

        if (strpos($recipients, $recipient) === false) {
            $format = (empty($recipients)) ? '%s' : ',%s';
            $recipients .= sprintf($format, $recipient);

            $this->package[self::RECIPIENT] = $recipients;
        }

        return $this;
    }

    /**
     * @param array $recipientList Список номеров получателей
     * @return Massive
     */
    public function addRecipientList(array $recipientList): Massive
    {
        foreach ($recipientList as $v) $this->addRecipient($v);

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

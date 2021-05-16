<?php

/**
 * Файл из репозитория SMSPilot-Messenger-SDK
 * @link https://github.com/itpanda-llc/smspilot-messenger-sdk
 */

declare(strict_types=1);

namespace Panda\SmsPilot\MessengerSdk;

/**
 * Class Packet
 * @package Panda\SmsPilot\MessengerSdk
 * Массовые персональные сообщения (Пакетная оптравка) (HTTP/API-2)
 */
class Packet extends JsonTask
{
    /**
     * Наименование параметра "Пакет сообщений"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private const SEND = 'send';

    /**
     * Наименование параметра "Текст соообщения"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private const TEXT = 'text';

    /**
     * Наименование параметра "Телефонный номер абонента"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private const TO = 'to';

    /**
     * Наименование параметра "Уникальный код сообщения в вашей системе"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private const ID = 'id';

    /**
     * Наименование параметра "Имя отправителя"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private const FROM = 'from';

    /**
     * Наименование параметра "Время отложеной отправки"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private const SEND_DATETIME = 'send_datetime';

    /**
     * Наименование параметра "URL адрес скрипта для приёма статуса"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private const CALLBACK = 'callback';

    /**
     * Наименование параметра "get или post вызов скрипта приёма статусов"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private const CALLBACK_METHOD = 'callback_method';

    /**
     * Наименование параметра "Время жизни сообщения"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private const TTL = 'ttl';

    /**
     * Наименование параметра "Обычная отправка / Без передачи оператору (эмулятор)"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    protected const TEST = 'test';

    /**
     * Наименование параметра "Обычная отправка / Рассчитать стоимость"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private const COST = 'cost';

    /**
     * @var string|null Имя отправителя
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private $from;

    /**
     * @var string|null Время отложеной отправки
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private $sendDatetime;

    /**
     * @var string|null URL адрес скрипта для приёма статуса
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private $callback;

    /**
     * @var string|null get или post вызов скрипта приёма статусов
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private $callbackMethod;

    /**
     * @var string|null Время жизни сообщения
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v2.4.16.pdf
     */
    private $ttl;

    /**
     * Packet constructor.
     * @param string|null $text Текст соообщения
     * @param string|null $to Телефонный номер абонента
     * @param string|null $from Имя отправителя
     */
    public function __construct(string $text = null,
                                string $to = null,
                                string $from = null)
    {
        if ((!is_null($text)) && (!is_null($to)))
            $this->addSend($text, $to, $from);
    }

    /**
     * @param string $text Текст соообщения
     * @param string $to Телефонный номер абонента
     * @param string|null $from Имя отправителя
     * @return $this
     */
    public function addSend(string $text,
                            string $to,
                            string $from = null): self
    {
        $send = [self::TEXT => $text,
            self::TO => $to,
            self::FROM => $from ?? $this->from,
            self::SEND_DATETIME => $this->sendDatetime,
            self::CALLBACK => $this->callback,
            self::CALLBACK_METHOD => $this->callbackMethod,
            self::TTL => $this->ttl];

        $this->task[self::SEND][] = array_diff($send,
            [null]);

        return $this;
    }

    /**
     * @param string $id Уникальный код сообщения в вашей системе
     * @return $this
     */
    public function setId(string $id): self
    {
        if (isset($this->task[self::SEND])) {
            $keys = array_keys($this->task[self::SEND]);
            $key = array_pop($keys);

            $this->task[self::SEND][$key] =
                array_merge($this->task[self::SEND][$key],
                    [self::FROM => $id]);
        }

        return $this;
    }

    /**
     * @param string $from Имя отправителя
     * @return $this
     */
    public function setFrom(string $from): self
    {
        if (!isset($this->task[self::SEND]))
            $this->from = $from;
        else {
            $keys = array_keys($this->task[self::SEND]);
            $key = array_pop($keys);

            $this->task[self::SEND][$key] =
                array_merge($this->task[self::SEND][$key],
                    [self::FROM => $from]);
        }

        return $this;
    }

    /**
     * @param string $sendDatetime Время отложенной отправки
     * @return $this
     */
    public function setSendDatetime(string $sendDatetime): self
    {
        if (!isset($this->task[self::SEND]))
            $this->sendDatetime = $sendDatetime;
        else {
            $keys = array_keys($this->task[self::SEND]);
            $key = array_pop($keys);

            $this->task[self::SEND][$key] =
                array_merge($this->task[self::SEND][$key],
                    [self::SEND_DATETIME => $sendDatetime]);
        }

        return $this;
    }

    /**
     * @param string $callback URL адрес скрипта для приѐма статуса
     * @return $this
     */
    public function setCallback(string $callback): self
    {
        if (!isset($this->task[self::SEND]))
            $this->callback = $callback;
        else {
            $keys = array_keys($this->task[self::SEND]);
            $key = array_pop($keys);

            $this->task[self::SEND][$key] =
                array_merge($this->task[self::SEND][$key],
                    [self::CALLBACK => $callback]);
        }

        return $this;
    }

    /**
     * @param string $callbackMethod get или post вызов скрипта приёма статусов
     * @return $this
     */
    public function setCallbackMethod(string $callbackMethod): self
    {
        if (!isset($this->task[self::SEND]))
            $this->callbackMethod = $callbackMethod;
        else {
            $keys = array_keys($this->task[self::SEND]);
            $key = array_pop($keys);

            $this->task[self::SEND][$key] =
                array_merge($this->task[self::SEND][$key],
                    [self::CALLBACK_METHOD => $callbackMethod]);
        }

        return $this;
    }

    /**
     * @param string $ttl Время жизни сообщения
     * @return $this
     */
    public function setTtl(string $ttl): self
    {
        if (!isset($this->task[self::SEND]))
            $this->ttl = $ttl;
        else {
            $keys = array_keys($this->task[self::SEND]);
            $key = array_pop($keys);

            $this->task[self::SEND][$key] =
                array_merge($this->task[self::SEND][$key],
                    [self::TTL => $ttl]);
        }

        return $this;
    }

    /**
     * @param string $test Обычная отправка / Без передачи оператору (эмулятор)
     * @return $this
     */
    public function setTest(string $test): self
    {
        $this->task[self::TEST] = $test;

        return $this;
    }

    /**
     * @param string $cost Обычная отправка / Рассчитать стоимость
     * @return $this
     */
    public function setCost(string $cost): self
    {
        $this->task[self::COST] = $cost;

        return $this;
    }
}

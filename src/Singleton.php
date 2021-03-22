<?php

/**
 * Файл из репозитория SMSPilot-Messenger-PHP-SDK
 * @link https://github.com/itpanda-llc/smspilot-messenger-php-sdk
 */

namespace Panda\SmsPilot\MessengerSdk;

/**
 * Class Singleton
 * @package Panda\SmsPilot\MessengerSdk
 * Одиночное сообщение (HTTP/API-1)
 */
class Singleton extends Task
{
    /**
     * Наименование параметра "Текст соообщения"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const SEND = 'send';

    /**
     * Наименование параметра "Номер мобильного телефона, или список номеров через запятую"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const TO = 'to';

    /**
     * Наименование параметра "Зарегистрированный отправитель"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const FROM = 'from';

    /**
     * Наименование параметра "Формат ответа сервера"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const FORMAT = 'format';

    /**
     * Наименование параметра "Кодировка запроса и ответа"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const CHARSET = 'charset';

    /**
     * Наименование параметра "Язык возвращаемых ошибок"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const LANG = 'lang';

    /**
     * Наименование параметра "Время отправки"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const SEND_DATETIME = 'send_datetime';

    /**
     * Наименование параметра "Время жизни сообщения"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const TTL = 'ttl';

    /**
     * Наименование параметра "Список возвращаемых атрибутов SMS через запятую"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const FIELDS = 'fields';

    /**
     * Наименование параметра "Обычная отправка / Рассчитать стоимость"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const COST = 'cost';

    /**
     * Наименование параметра "Обычная отправка / Без передачи оператору (эмулятор)"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const TEST = 'test';

    /**
     * Наименование параметра "URL адрес скрипта для асинхронного приёма статуса"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const CALLBACK = 'callback';

    /**
     * Наименование параметра "Post или get"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    private const CALLBACK_METHOD = 'callback_method';

    /**
     * Singleton constructor.
     * @param string|null $send Текст сообщения
     * @param string|null $to Номер мобильного телефона, или список номеров через запятую
     * @param string|null $from Зарегистрированный отправитель
     */
    public function __construct(string $send = null,
                                string $to = null,
                                string $from = null)
    {
        $this->task[self::SEND] = $send;
        $this->task[self::TO] = $to;
        $this->task[self::FROM] = $from;
    }

    /**
     * @param string $send Текст сообщения
     * @return $this
     */
    public function setSend(string $send): self
    {
        $this->task[self::SEND] = $send;

        return $this;
    }

    /**
     * @param string $to Номер мобильного телефона, или список номеров через запятую
     * @return $this
     */
    public function setTo(string $to): self
    {
        $this->task[self::TO] = $to;

        return $this;
    }

    /**
     * @param string $from Зарегистрированный отправитель
     * @return $this
     */
    public function setFrom(string $from): self
    {
        $this->task[self::FROM] = $from;

        return $this;
    }

    /**
     * @param string $format Формат ответа сервера
     * @return $this
     */
    public function setFormat(string $format): self
    {
        $this->task[self::FORMAT] = $format;

        return $this;
    }

    /**
     * @param string $charset Кодировка ответа и запроса
     * @return $this
     */
    public function setCharset(string $charset): self
    {
        $this->task[self::CHARSET] = $charset;

        return $this;
    }

    /**
     * @param string $lang Язык возвращаемых ошибок
     * @return $this
     */
    public function setLang(string $lang): self
    {
        $this->task[self::LANG] = $lang;

        return $this;
    }

    /**
     * @param string $sendDatetime Время отправки
     * @return $this
     */
    public function setSendDatetime(string $sendDatetime): self
    {
        $this->task[self::SEND_DATETIME] = $sendDatetime;

        return $this;
    }

    /**
     * @param int $ttl Время жизни сообщения
     * @return $this
     */
    public function setTtl(int $ttl): self
    {
        $this->task[self::TTL] = $ttl;

        return $this;
    }

    /**
     * @param string $fields Список возвращаемых атрибутов SMS через запятую
     * @return $this
     */
    public function setFields(string $fields): self
    {
        $this->task[self::FIELDS] = $fields;

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
     * @param string $callback URL адрес скрипта для асинхронного приёма статуса
     * @return $this
     */
    public function setCallback(string $callback): self
    {
        $this->task[self::CALLBACK] = $callback;

        return $this;
    }

    /**
     * @param string $callbackMethod Post или get
     * @return $this
     */
    public function setCallbackMethod(string $callbackMethod): self
    {
        $this->task[self::CALLBACK_METHOD] = $callbackMethod;

        return $this;
    }
}

<?php

/**
 * Файл из репозитория SMSPilot-Messenger-SDK
 * @link https://github.com/itpanda-llc/smspilot-messenger-sdk
 */

namespace Panda\SmsPilot\MessengerSdk;

/**
 * Class Account
 * @package Panda\SmsPilot\MessengerSdk
 * Информация о пользователе (HTTP/API-1)
 */
class Account extends Task
{
    /**
     * Наименование параметра "Единица измерения"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    protected const BALANCE = 'balance';

    /**
     * Наименование параметра "Формат ответа сервера"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    protected const FORMAT = 'format';

    /**
     * Наименование параметра "Кодировка запроса и ответа"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    protected const CHARSET = 'charset';

    /**
     * Наименование параметра "Язык возвращаемых ошибок"
     * @link https://smspilot.ru/apikey.php
     * @link https://smspilot.ru/download/SMSPilotRu-HTTP-v1.9.19.pdf
     */
    protected const LANG = 'lang';

    /**
     * Account constructor.
     * @param string|null $balance Единица измерения
     */
    public function __construct(string $balance = null)
    {
        $this->task[self::BALANCE] = $balance;
    }

    /**
     * @param string $balance Единица измерения
     * @return $this
     */
    public function setBalance(string $balance): self
    {
        $this->task[self::BALANCE] = $balance;

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
}
